<?php

require __DIR__.'/../vendor/autoload.php';


use \App\Entity\Aluno;

$alunos = Aluno:: getAlunos();
 /*echo "<pre>";  
print_r($alunos); 
echo "</pre>"; 
 exit;*/

include __DIR__.'/../includes/header.php';
include __DIR__.'/listagem.php';
include __DIR__.'/../includes/footer.php';




?>