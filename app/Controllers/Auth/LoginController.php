<?php

    declare(strict_types=1);

    namespace App\Controllers\Auth;

    use App\Controllers\BaseController;
    use CodeIgniter\API\ResponseTrait;
    use CodeIgniter\HTTP\ResponseInterface;

    class LoginController extends BAseController
    {
        use ResponseTrait;

        public function jwtLogin(): ResponseInterface
        {
            $rules = $this->getValidationRules();
            
            if (!$this->validateData($this->request->getJSON(true), $rules, [], config('Auth')->DBGroup)) {
                return $this->fail(
                    ['errors' => $this->validator->getErrors()],
                    $this->codes['unauthorized']
                );
            }

            $credentials             = $this->request->getJsonVar(setting('Auth.validFields'));
            $credentials             = array_filter($credentials);
            $credentials['password'] = $this->request->getJsonVar('password');

            $authenticator = auth('session')->getAuthenticator();

            $result = $authenticator->check($credentials);

            if (!$result->isOK()) {            
                return $this->failUnauthorized($result->reason());
            }

            $user = $result->extraInfo();

            $manager = service('jwtmanager');

            $jwt = $manager->generateToken($user);

            return $this->respond([
                'access_token' => $jwt,
            ]);
        }

        protected function getValidationRules(): array
        {
            $rules = new ValidationRules();

            return $rules->getLoginRules();
        }

    }