<?php

require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;
use \App\Session\Login;

Login::requiredLogin();

// busca
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

// quantidade de vagas
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

// paginação (5 vagas por página)
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 4);

// vagas da página atual
$vagas = Vaga::getVagas($where, null, $obPagination->getLimit());

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/listagem.php';
include __DIR__ . '/../includes/footer.php';

?>