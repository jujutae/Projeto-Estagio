<?php
require __DIR__.'/../vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Inscricao;
use \App\Entity\Aluno;

Login::requiredLogin();

$usuarioLogado = Login::getAlunoLogado();

// só administrador pode ver
if ($usuarioLogado['nivel'] != 2) {
    header('location: /si/index.php?status=forbidden');
    exit;
}

if (!isset($_GET['vaga'])) {
    header('location: /si/vaga/listar.php?status=error');
    exit;
}

$vagaId = (int) $_GET['vaga'];

// busca todos os alunos inscritos na vaga
$inscricoes = Inscricao::getInscricaos('vaga = '.$vagaId);

include __DIR__.'/../includes/header.php';
?>

<div class="container mt-4">
  <h2>Alunos Inscritos na Vaga #<?= $vagaId ?></h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Nome</th>
        <th>Curso</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Data Inscrição</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($inscricoes as $inscricao): 
            $aluno = Aluno::getAluno($inscricao->aluno); ?>
        <tr>
          <td>
            <img src="<?= $aluno->foto ?? '/si/assets/img/default-avatar.png' ?>" 
                 class="rounded-circle" 
                 style="width:50px;height:50px;">
          </td>
          <td><?= htmlspecialchars($aluno->nome) ?></td>
          <td><?= htmlspecialchars($aluno->curso) ?></td>
          <td><?= htmlspecialchars($aluno->email_pessoal) ?></td>
          <td><?= htmlspecialchars($aluno->telefone) ?></td>
          <td><?= date('d/m/Y H:i', strtotime($inscricao->data)) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include __DIR__.'/../includes/footer.php'; ?>
