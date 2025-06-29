<?php

    namespace App\Controllers\Auth;

    use App\Controllers\BaseController;
    use CodeIgniter\API\ResponseTrait;
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    use App\Models\UsuarioModel;

    class LoginController extends BaseController
    {
        use ResponseTrait;

        public function login() 
        {              
            $session = session();                
            $data = $this->request->getJSON(true);

            $model = new UsuarioModel();

            $user = $model->where('email', $data['email'])->first();

            if (!$user || !password_verify($data['password'], $user['senha'])) {               
                return $this->failUnauthorized('Usuário ou senha inválidos');
            }

            $token = $this->generateJWT($user);            

            $session->set('token', $token);

            return $this->respond(['token' => $token],200);
        }

        public function logout() 
        {
            if (session()->has('token')) {
                session()->remove('token');
                
                return $this->respond(['msg' => 'Usuário Deslogado'],200);
            }
        }

        private function generateJWT($user)
        {
            $key = 'tVQbkTlPp6QFxxbk+KACohSYOKPqOdBatqVjCunM6lI=';
            $payload = [
                'sub' => $user['id'],
                'iat' => time(),
                'exp' => time() + 3600,
            ];

            return JWT::encode($payload, $key, 'HS256');
        }
}