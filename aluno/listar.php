<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Entity\Aluno;
use \App\Db\Pagination;
use \App\Session\Login;

Login::requiredLogin();

$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

// filtro status
$filtroStatus = filter_input(INPUT_GET, 'filterStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['s', 'n']) ? $filtroStatus : '';

// condições SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null,
    strlen($filtroStatus) ? 'ativo = "' . $filtroStatus . '"' : null
];
$condicoes = array_filter($condicoes);
$where = implode(' AND ', $condicoes);


// quantidade de alunos
$quantidadeAlunos = Aluno::getQuantidadeAlunos();

// paginação (10 alunos por página)
$obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1, 5);

// alunos da página atual
$alunos = Aluno::getAlunos(null, 'id ASC', $obPagination->getLimit());
$currentPage = $_GET['pagina'] ?? 1;
$currentPage = (int) $currentPage;


include __DIR__.'/../includes/header.php';
include __DIR__.'/../includes/footer.php';
include __DIR__.'/listagem.php';

