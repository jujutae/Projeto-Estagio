<?php
require __DIR__.'/../vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Aluno;

Login::requiredLogin();

$alunoLogado = Login::getAlunoLogado();

// buscar os dados atuais do aluno
$aluno = Aluno::getAluno($alunoLogado['id']);

if (!$aluno instanceof Aluno) {
    header('location: /si/index.php?status=error');
    exit;
}

// processar formulário
if (isset($_POST['nome'], $_POST['telefone'], $_POST['email_pessoal'])) {
    $aluno->nome           = $_POST['nome'];
    $aluno->telefone       = $_POST['telefone'];
    $aluno->email_pessoal  = $_POST['email_pessoal'];

    $aluno->atualizar();

    header('location: editar.php?status=sucess');
    exit;
}

include __DIR__.'/../includes/header.php';
?>

<h2>Editar Meus Dados</h2>

<form method="post">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($aluno->nome) ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Telefone</label>
    <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($aluno->telefone) ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Email Pessoal</label>
    <input type="email" name="email_pessoal" class="form-control" value="<?= htmlspecialchars($aluno->email_pessoal) ?>" required>
  </div>

  <button type="submit" class="btn btn-success">Salvar Alterações</button>
</form>

<?php include __DIR__.'/../includes/footer.php'; ?>
