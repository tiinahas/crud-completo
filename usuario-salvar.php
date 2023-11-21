<?php
$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

switch ($acao) {
    case 'cadastrar':
        // Lógica para cadastrar um novo usuário
        break;

    case 'editar':
        // Lógica para editar um usuário existente
        break;

    case 'excluir':
        $id_usuario = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : '';

        // Desativar temporariamente a verificação de chave estrangeira
        $conn->query("SET foreign_key_checks = 0");

        // Excluir o usuário e registros associados na tabela emprestimo
        $sql = "DELETE FROM usuarios WHERE id_usuario=" . (int)$id_usuario;

        if ($conn->query($sql)) {
            echo "<script>alert('Excluiu com sucesso!');</script>";
        } else {
            echo "<script>alert('Não foi possível excluir usuário');</script>";
        }

        // Reativar a verificação de chave estrangeira
        $conn->query("SET foreign_key_checks = 1");
        break;

    default:
        // Ação desconhecida, adote uma abordagem apropriada
        break;
}

// Redirecionamento comum após o processamento
echo "<script>location.href='?page=usuario-listar';</script>";
?>


