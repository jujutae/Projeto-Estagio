<?php

require __DIR__.'/vendor/autoload.php';


 use \App\Entity\Vaga;
//VALIDAÇÃO DO POST
if(isset(s_POST['titulo'], $_POST['descricao'],$_POST['ativo'])){
       $obVaga= new Vaga;
       $obVaga->titulo=$_POST['titulo'] ;
       $obVaga->descricao =$_POST['descricao'];
       $obVaga-> ativo =$_POST['ativo'];
}
echo "<pre>";  
print_r($obVaga); 
echo "</pre>"; 
exit;

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
/*
echo "<pre>";  
print_r($_POST); 
echo "</pre>"; 
exit;
*/

?>