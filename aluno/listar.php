<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Entity\Aluno;
use \App\Db\Pagination;
use \App\Session\Login;

Login::requiredLogin();

$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

$curso = filter_input(INPUT_GET, 'curso', FILTER_SANITIZE_STRING);



// condições SQL
$condicoes = [
    strlen($busca) ? 'nome LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null,
    strlen($curso) ? 'curso LIKE "%' . str_replace(' ', '%', $curso) . '%"' : null
  
];
$condicoes = array_filter($condicoes);
$where = implode(' AND ', $condicoes);


// quantidade de alunos
$quantidadeAlunos = Aluno::getQuantidadeAlunos();

// paginação (10 alunos por página)
$obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1, 4);

// alunos da página atual
$alunos = Aluno::getAlunos($where, 'id desc', $obPagination->getLimit());
$currentPage = $_GET['pagina'] ?? 1;
$currentPage = (int) $currentPage;


include __DIR__.'/../includes/header.php';
include __DIR__.'/../includes/footer.php';
include __DIR__.'/listagem.php';

?>


