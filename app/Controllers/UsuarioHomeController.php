<?php

    namespace App\Controllers;

    //use App\Controllers\BaseController;
   // use CodeIgniter\HTTP\RequestInterface;
   // use CodeIgniter\HTTP\ResponseInterface;
  //  use Psr\Log\LoggerInterface;
    use CodeIgniter\Config\Factories;
    use App\Service\UsuarioService;

    class UsuarioHomeController extends BaseController
    {
        protected UsuarioService $service;

       /* public function initController(
            RequestInterface $request,
            ResponseInterface $response,
            LoggerInterface $logger,            
        ) {
            parent::initController($request, $response, $logger);
        }*/

        public function __construct()
        {
            $this->service = Factories::class(UsuarioService::class);
        }

        public function index()
        {
            return 'ok';
        }

       /* public function salvar()
        {
             $dados = [
                "nome" => $this->request->getPost('nome'),
                "email" => $this->request->getPost('email'),
                "senha" => $this->request->getPost('senha'),
                "status" => $this->request->getPost('A'),
            ];

           return $dados;
        }*/
    }