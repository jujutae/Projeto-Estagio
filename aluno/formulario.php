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
                <input type="text" class="form-control" name="nome" value="<?= $obAluno->nome ?>" required>
            </div>

            <div class="form-group">
                <label>CPF</label>
                <input type="number" class="form-control" name="cpf" value="<?= $obAluno->cpf ?>" required>
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone" value="<?= $obAluno->telefone ?>" required>
            </div>

            <div class="form-group">
                <label>Matricula</label>
                <input type="number" class="form-control" name="matricula" value="<?= $obAluno->matricula ?>" required>
            </div>

            <div class="form-group">
                <label>Email pessoal</label>
                <input type="email" class="form-control" name="email_pessoal" value="<?= $obAluno->email_pessoal ?>" required>
            </div>

            <div class="form-group">
                <label>Email Institucional</label>
                <input type="email" class="form-control" name="email_institucional" value="<?= $obAluno->email_institucional ?>" required>
            </div>

            <div class="form-group">
                <label>Curso</label>
                <input type="text" class="form-control" name="curso" value="<?= $obAluno->curso ?>" required>
            </div>

            <div class="form-group">
                <label>Período</label>
                <select class= "form-select">
                    <option value="1">1º</option>
                    <option value="2">2º</option>
                    <option value="3">3º</option>
                    <option value="4">4º</option>
                    <option value="5">5º</option>
                    <option value="6">6º</option>
                    <option value="7">7º</option>
                    <option value="8">8º</option>
                
                </select>
            </div>

            <div class="form-group">
                <label>Data de Nascimento</label>
                <input type="date" class="form-control" name="dtn" value="<?= $obAluno->data ?>" required>
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" name="senha" value="<?= $obAluno->senha ?>" required>
            </div>
            
            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>

        </form>
    </div>

</main>
