<?php

require __DIR__.'/../vendor/autoload.php';


use \App\Entity\Vaga;
use \App\Db\Pagination;

//busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
//filtro status
$filtroStatus = filter_input(INPUT_GET, 'filterStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['s','n']) ? $filtroStatus : '';
//condições Sql
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%' .str_replace(' ','%',$busca).'%"' : null,
    strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];
//remove posições vazias 
$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes); 

$quantidadeVagas = Vaga::getQuantidadeVagas($where);

//paginação
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 5);

$vagas = Vaga:: getVagas($where, null, $obPagination->getLimit());

 //echo $quantidadeVagas."<pre>";  
//print_r($obPagination); 
//echo "</pre>"; 
 //exit;

include __DIR__.'/../includes/header.php';
include __DIR__.'/listagem.php';
include __DIR__.'/../includes/footer.php';




?>