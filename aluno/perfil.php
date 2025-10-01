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
<main class="container my-4">
    <div class="card shadow-lg border-0">
        <div class="card-body">

            <!-- Título -->
            <h3 class="text-center mb-4 fw-bold">Ficha do Aluno</h3>

            <div class="row">
                <!-- Foto -->
                <div class="col-md-3 text-center">
                    <?php if ($aluno->cpf) : ?>
                        <img src="/si/includes/imagens/alunos/<?= $aluno->cpf ?>.png"
                            alt="Foto do aluno"
                            class="img-thumbnail rounded shadow-sm"
                            style="width:180px; height:180px; object-fit:cover;">
                    <?php else : ?>
                        <img src="/../includes/imagens/avatar.png"
                            alt="Sem foto"
                            class="img-thumbnail rounded shadow-sm"
                            style="width:180px; height:180px; object-fit:cover;">
                    <?php endif; ?>
                </div>

                <!-- Dados principais -->
                <div class="col-md-9">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nome</label>
                            <p class="form-control-plaintext border p-2"><?= $aluno->nome ?></p>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Matrícula</label>
                            <p class="form-control-plaintext border p-2"><?= $aluno->matricula ?></p>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">CPF</label>
                            <p class="form-control-plaintext border p-2"><?= $aluno->cpf ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Data de Nascimento</label>
                            <p class="form-control-plaintext border p-2"><?= date('d/m/Y', strtotime($aluno->data)) ?></p>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Telefone</label>
                            <p class="form-control-plaintext border p-2"><?= $aluno->telefone ?></p>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Email</label>
                            <p class="form-control-plaintext border p-2"><?= $aluno->email_institucional ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Curso</label>
                            <p class="form-control-plaintext border p-2"><?= $aluno->curso ?></p>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Período</label>
                            <p class="form-control-plaintext border p-2"><?= $aluno->periodo ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botão editar -->
            <div class="text-end mt-4">
                <a href="editar.php?id=<?= $aluno->id ?>" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> Editar Perfil
                </a>
            </div>

        </div>
    </div>
</main>


<?php include __DIR__ . '/../includes/footer.php'; ?>