<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UsuarioModel extends Model
    {
        protected $table = "usuarios";
        protected $primaryKey = "id";

        protected $useAutoIncrement = true;

        protected $allowedFields    = ['nome', 'email', 'senha', 'status'];
    }