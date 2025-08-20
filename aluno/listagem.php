<?php
 
  $mensagem ='';
  if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'sucess':
            $mensagem = '<div class="alert alert-sucess">Ação executada com sucesso!</div>';
            break;

            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
    }
  }

    $resultados = '';
    foreach ($alunos as $aluno){
        $resultados .= '<tr>
                            <td>'.$aluno->id.'</td>                    
                            <td>'.$aluno->nome.'</td>
                            <td>'.$aluno->cpf.'</td>
                            <td>'.$aluno->telefone.'</td>
                            <td>'.$aluno->email_pessoal.'</td>
                            <td>'.$aluno->email_institucional.'</td>
                            <td>'.$aluno->curso.'</td>
                            <td>'.$aluno->periodo.'</td>
                            <td>'.$aluno->data.'</td>
                            <td>'.date('d/m/Y  á\s H:i:s',strtotime($aluno->data)).'</td>
                            <td>
                               <a href="editar.php?id='.$aluno->id.'">
                                <button type="button" class="btn btn-primary">Editar</button>
                               </a>
                               <a href="excluir.php?id='.$aluno->id.'">
                                <button type="button" class="btn btn-danger">Excluir</button>
                               </a>
                             </td>
                        </tr>';
    }
       $resultados = strlen($resultados) ? $resultados :'<tr.
                                                            <td colspan="6" class="text=center">
                                                            Nenhuma aluno encontrado
                                                            </td>
                                                          </tr>';
?>
<main>

    <?=$mensagem?>

<section>
    <a href="cadastrar.php">
        <button class="btn btn-success"> Novo aluno</button>
    </a>
</section>

<section>

<table class="table bg-light mt-3"> 
     
    <thead> 
        <tr> 
            <th>ID</th> 
            <th>Nome</th> 
            <th>Cpf</th> 
            <th>Telefone</th> 
            <th>Email_pessoal</th> 
            <th>Email_institucional</th> 
            <th>Curso</th> 
            <th>Periodo</th> 
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
            <?= $resultados ?>
    </tbody>
</table>
</section>


</main>
