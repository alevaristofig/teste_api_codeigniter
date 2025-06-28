<?php

    namespace App\Controllers\Api;

    use App\Controllers\BaseController;
    use App\Service\UsuarioService;

    class UsuarioController extends BaseController
    {
        private $service;

        public function __construct(UsuarioService $service)
        {
            $this->service = $service;
        }

        public function salvar()
        {
             $dados = [
                "nome" => $this->request->getPost('nome'),
                "email" => $this->request->getPost('email'),
                "senha" => $this->request->getPost('senha'),
                "status" => $this->request->getPost('A'),
            ];

            print_r($dados);
        }
    }