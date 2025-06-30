<?php

    namespace App\Controllers\Api;
    
    use CodeIgniter\API\ResponseTrait;
    use CodeIgniter\HTTP\Response;
    use App\Controllers\BaseController;
    use App\Service\UsuarioService;
    use App\Validation\FormValidation;

    class UsuarioController extends BaseController
    {
        use ResponseTrait;
         
        protected UsuarioModel $model;
        private $session;

        public function __construct()
        {
            $this->service = service('usuarioService');
        }

        public function listar(): Response
        {
           return $this->respond($this->service->listar(), 200);
        }

        public function buscar(string $id): Response
        {
           return $this->respond($this->service->buscar($id), 200);
        }

        public function salvar(): Response
        {
             $dados = [
                "nome" => $this->request->getPost('nome'),
                "email" => $this->request->getPost('email'),
                "senha" => $this->request->getPost('senha'),
                "status" => $this->request->getPost('status'),
            ];


            if(!$this->validateData($dados,FormValidation::regras())) {
                return $this->fail("Ocorreu um erro e a operação não foi concluída", 500);
            }

            $this->service->salvar($dados);

            return $this->respondCreated($dados);
        }

        public function atualizar(int $id): Response
        {
            $dados = $this->request->getRawInput();

            if(!$this->validateData($dados,FormValidation::regras())) {
                return $this->fail("Ocorreu um erro e a operação não foi concluída", 500);
            }

            if($this->service->atualizar($id,$dados)){
                return $this->respond($dados, 200);
            } else {
                return $this->fail("Ocorreu um erro e a operação não foi concluída", 500);                
            }           
        }

        public function apagar(int $id): Response
        {        
            if($this->service->apagar($id)) {
                return $this->respondNoContent('Usuário remvovido com sucesso'); 
            } else {
                return $this->fail("Ocorreu um erro e a operação não foi concluída", 500);                
            }                    
        }        
    }