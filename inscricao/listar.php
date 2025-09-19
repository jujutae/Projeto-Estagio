<?php
require __DIR__.'/../vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Inscricao;

Login::requiredLogin();

$alunoLogado = Login::getAlunoLogado();

// pega todas as inscrições do aluno logado
$inscricoes = Inscricao::getInscricaos('aluno = '.$alunoLogado['id']);

include __DIR__.'/../includes/header.php';
?>

<h2>Minhas Inscrições</h2>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Vaga</th>
      <th>Data</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($inscricoes as $inscricao): ?>
      <tr>
        <td><?= $inscricao->id ?></td>
        <td><?= $inscricao->vaga ?></td>
        <td><?= date('d/m/Y H:i', strtotime($inscricao->data)) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__.'/../includes/footer.php'; ?>
