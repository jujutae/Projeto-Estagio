<?php
require __DIR__.'/../vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Inscricao;

Login::requiredLogin();

$alunoLogado = Login::getAlunoLogado();

if (isset($_GET['vaga'])) {
    $inscricao = new Inscricao();
    $inscricao->aluno = $alunoLogado['id'];
    $inscricao->vaga  = $_GET['vaga'];
    $inscricao->cadastrar();

    header('location: /si/inscricao/listar.php?status=sucess');
    exit;
}
