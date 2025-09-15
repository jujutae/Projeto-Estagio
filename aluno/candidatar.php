<?php
require __DIR__.'/../vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Candidatura;

Login::requiredLogin();

$usuarioLogado = Login::getAlunoLogado();

// só aluno pode se candidatar
if ($usuarioLogado['nivel'] != 1) {
    header('location: listar.php?status=error');
    exit;
}

if (isset($_GET['vaga'])) {
    $candidatura = new Candidatura;
    $candidatura->id_aluno = $AlunoLogado['id'];
    $candidatura->id_vaga  = $_GET['vaga'];
    $candidatura->cadastrar();

    header('location: listar.php?status=sucess');
    exit;
}
