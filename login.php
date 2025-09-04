<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Aluno;
use \App\Session\Login;

Login::requireLogout();

//mensagem de alerta
$alertaLogin = '';

if (isset($_POST['cpf'], $_POST['senha'])) {

    // Busca aluno pelo CPF
    $aluno = Aluno::getAlunoPorCpf($_POST['cpf']); // método estático esperado

    echo "<pre>";  
print_r($aluno); 
echo "</pre>"; 

    // Verifica se encontrou e valida a senha
    if (!$aluno instanceof Aluno || !password_verify($_POST['senha'], $aluno->senha)) {
        $alertaLogin = 'CPF ou Senha inválidos';
    } else {
        // Realiza login
        Login::login($aluno);
        exit;
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';
include __DIR__ . '/app/Db/Pagination.php';
