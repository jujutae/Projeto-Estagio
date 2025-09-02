<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Aluno;
use \App\Session\Login;

//Login::requireLogount();

//mensagem de alerta
$alertaLogin = '';

if(isset($_POST['cpf']) && (isset($_POST['senha']))){
    $aluno = $aluno->getAlunoPorCpf($_POST['cpf']);
    if($aluno instanceof Aluno && $aluno->senha == $_POST['senha']){
        $alertaLogin= 'Cpf ou Senha inválidos';
    }
} 
 
Login::login($aluno);

 /*echo "<pre>";  
print_r($vagas); 
echo "</pre>"; 
 exit;*/

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario-login.php';
include __DIR__.'/includes/footer.php';




?>