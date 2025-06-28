<?php

    namespace App\Service;
    
    use App\Repository\UsuarioRepository;
    use App\Models\UsuarioModel;

    class UsuarioService implements UsuarioRepository
    {
       protected UsuarioModel $model;

        public function __construct() {
            $this->model = new UsuarioModel();
        }

        public function listar(): array
        {
            return $this->model->findAll();
        }

        public function salvar(array $request): int | bool
        {            
            return $this->model->insert($request);
        }

        public function apagar(int $id): bool
        {
            
            $usuario = $this->model->find($id);

            if(!$usuario) {
                return false;
            }

            $this->model->delete($id);

            return true;
        }
    }