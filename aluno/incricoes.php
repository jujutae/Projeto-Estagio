<?php
require __DIR__.'/../vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Inscricao;
use \App\Entity\Vaga;

Login::requiredLogin();

$alunoLogado = Login::getAlunoLogado();

// pega todas as inscrições do aluno logado
$inscricoes = Inscricao::getInscricaos('aluno = '.$alunoLogado['id']);

include __DIR__.'/../includes/header.php';
?>

<div class="container mt-4">
    <h2>Minhas Inscrições</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vaga</th>
                <th>Quantidade de Vagas</th>
                <th>Situação</th>
                <th>Data da Inscrição</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($inscricoes): ?>
                <?php foreach ($inscricoes as $inscricao): 
                    $vaga = Vaga::getVaga($inscricao->vaga); ?>
                    <tr>
                        <td><?= $inscricao->id ?></td>
                        <td><?= htmlspecialchars($vaga->titulo ?? 'Vaga removida') ?></td>
                        <td><?= $vaga->quantidade ?? 'N/A' ?></td>
                        <td>
                            <?php
                            switch($inscricao->situacao) {
                                case 'aprovada':
                                    echo '<span class="badge bg-success">Aprovada</span>';
                                    break;
                                case 'reprovada':
                                    echo '<span class="badge bg-danger">Reprovada</span>';
                                    break;
                                default:
                                    echo '<span class="badge bg-secondary">Pendente</span>';
                            }
                            ?>
                        </td>
                        <td><?= date('d/m/Y H:i', strtotime($inscricao->data)) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">Nenhuma inscrição encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__.'/../includes/footer.php'; ?>
