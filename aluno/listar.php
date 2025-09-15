<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Entity\Aluno;
use \App\Db\Pagination;
use \App\Session\Login;

Login::requiredLogin();

$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

$curso = filter_input(INPUT_GET, 'curso', FILTER_SANITIZE_STRING);



// condições SQL
$condicoes = [
    strlen($busca) ? 'nome LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null,
    strlen($curso) ? 'curso LIKE "%' . str_replace(' ', '%', $curso) . '%"' : null
  
];
$condicoes = array_filter($condicoes);
$where = implode(' AND ', $condicoes);


// quantidade de alunos
$quantidadeAlunos = Aluno::getQuantidadeAlunos();

// paginação (10 alunos por página)
$obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1, 4);

// alunos da página atual
$alunos = Aluno::getAlunos($where, 'id desc', $obPagination->getLimit());
$currentPage = $_GET['pagina'] ?? 1;
$currentPage = (int) $currentPage;


include __DIR__.'/../includes/header.php';
include __DIR__.'/../includes/footer.php';
include __DIR__.'/listagem.php';

?>

<?php if ($_SESSION['usuario_nivel'] == 2): ?>
  <!-- Botões de administração -->
  <a href="editar.php?id=<?= $aluno->id ?>" class="btn btn-sm btn-outline-primary me-1">
    <i class="bi bi-pencil"></i>
  </a>
  <a href="excluir.php?id=<?= $aluno->id ?>" class="btn btn-sm btn-outline-danger">
    <i class="bi bi-trash"></i>
  </a>
<?php endif; ?>

<?php if ($_SESSION['usuario_nivel'] == 1): ?>
  <!-- Botão para se candidatar à vaga -->
  <a href="candidatar.php?id=<?= $vaga->id ?>" class="btn btn-sm btn-success">
    <i class="bi bi-hand-index"></i> Candidatar-se
  </a>
<?php endif; ?>

