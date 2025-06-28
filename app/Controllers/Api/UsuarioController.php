<?php

    namespace App\Controllers\Api;
    
    use CodeIgniter\API\ResponseTrait;
    use CodeIgniter\Config\Factories;
    use App\Controllers\BaseController;
    use App\Service\UsuarioService;

    class UsuarioController extends BaseController
    {
        use ResponseTrait;
         
        //protected UsuarioService $service;
        protected UsuarioModel $model;

        public function __construct()
        {
            $this->service = service('usuarioService');//Factories::class(UsuarioService::class);
            //new UsuarioService();
            //
        }

        public function salvar()
        {
             $dados = [
                "nome" => $this->request->getPost('nome'),
                "email" => $this->request->getPost('email'),
                "senha" => $this->request->getPost('senha'),
                "status" => $this->request->getPost('status'),
            ];

           return $this->respondCreated($this->service->salvar($dados));
        }
    }