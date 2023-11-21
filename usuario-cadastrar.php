<h1>Cadastrar Usuário</h1>
<form action="?page=usuario-salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label for="nome_usuario">Nome do Usuário</label>
        <input type="text" name="nome_usuario" id="nome_usuario" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
