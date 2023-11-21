<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nomeUsuario = $_POST['nome_usuario'];
            $email = $_POST['email'];
            $sql = "INSERT INTO usuarios (nome_usuario, email_usuario) VALUES ('$nomeUsuario', '$email')";
            $res = $conn->query($sql);

            if ($res) {
                echo "<script>alert('Cadastrou com sucesso!');</script>";
                echo "<script>location.href='?page=usuario-listar';</script>";
            } else {
                echo "<script>alert('Não foi possível cadastrar');</script>";
                echo "<script>location.href='?page=usuario-listar';</script>";
            }
            break;
        
        case 'editar':
            $idUsuario = $_POST['id_usuario'];
            $nomeUsuario = $_POST['nome_usuario'];
            $email = $_POST['email'];
            $sql = "UPDATE usuarios SET
                        nome_usuario='$nomeUsuario',
                        email_usuario='$email'
                    WHERE
                        id_usuario=$idUsuario";
            $res = $conn->query($sql);

            if ($res) {
                echo "<script>alert('Editou com sucesso!');</script>";
                echo "<script>location.href='?page=usuario-listar';</script>";
            } else {
                echo "<script>alert('Não foi possível editar');</script>";
                echo "<script>location.href='?page=usuario-listar';</script>";
            }
            break;

        case 'excluir':
            $idUsuario = $_REQUEST['id_usuario'];
            $sql = "DELETE FROM usuarios WHERE id_usuario=$idUsuario";
            $res = $conn->query($sql);

            if ($res) {
                echo "<script>alert('Excluiu com sucesso!');</script>";
                echo "<script>location.href='?page=usuario-listar';</script>";
            } else {
                echo "<script>alert('Não foi possível excluir');</script>";
                echo "<script>location.href='?page=usuario-listar';</script>";
            }
            break;
    }
?>
