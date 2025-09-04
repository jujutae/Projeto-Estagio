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
    <td>' . $aluno->cpf . '</td>
    <td>' . $aluno->telefone . '</td>
    <td>' . $aluno->email_pessoal . '</td>
    <td>' . $aluno->email_institucional . '</td>
    <td>' . $aluno->curso . '</td>
    <td>' . $aluno->periodo . '</td>
    <td>' . date('d/m/Y à\s H:i:s', strtotime($aluno->data)) . '</td>
    <td class="text-nowrap">
      <a href="editar.php?id=' . $aluno->id . '" class="btn btn-sm btn-outline-primary me-1">
        <i class="bi bi-pencil"></i> Editar
      </a>
      <a href="excluir.php?id=' . $aluno->id . '" class="btn btn-sm btn-outline-danger">
        <i class="bi bi-trash"></i> Excluir
      </a>
    </td>
  </tr>';
}

$resultados = strlen($resultados) ? $resultados : '
<tr>
  <td colspan="10" class="text-center text-muted">Nenhum aluno encontrado.</td>
</tr>';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Alunos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        /* Botão azul bebê */
        .btn-baby-blue {
            background-color: #a9d6e5;
            color: #03396c;
            border: 1px solid #82c0cc;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-baby-blue:hover,
        .btn-baby-blue:focus {
            background-color: #82c0cc;
            color: #f0f8ff;
            border-color: #669bb0;
            text-decoration: none;
        }

        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Conteúdo principal -->
    <main class="container py-4 flex-grow-1">

        <!-- Mensagem de status -->
        <?= $mensagem ?>

        <!-- Cabeçalho da listagem -->
        <section class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lista de Alunos</h2>
            <a href="cadastrar.php" class="btn btn-baby-blue">
                <i class="bi bi-plus-circle"></i> Novo aluno
            </a>
        </section>

        <!-- Tabela responsiva com scroll horizontal -->
        <section>
            <div class="table-responsive">
                <table class="table table-bordered table-hover bg-white shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Email Pessoal</th>
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
    </main>


</body>

</html>

<?php if(!empty($obPagination)): ?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <!-- Botão Anterior -->
        <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?pagina=<?= max(1, $currentPage-1) ?>" tabindex="-1">«</a>
        </li>

        <?php
        $pages = $obPagination->getPages();
        $totalPages = count($pages);

        // calcula intervalo de páginas para exibir (máx 3)
        $start = max(1, $currentPage - 1);
        $end   = min($totalPages, $start + 2);

        if(($end - $start) < 2){
            $start = max(1, $end - 2);
        }
        ?>

        <!-- Páginas -->
        <?php for($i = $start; $i <= $end; $i++): ?>
        <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
            <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>

        <!-- Botão Próximo -->
        <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?pagina=<?= min($totalPages, $currentPage+1) ?>">»</a>
        </li>

    </ul>
</nav>
<?php endif; ?>
