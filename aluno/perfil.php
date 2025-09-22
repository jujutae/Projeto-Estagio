<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Aluno;

// obrigar login
Login::requiredLogin();

// pega o aluno logado
$alunoLogado = Login::getAlunoLogado();

// busca no banco os dados completos
$aluno = Aluno::getAluno($alunoLogado['id']);

include __DIR__ . '/../includes/header.php';
?>

<main class="container py-4">
    <h2>Meu Perfil</h2>
    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <td><?= $aluno->nome ?></td>
        </tr>
        <tr>
            <th>Matrícula</th>
            <td><?= $aluno->matricula ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?= $aluno->cpf ?></td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td><?= $aluno->telefone ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $aluno->email_institucional ?></td>
        </tr>
        <tr>
            <th>Curso</th>
            <td><?= $aluno->curso ?></td>
        </tr>
        <tr>
            <th>Período</th>
            <td><?= $aluno->periodo ?></td>
        </tr>
        <tr>
            <th>Data de cadastro</th>
            <td><?= date('d/m/Y H:i', strtotime($aluno->data)) ?></td>
        </tr>
    </table>

    <a href="editar.php?id=<?= $aluno->id ?>" class="btn btn-primary">
        <i class="bi bi-pencil"></i> Editar Perfil
    </a>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
