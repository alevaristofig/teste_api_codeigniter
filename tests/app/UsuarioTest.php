<?php

use CodeIgniter\Test\CIUnitTestCase;
use Config\App;
use Tests\Support\Libraries\ConfigReader;
use App\Models\UsuarioModel;
use App\Service\UsuarioService;

final class UsuarioTest extends CIUnitTestCase 
{
    public function testInserirUsuarioSucess(): void 
    {
        $usuarioMock = $this->createMock(UsuarioModel::class);

        $dados = [
            "nome" => "Alexandre",
            "email" => "alevaristofig@gmail.com",
            "senha" => "12345",
            "status" => "A",
        ];

        $usuarioMock->expects($this->once())
                ->method('insert')
                ->with($dados)
                ->willReturn(1);

        $service = new UsuarioService($usuarioMock);
        $result = $service->salvar($dados);

        $this->assertEquals(1,$result);
    }
}