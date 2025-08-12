<?php

require __DIR__.'/vendor/autoload.php';


 use \App\Entity\Vaga;

 if(!isset($_GET['id']) or !is_numeric($_GET['id'])){

    header('location: index.php?status=error');
    exit;
 }
 //CONSULTAR VAGA
    $obVaga = Vaga:: getVaga($_GET['id']);
   

//validação a vaga
   if(!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
   }
   

//VALIDAÇÃO DO POST
       if(isset($_POST['excluir'])){

              $obVaga-> excluir() ;

              header('location: index.php?status=sucess');
              exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';
/*
echo "<pre>";  
print_r($_POST); 
echo "</pre>"; 
exit;
*/