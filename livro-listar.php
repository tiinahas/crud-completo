<h1>Listar Livro</h1>
<?php
$sql = "SELECT l.*, c.nome_categoria
        FROM livro AS l
        INNER JOIN categoria AS c ON l.categoria_id_categoria = c.id_categoria";
$res = $conn->query($sql);

if ($res) {
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Categoria</th>";
        echo "<th>Título</th>";
        echo "<th>Autor</th>";
        echo "<th>Editora</th>";
        echo "<th>Edição</th>";
        echo "<th>Localidade</th>";
        echo "<th>Ano</th>";
        echo "<th>Ações</th>";
        echo "</tr>";

        while ($row = $res->fetch_object()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row->id_livro) . "</td>";
            echo "<td>" . htmlspecialchars($row->nome_categoria) . "</td>";
            echo "<td>" . htmlspecialchars($row->titulo_livro) . "</td>";
            echo "<td>" . htmlspecialchars($row->autor_livro) . "</td>";
            echo "<td>" . htmlspecialchars($row->editora_livro) . "</td>";
            echo "<td>" . htmlspecialchars($row->edicao_livro) . "</td>";
            echo "<td>" . htmlspecialchars($row->localidade_livro) . "</td>";
            echo "<td>" . htmlspecialchars($row->ano_livro) . "</td>";
            echo "<td>
                      <button onclick=\"location.href='?page=livro-editar&id_livro=" . htmlspecialchars($row->id_livro) . "';\" class='btn btn-success'>Editar</button>

                      <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=livro-salvar&acao=excluir&id_livro=" . htmlspecialchars($row->id_livro) . "';}else{false;}\" class='btn btn-danger'>Excluir</button>
                   </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Não encontrou resultado";
    }
} else {
    echo "Erro na execução da consulta SQL.";
}
?>
