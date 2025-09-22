<?php

require __DIR__ . '/../vendor/autoload.php';

define('TITLE', 'Editar aluno');

use \App\Entity\Aluno;
use \App\Session\Login;

Login::requiredLogin();

// usuário logado
$alunoLogado = Login::getAlunoLogado();

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: /si/aluno/listar.php?status=error');
    exit;
}

// consultar aluno
$aluno = Aluno::getAluno($_GET['id']);

// validação do aluno
if (!$aluno instanceof Aluno) {
   header('location: /si/aluno/listar.php?status=error');
   exit;
}

// segurança extra: aluno comum só pode editar o próprio perfil
if ($alunoLogado['nivel'] != 2 && $alunoLogado['id'] != $aluno->id) {
   header('location: /si/aluno/perfil.php?status=error');
   exit;
}

$voltar = ($alunoLogado['nivel'] == 2) ? 'listar.php' : 'perfil.php';

// validação do POST
if (isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['email_pessoal'], $_POST['email_institucional'], $_POST['curso'], $_POST['periodo'], $_POST['data'], $_POST['matricula'])) {

    $aluno->nome               = $_POST['nome'];
    $aluno->cpf                = $_POST['cpf'];
    $aluno->telefone           = $_POST['telefone'];
    $aluno->email_pessoal      = $_POST['email_pessoal'];
    $aluno->email_institucional= $_POST['email_institucional'];
    $aluno->curso              = $_POST['curso'];
    $aluno->periodo            = $_POST['periodo'];
    $aluno->data               = $_POST['data'];
    $aluno->matricula          = $_POST['matricula'];

    $aluno->atualizar();

    // redireciona de acordo com o nível
    if ($alunoLogado['nivel'] == 2) {
        header('location: /si/aluno/listar.php?status=success');
    } else {
        header('location: /si/aluno/perfil.php?status=success');
    }
    exit;
}

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/formulario.php';
include __DIR__ . '/../includes/footer.php';

/*
echo "<pre>";  
print_r($_POST); 
echo "</pre>"; 
exit;
*/
