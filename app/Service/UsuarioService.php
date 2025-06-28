<?php

    namespace App\Service;
    
    use App\Repository\UsuarioRepository;
    use App\Models\UsuarioModel;

    class UsuarioService implements UsuarioRepository
    {
        private $model;

        public function __construct(UsuarioModel $model) {
            $this->model = $model;
        }

        public function salvar(array $request)
        {
            return $this->model->insert($request);
        }
    }