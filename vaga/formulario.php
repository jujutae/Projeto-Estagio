<main class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="w-100" style="max-width: 600px;"> <!-- Limita a largura do formulário -->

        <section class="mb-3">
            <a href="listar.php" class="btn btn-baby-blue">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </section>

        <h2 class="text-center mb-4"><?= TITLE ?></h2>

        <form method="post" class="bg-white p-4 rounded shadow-sm">

            <div class="form-group mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $obVaga->titulo ?>">
            </div>

            <div class="form-group mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="5"><?= $obVaga->descricao ?></textarea>
            </div>

            <div class="form-group mb-4">
                <label class="form-label">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ativo" value="s" id="ativo" checked>
                        <label class="form-check-label" for="ativo">Ativo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ativo" value="n" id="inativo" <?= $obVaga->ativo == 'n' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="inativo">Inativo</label>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-baby-blue">
                    <i class="bi bi-send-fill me-1"></i> Enviar
                </button>
            </div>

        </form>
    </div>
</main>