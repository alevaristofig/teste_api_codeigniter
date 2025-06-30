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

        public function buscar(string $id): array | null
        {
            return $this->model->find($id);
        }

        public function salvar(array $request): int | bool
        {     
            $request['senha'] = password_hash($request['senha'],PASSWORD_DEFAULT);                
            return $this->model->insert($request);
        }

        public function atualizar(int $id, array $request): int | bool
        {
            $usuario = $this->model->find($id);

            if(!$usuario) {
                return false;
            }

            return $this->model->update($id,$request);
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