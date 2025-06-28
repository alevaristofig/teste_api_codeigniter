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

        public function salvar(array $request)
        {            
            return $this->model->insert($request);
        }
    }