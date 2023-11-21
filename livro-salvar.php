<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $categoria_id = intval($_POST["categoria_id_categoria"]);
        $titulo = $conn->real_escape_string($_POST["titulo_livro"]);
        $autor = $conn->real_escape_string($_POST["autor_livro"]);
        $editora = $conn->real_escape_string($_POST["editora_livro"]);
        $edicao = $conn->real_escape_string($_POST["edicao_livro"]);
        $localidade = $conn->real_escape_string($_POST["localidade_livro"]);
        $ano = intval($_POST["ano_livro"]);

        $sql = "INSERT INTO livro (
                    categoria_id_categoria,
                    titulo_livro,
                    autor_livro,
                    editora_livro,
                    edicao_livro,
                    localidade_livro,
                    ano_livro
                ) VALUES (
                    $categoria_id,
                    '$titulo',
                    '$autor',
                    '$editora',
                    '$edicao',
                    '$localidade',
                    $ano
                )";

        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Cadastrou com sucesso!');</script>";
            echo "<script>location.href='?page=livro-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar');</script>";
            echo "<script>location.href='?page=livro-listar';</script>";
        }
        break;

    case 'editar':
        $categoria_id = intval($_POST['categoria_id_categoria']);
        $titulo = $conn->real_escape_string($_POST['titulo_livro']);
        $autor = $conn->real_escape_string($_POST['autor_livro']);
        $editora = $conn->real_escape_string($_POST['editora_livro']);
        $edicao = $conn->real_escape_string($_POST['edicao_livro']);
        $localidade = $conn->real_escape_string($_POST['localidade_livro']);
        $ano = intval($_POST['ano_livro']);
        $livro_id = intval($_POST['id_livro']);

        $sql = "UPDATE livro SET
                    categoria_id_categoria=$categoria_id,
                    titulo_livro='$titulo',
                    autor_livro='$autor',
                    editora_livro='$editora',
                    edicao_livro='$edicao',
                    localidade_livro='$localidade',
                    ano_livro=$ano
                WHERE
                    id_livro=$livro_id";

        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Editou com sucesso!');</script>";
            echo "<script>location.href='?page=livro-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível editar');</script>";
            echo "<script>location.href='?page=livro-listar';</script>";
        }
        break;

    case 'excluir':
        $livro_id = intval($_REQUEST['id_livro']);

        $sql = "DELETE FROM livro WHERE id_livro=$livro_id";

        $res = $conn->query($sql);

        if ($res) {
            echo "<script>alert('Excluiu com sucesso!');</script>";
            echo "<script>location.href='?page=livro-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível excluir');</script>";
            echo "<script>location.href='?page=livro-listar';</script>";
        }
        break;
}
?>
