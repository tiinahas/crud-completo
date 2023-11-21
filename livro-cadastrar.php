<h1>Cadastrar Livro</h1>
<form action="?page=livro-salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label for="categoria">Categoria</label>
        <select name="categoria_id_categoria" class="form-control" id="categoria">
            <option value="">- Escolha -</option>
            <?php
            $sql = "SELECT * FROM categoria";
            $res = $conn->query($sql);

            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_object()) {
                    echo "<option value='" . htmlspecialchars($row->id_categoria) . "'>" . htmlspecialchars($row->nome_categoria) . "</option>";
                }
            } else {
                echo "<option>Não há resultados</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="titulo">Título</label>
        <input type="text" name="titulo_livro" class="form-control" id="titulo" required>
    </div>
    <div class="mb-3">
        <label for="autor">Autor</label>
        <input type="text" name="autor_livro" class="form-control" id="autor" required>
    </div>
    <div class="mb-3">
        <label for="editora">Editora</label>
        <input type="text" name="editora_livro" class="form-control" id="editora" required>
    </div>
    <div class="mb-3">
        <label for="edicao">Edição</label>
        <input type="text" name="edicao_livro" class="form-control" id="edicao" required>
    </div>
    <div class="mb-3">
        <label for="localidade">Localidade</label>
        <input type="text" name="localidade_livro" class="form-control" id="localidade" required>
    </div>
    <div class="mb-3">
        <label for="ano">Ano</label>
        <input type="text" name="ano_livro" class="form-control" id="ano" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
