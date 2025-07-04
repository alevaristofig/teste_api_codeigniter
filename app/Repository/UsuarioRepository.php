<?php

    namespace App\Repository;

    use CodeIgniter\HTTP\Response;

    interface UsuarioRepository 
    {
        public function salvar(array $request): int | bool;
        public function listar(): array;
        public function buscar(string $id): array | null;
        public function apagar(int $id): bool;
        public function atualizar(int $id, array $request):  int | bool;
    }