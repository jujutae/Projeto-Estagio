<?php

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

$resultados = '';
foreach ($vagas as $vaga) {
    $resultados .= '<tr>
        <td>' . $vaga->id . '</td>
        <td>' . $vaga->titulo . '</td>
        <td>' . $vaga->descricao . '</td>
        <td>' . ($vaga->ativo == 's' ? 'Ativo' : 'Inativo') . '</td>
        <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->data)) . '</td>
        <td>
          <a href="editar.php?id=' . $vaga->id . '" class="btn btn-sm btn-outline-primary me-1">
            <i class="bi bi-pencil"></i> Editar
          </a>
          <a href="excluir.php?id=' . $vaga->id . '" class="btn btn-sm btn-outline-danger">
            <i class="bi bi-trash"></i> Excluir
          </a>
        </td>
    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text-center">Nenhuma vaga encontrada.</td></tr>';

// PAGINAÇÃO - mostrando no máximo 3 botões
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

<main class="container py-4">

    <!-- MENSAGEM -->
    <?= $mensagem ?>

    <!-- BOTÃO NOVA VAGA -->
    <section class="mb-4">
        <a href="cadastrar.php" class="btn btn-baby-blue">
            <i class="bi bi-plus-circle"></i> Nova vaga
        </a>
    </section>

    <!-- FORMULÁRIO DE FILTRO -->
    <section>
        <form method="get" class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Buscar por título</label>
                <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
            </div>

            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select name="filtroStatus" class="form-select">
                    <option value="">Ativa/Inativa</option>
                    <option value="s" <?= $filtroStatus == 's' ? 'selected' : '' ?>>Ativa</option>
                    <option value="n" <?= $filtroStatus == 'n' ? 'selected' : '' ?>>Inativa</option>
                </select>
            </div>

            <div class="col-md-3 d-grid">
                <button type="submit" class="btn btn-baby-blue">
                    <i class="bi bi-funnel"></i> Filtrar
                </button>
            </div>
        </form>
    </section>

    <!-- TABELA DE RESULTADOS -->
    <section class="mt-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
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

    <!-- PAGINAÇÃO -->
    <section class="mt-3">
        <?= $paginacao ?>
    </section>

</main>
