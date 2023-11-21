<h1>Cadastrar Empréstimo</h1>
<form action="?page=emprestimo-salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Nome do Livro</label>
        <input type="text" name="livro_nome" class="form-control" placeholder="Nome do Livro">
    </div>

    <div class="mb-3">
        <label>Nome do Usuário</label>
        <input type="text" name="usuario_nome" class="form-control" placeholder="Nome do Usuário">
    </div>

    <div class="mb-3">
        <label>Data do Empréstimo</label>
        <input type="date" name="data_emprestimo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Data de Devolução</label>
        <input type="date" name="data_devolucao" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
