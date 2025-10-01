  <?php 
  require __DIR__ . '/vendor/autoload.php';
  use \App\Files\Upload;
  use \App\Entity\Aluno;
  

  echo "<pre>";  
print_r($_FILES); 
echo "</pre>"; 

$aluno = Aluno ::getAluno(1);
    if(isset($_FILES['arquivo'])){

        $upload = new Upload($_FILES['arquivo']);
        $upload->upload(__DIR__.'/includes/imagens/alunos' ,$aluno->cpf);
   
    }

    include "includes/formulario-upload.php";
    ?>