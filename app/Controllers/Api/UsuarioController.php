<?php

    namespace App\Controllers\Api;
    
    use CodeIgniter\API\ResponseTrait;
    use CodeIgniter\HTTP\Response;
    use App\Controllers\BaseController;
    use App\Service\UsuarioService;

    class UsuarioController extends BaseController
    {
        use ResponseTrait;
         
        //protected UsuarioService $service;
        protected UsuarioModel $model;

        public function __construct()
        {
            $this->service = service('usuarioService');
        }

        public function listar(): Response
        {
           return $this->respond($this->service->listar(), 200);
        }

        public function salvar()
        {
             $dados = [
                "nome" => $this->request->getPost('nome'),
                "email" => $this->request->getPost('email'),
                "senha" => $this->request->getPost('senha'),
                "status" => $this->request->getPost('status'),
            ];

            $this->service->salvar($dados);

            return $this->respondCreated($dados);
        }

        public function apagar(int $id)
        {        
            if($this->service->apagar($id)) {
                return $this->respondNoContent('Usuário remvovido com sucesso'); 
            } else {
                return $this->failNotFound("Ocorreu um erro e a operação não foi concluída");
            }                    
        }
    }