<?php

require __DIR__ . '/../vendor/autoload.php';

define('TITLE', 'Cadastrar aluno');



use \App\Entity\Aluno;
use \App\Session\Login;

$obAluno = new Aluno;

Login::requiredLogin();
//VALIDAÇÃO DO POST
if (isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['email_institucional'], $_POST['curso'], $_POST['periodo'], $_POST['dtn'])) {


       $obAluno->nome     = $_POST['nome'];
       $obAluno->cpf  = $_POST['cpf'];
       $obAluno->telefone      = $_POST['telefone'];
       $obAluno->email_pessoal     = $_POST['email_pessoal'];
       $obAluno->email_institucional  = $_POST['email_institucional'];
       $obAluno->curso     = $_POST['curso'];
       $obAluno->periodo  = $_POST['periodo'];
       $obAluno->data     = $_POST['dtn'];
       $obAluno->matricula = $_POST['matricula'];
       $obAluno->nivel = 1;
       $obAluno->cadastrar();

       header('location: /si/aluno/listar.php?status=success');
       exit;
}

/*
echo "<pre>";  
print_r($_POST); 
echo "</pre>"; 
exit;
*/

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/formulario.php';
include __DIR__ . '/../includes/footer.php';
