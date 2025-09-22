<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Session\Login;
use App\Entity\Inscricao;
use App\Entity\Vaga;

Login::requiredLogin();

$alunoLogado = Login::getAlunoLogado();

// buscar os dados atuais do aluno
$inscricao = Inscricao::getInscricaoPorAluno($alunoLogado['id']);
$vagas = Vaga::getVagas();
// processar formulário
if (isset($_POST['vaga'])) {


  $inscricao->vaga->id = $_POST['vaga'];
  $inscricao->atualizar();

  header('location: /si/index.php?status=sucess');
  exit;
}
$resultados = '';



foreach ($vagas as $vaga) {
  $resultados .= '<option value="' . $vaga->id . '">' . $vaga->titulo . '</option>';
}

include __DIR__ . '/../includes/header.php';
?>

<h2>Editar Meus Dados</h2>

<form method="post">
  <div class="mb-3">
    <label class="form-label">Selecione a Vaga!</label>
    <select name="vaga">
      <option>--------</option>
      <?= $resultados ?>
    </select>
  </div>


  <button type="submit" class="btn btn-success">Salvar Alterações</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>