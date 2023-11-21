<h1>Listar Usuários</h1>
<?php
$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome do Usuário</th>";
    print "<th>Email</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_usuario . "</td>";
        print "<td>" . $row->nome_usuario . "</td>";

        // Verificação da propriedade 'email_usuario'
        $emailUsuario = property_exists($row, 'email_usuario') ? $row->email_usuario : '';

        print "<td>" . $emailUsuario . "</td>";
        print "<td>
                   <button onclick=\"location.href='?page=usuario-editar&id_usuario=" . $row->id_usuario . "';\" class='btn btn-success'>Editar</button>
                   <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=usuario-salvar&acao=excluir&id_usuario=" . $row->id_usuario . "';}else{false;}\" class='btn btn-danger'>Excluir</button>
               </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "Não encontrou resultado";
}
?>
