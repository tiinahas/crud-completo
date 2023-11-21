<h1>Listar Empréstimos</h1>
<?php
$sql = "SELECT emprestimo.*, livro.titulo_livro AS livro_nome, usuarios.nome_usuario AS usuario_nome
        FROM emprestimo
        INNER JOIN livro ON emprestimo.livro_id_livro = livro.id_livro
        INNER JOIN usuarios ON emprestimo.usuario_id_usuario = usuarios.id_usuario";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Livro</th>";
    print "<th>Usuário</th>";
    print "<th>Data do Empréstimo</th>";
    print "<th>Data de Devolução</th>";
    print "</tr>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>".$row->id_emprestimo."</td>";
        print "<td>".$row->livro_nome."</td>";
        print "<td>".$row->usuario_nome."</td>";
        print "<td>".$row->data_emprestimo."</td>";
        print "<td>".$row->data_devolucao."</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>

