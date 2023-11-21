<h1>Editar Categoria</h1>

<?php
$id_categoria = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : null;

if (!$id_categoria) {
    echo "ID de categoria inválido.";
    exit;
}

$sql = "SELECT * FROM categoria WHERE id_categoria = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_categoria);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_object();

if (!$row) {
    echo "Categoria não encontrada.";
    exit;
}
?>

<form action="?page=categoria-salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_categoria" value="<?php echo $row->id_categoria; ?>">
    <div class="mb-3">
        <label for="nome_categoria">Nome da Categoria</label>
        <input type="text" value="<?php echo htmlspecialchars($row->nome_categoria); ?>" name="nome_categoria" id="nome_categoria" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>
