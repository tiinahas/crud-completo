<h1>Editar Empréstimo</h1>
<?php
$id_emprestimo = $_REQUEST['id_emprestimo'];
$sql = "SELECT * FROM emprestimo WHERE id_emprestimo=$id_emprestimo";
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=emprestimo-salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_emprestimo" value="<?php echo $row->id_emprestimo; ?>">

    <!-- Campos de Edição (Semelhante ao Formulário de Cadastro) -->
    <!-- Selecione o Livro, Usuário, Funcionário, Data do Empréstimo e Devolução -->

    <div class="mb-3">
        <label>Data do Empréstimo</label>
        <input type="date" name="data_emprestimo" value="<?php echo $row->data_emprestimo; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Data de Devolução</label>
        <input type="date" name="data_devolucao" value="<?php echo $row->data_devolucao; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
