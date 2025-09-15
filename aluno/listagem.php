<?php
// Mensagens de status
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'sucess':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
    }
}

// Tabela de resultados
$resultados = '';
foreach ($alunos as $aluno) {
    $resultados .= '<tr>
    <td>' . $aluno->id . '</td>
    <td>' . $aluno->nome . '</td>
    <td>' . $aluno->matricula . '</td>
    <td>' . $aluno->cpf . '</td>
    <td>' . $aluno->telefone . '</td>
    <td>' . $aluno->email_institucional . '</td>
    <td>' . $aluno->curso . '</td>
    <td>' . $aluno->periodo . '</td>
    <td>' . date('d/m/Y \à\s H:i:s', strtotime($aluno->data)) . '</td>
    <td class="text-nowrap">
      <a href="editar.php?id=' . $aluno->id . '" class="btn btn-sm btn-outline-primary me-1">
        <i class="bi bi-pencil"></i> 
      </a>
      <a href="excluir.php?id=' . $aluno->id . '" class="btn btn-sm btn-outline-danger">
        <i class="bi bi-trash"></i> 
      </a>
    </td>
  </tr>';
}

$resultados = strlen($resultados) ? $resultados : '
<tr>
  <td colspan="10" class="text-center text-muted">Nenhum aluno encontrado.</td>
</tr>';

// PAGINAÇÃO
$paginas = $obPagination->getPages();
$totalPaginas = count($paginas);
$paginaAtual = $_GET['pagina'] ?? 1;
$paginaAtual = (int)$paginaAtual;

$start = max($paginaAtual - 1, 1);
$end = min($start + 2, $totalPaginas);

$gets = $_GET;
unset($gets['pagina']);
$getsQuery = http_build_query($gets);

$paginacao = '<nav><ul class="pagination justify-content-center">';

// Botão "Anterior"
$prevPage = max($paginaAtual - 1, 1);
$paginacao .= '<li class="page-item ' . ($paginaAtual == 1 ? 'disabled' : '') . '">
    <a class="page-link" href="?pagina=' . $prevPage . '&' . $getsQuery . '">&laquo;</a>
</li>';

// Botões das páginas
for ($i = $start; $i <= $end; $i++) {
    $active = $i == $paginaAtual ? 'active' : '';
    $paginacao .= '<li class="page-item ' . $active . '">
        <a class="page-link" href="?pagina=' . $i . '&' . $getsQuery . '">' . $i . '</a>
    </li>';
}

// Botão "Próximo"
$nextPage = min($paginaAtual + 1, $totalPaginas);
$paginacao .= '<li class="page-item ' . ($paginaAtual == $totalPaginas ? 'disabled' : '') . '">
    <a class="page-link" href="?pagina=' . $nextPage . '&' . $getsQuery . '">&raquo;</a>
</li>';

$paginacao .= '</ul></nav>';
?>

<!-- Conteúdo principal -->
<main class="container py-4 flex-grow-1">

    <!-- Mensagem de status -->
    <?= $mensagem ?>

    <section class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Lista de Alunos</h2>
        <a href="cadastrar.php" class="btn btn-baby-blue">
            <i class="bi bi-plus-circle"></i> Novo aluno
        </a>
    </section>
    <!-- Filtros -->
    <section class="mb-4">
        <form method="get" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="busca" class="form-control" placeholder="Pesquisar por nome" value="<?= $busca ?>">
            </div>
            <div class="col-md-3">
                <select name="curso" class="form-select">
                    <option value="">-- Curso --</option>
                    <option value="Técnico em Meio Ambiente - Integrada - Série Anual" <?= ($curso == 'Meio Ambiente') ? 'selected' : '' ?>>Técnico em Meio Ambiente - Integrada - Série Anual </option>
                    <option value="Técnico em Administração - Integrada - Série Anual" <?= ($curso == 'Administração') ? 'selected' : '' ?>>Técnico em Administração - Integrada - Série Anual</option>
                    <option value="Técnico em Informatica - Integrada - Série Anual" <?= ($curso == 'Informatica') ? 'selected' : '' ?>>Técnico em Informatica - Integrada - Série Anual</option>
                </select>
            </div>
            <div class="col-md-2 d-flex">
                <button type="submit" class="btn btn-baby-blue me-2 flex-grow-1">
                    <i class="bi bi-funnel"></i> Buscar
                </button>
            </div>
        </form>
    </section>



    <!-- Tabela responsiva -->
    <section>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Matricula</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email Institucional</th>
                        <th>Curso</th>
                        <th>Período</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $resultados ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Paginação -->
    <div class="mt-3">
        <?= $paginacao ?>
    </div>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>