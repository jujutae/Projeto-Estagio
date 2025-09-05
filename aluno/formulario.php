<main class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="w-50"> <!-- Largura do formulário, você pode ajustar -->
        <section class="mb-3 text-center">
            <a href="listar.php">
                <button class="btn btn-success">Voltar</button>
            </a>
        </section>

        <h2 class="mt-3 text-center"><?= TITLE ?></h2>

        <form method="post">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= $obAluno->nome ?>">
            </div>

            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf" value="<?= $obAluno->cpf ?>">
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone" value="<?= $obAluno->telefone ?>">
            </div>

            <div class="form-group">
                <label>Email pessoal</label>
                <input type="text" class="form-control" name="email_pessoal" value="<?= $obAluno->email_pessoal ?>">
            </div>

            <div class="form-group">
                <label>Email Institucional</label>
                <input type="text" class="form-control" name="email_institucional" value="<?= $obAluno->email_institucional ?>">
            </div>

            <div class="form-group">
                <label>Curso</label>
                <input type="text" class="form-control" name="curso" value="<?= $obAluno->curso ?>">
            </div>

            <div class="form-group">
                <label>Período</label>
                <input type="text" class="form-control" name="periodo" value="<?= $obAluno->periodo ?>">
            </div>

            <div class="form-group">
                <label>Data de Nascimento</label>
                <input type="text" class="form-control" name="dtn" value="<?= $obAluno->data ?>">
            </div>

            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>

        </form>
    </div>

</main>
