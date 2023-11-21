<h1>Cadastrar Categoria</h1>
<form action="?page=categoria-salvar" method="POST" onsubmit="return confirm('Tem certeza que deseja cadastrar?')">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label for="nome_categoria">Nome da Categoria</label>
		<input type="text" name="nome_categoria" id="nome_categoria" class="form-control" required>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>
