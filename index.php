<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Vaga;
// use \App\File\Upload;

// if(isset($_FILES['arquivo'])){
// $upload = new Upload($_FILES['arqivo']);
// $sucesso = $upload -> upload(__DIR__.'/file');
// if ($sucesso){ 
// echo 'Arquivo enviado com sucesso"';
// exit;
// }
//         die('Problemas ao enviar o arquivo ');
// }


$alunoLogado = Login::getAlunoLogado();
$vagas = Vaga::getVagas(null, 'id DESC', 3); // últimas 3 vagas

include __DIR__ . '/includes/header.php';

/*echo "<pre>";  
print_r($vagas); 
echo "</pre>"; 
 exit;*/

include __DIR__. '/includes/home.php';  
include __DIR__. '/includes/footer.php';




?>