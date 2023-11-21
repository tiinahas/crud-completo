<?php
$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

switch ($acao) {
    case 'cadastrar':
        $nome_categoria = isset($_POST['nome_categoria']) ? $_POST['nome_categoria'] : '';

        $sql = "INSERT INTO categoria (nome_categoria) VALUES ('" . $conn->real_escape_string($nome_categoria) . "')";

        if ($conn->query($sql)) {
            echo "<script>alert('Cadastrou com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar');</script>";
        }
        break;

    case 'editar':
        $nome_categoria = isset($_POST['nome_categoria']) ? $_POST['nome_categoria'] : '';
        $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';

        $sql = "UPDATE categoria SET nome_categoria='" . $conn->real_escape_string($nome_categoria) . "' WHERE id_categoria=" . (int)$id_categoria;

        if ($conn->query($sql)) {
            echo "<script>alert('Editou com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível editar');</script>";
        }
        break;

    case 'excluir':
        $id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : '';

        $sql = "DELETE FROM categoria WHERE id_categoria=" . (int)$id_categoria;

        if ($conn->query($sql)) {
            echo "<script>alert('Excluiu com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível excluir');</script>";
        }
        break;

    default:
        // Ação desconhecida, adote uma abordagem apropriada
        break;
}

// Redirecionamento comum após o processamento
echo "<script>location.href='?page=categoria-listar';</script>";
?>
