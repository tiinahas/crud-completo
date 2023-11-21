<h1>Editar Livro</h1>
<?php
$id_livro = isset($_REQUEST['id_livro']) ? $_REQUEST['id_livro'] : null;

// Verificando se o ID do livro está presente e é um número inteiro válido
if ($id_livro !== null && is_numeric($id_livro)) {
    $sql_1 = "SELECT * FROM livro WHERE id_livro=" . (int)$id_livro;
    $res_1 = $conn->query($sql_1);

    // Verificando se a consulta foi bem-sucedida
    if ($res_1 && $res_1->num_rows > 0) {
        $row_1 = $res_1->fetch_object();
?>
        <form action="?page=livro-salvar" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_livro" value="<?php echo htmlspecialchars($row_1->id_livro); ?>">
            <div class="mb-3">
                <label for="categoria">Categoria</label>
                <select name="categoria_id_categoria" class="form-control" id="categoria">
                    <option value="">- Escolha -</option>
                    <?php
                    $sql = "SELECT * FROM categoria";
                    $res = $conn->query($sql);

                    if ($res && $res->num_rows > 0) {
                        while ($row = $res->fetch_object()) {
                            $selected = ($row_1->categoria_id_categoria == $row->id_categoria) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($row->id_categoria) . "' $selected>" . htmlspecialchars($row->nome_categoria) . "</option>";
                        }
                    } else {
                        echo "<option>Não há resultados</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="titulo">Título</label>
                <input type="text" name="titulo_livro" value="<?php echo htmlspecialchars($row_1->titulo_livro); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="autor">Autor</label>
                <input type="text" name="autor_livro" value="<?php echo htmlspecialchars($row_1->autor_livro); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="editora">Editora</label>
                <input type="text" name="editora_livro" value="<?php echo htmlspecialchars($row_1->editora_livro); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="edicao">Edição</label>
                <input type="text" name="edicao_livro" value="<?php echo htmlspecialchars($row_1->edicao_livro); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="localidade">Localidade</label>
                <input type="text" name="localidade_livro" value="<?php echo htmlspecialchars($row_1->localidade_livro); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="ano">Ano</label>
                <input type="text" name="ano_livro" value="<?php echo htmlspecialchars($row_1->ano_livro); ?>" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
<?php
    } else {
        echo "<p>Não foi possível encontrar o livro com o ID especificado.</p>";
    }
} else {
    echo "<p>ID do livro inválido ou não especificado.</p>";
}
?>
