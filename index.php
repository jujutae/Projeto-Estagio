<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Vaga;

$alunoLogado = Login::getAlunoLogado();
$vagas = Vaga::getVagas(null, 'id DESC', 3); // últimas 3 vagas

include __DIR__ . '/includes/header.php';
?>

<div class="container mt-5">

    <!-- Hero -->
    <div class="p-5 mb-4 bg-light rounded-3 shadow">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold text-primary">Bem-vindo ao WDEV Vagas!</h1>
            <p class="col-md-8 fs-4 mx-auto">
                Descubra oportunidades de estágio e dê o próximo passo na sua carreira.
            </p>
            <a href="/si/vaga/listar.php" class="btn btn-lg btn-success mt-3">
                <i class="bi bi-search"></i> Ver Vagas Disponíveis
            </a>
        </div>
    </div>

    <!-- Funcionalidades -->
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-person-circle display-4 text-primary"></i>
                    <h5 class="card-title mt-3">Meu Perfil</h5>
                    <p class="card-text">Veja e edite suas informações pessoais.</p>
                    <a href="/si/aluno/perfil.php" class="btn btn-outline-primary">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-briefcase display-4 text-success"></i>
                    <h5 class="card-title mt-3">Vagas</h5>
                    <p class="card-text">Consulte todas as vagas de estágio disponíveis.</p>
                    <a href="/si/vaga/listar.php" class="btn btn-outline-success">Ver Vagas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <i class="bi bi-journal-check display-4 text-warning"></i>
                    <h5 class="card-title mt-3">Minhas Inscrições</h5>
                    <p class="card-text">Acompanhe as vagas em que você já se candidatou.</p>
                    <a href="/si/inscricao/listar.php" class="btn btn-outline-warning">Acompanhar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimas Vagas -->
    <h2 class="mb-4">Últimas Vagas</h2>
    <div class="row">
        <?php foreach ($vagas as $vaga): ?>
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($vaga->titulo) ?></h5>
                        <p class="card-text"><?= substr(htmlspecialchars($vaga->descricao), 0, 80) ?>...</p>
                        <a href="/si/vaga/detalhes.php?id=<?= $vaga->id ?>" class="btn btn-sm btn-primary">
                            <i class="bi bi-eye"></i> Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="/si/vaga/listar.php" class="btn btn-outline-primary mt-3">Ver Todas as Vagas</a>
</div>

<?php
/*echo "<pre>";  
print_r($vagas); 
echo "</pre>"; 
 exit;*/

include __DIR__ . '/includes/footer.php';




?>