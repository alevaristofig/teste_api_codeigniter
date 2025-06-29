<?php

    namespace App\Filters;

    use CodeIgniter\Config\Services;
    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use CodeIgniter\Filters\FilterInterface;
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

class JWTFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {                
        $authHeader = $request->getHeaderLine('Authorization');
        if (! str_starts_with($authHeader, 'Bearer ')) {
            return Services::response()->setStatusCode(401)->setBody('Token não encontrado');
        }

        $token = substr($authHeader, 7);

        try {
            $decoded = JWT::decode($token, new Key('tVQbkTlPp6QFxxbk+KACohSYOKPqOdBatqVjCunM6lI=', 'HS256'));
        } catch (\Exception $e) {
            return Services::response()->setStatusCode(401)->setBody('Token inválido');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}