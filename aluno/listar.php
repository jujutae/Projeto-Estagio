<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Entity\Aluno;
use \App\Db\Pagination;
use \App\Session\Login;

Login::requiredLogin();

// quantidade de alunos
$quantidadeAlunos = Aluno::getQuantidadeAlunos();

// paginação (10 alunos por página)
$obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1, 5);

// alunos da página atual
$alunos = Aluno::getAlunos(null, 'id ASC', $obPagination->getLimit());
$currentPage = $_GET['pagina'] ?? 1;
$currentPage = (int) $currentPage;


include __DIR__.'/../includes/header.php';
include __DIR__.'/listagem.php';
include __DIR__.'/../includes/footer.php';
include __DIR__.'/../app/Db/Pagination.php';
