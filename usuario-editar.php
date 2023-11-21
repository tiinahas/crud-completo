<h1>Editar Usuário</h1>
<?php
    $id_usuario = isset($_REQUEST['id_usuario']) ? intval($_REQUEST['id_usuario']) : 0;

    // Evite SQL injection usando prepared statements
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
?>
    <form action="?page=usuario-salvar" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_usuario" value="<?php echo $row->id_usuario; ?>">
        <div class="mb-3">
            <label for="nome_usuario">Nome do Usuário</label>
            <input type="text" value="<?php echo htmlspecialchars($row->nome_usuario); ?>" name="nome_usuario" id="nome_usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" value="<?php echo htmlspecialchars($row->email); ?>" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
<?php
    } else {
        echo "<p>Usuário não encontrado.</p>";
    }

    $stmt->close();
?>
