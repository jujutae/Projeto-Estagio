<?php
$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';
?>
<main class="d-flex justify-content-center">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-3">Login</h2>
            <?= $alertaLogin ?>
        </div>
        <div class="card-body">
            <form method="post">

                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpf" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="acao" value="logar" class="btn btn-primary m-2">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</main>