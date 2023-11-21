<?php
try {
    // Lógica para buscar IDs correspondentes aos nomes do livro e usuário no banco de dados
    $livro_nome = isset($_POST['livro_nome']) ? $_POST['livro_nome'] : '';
    $usuario_nome = isset($_POST['usuario_nome']) ? $_POST['usuario_nome'] : '';
    $data_emprestimo = isset($_POST['data_emprestimo']) ? $_POST['data_emprestimo'] : '';
    $data_devolucao = isset($_POST['data_devolucao']) ? $_POST['data_devolucao'] : '';

    // Verificar se os nomes do livro e usuário foram fornecidos
    if ($livro_nome !== '' && $usuario_nome !== '' && $data_emprestimo !== '' && $data_devolucao !== '') {
        // Buscar IDs correspondentes aos nomes do livro e usuário no banco de dados diretamente na consulta
        $sql = "INSERT INTO emprestimo (livro_id_livro, usuario_id_usuario, data_emprestimo, data_devolucao)
                SELECT livro.id_livro, usuarios.id_usuario, '$data_emprestimo', '$data_devolucao'
                FROM livro, usuarios
                WHERE livro.titulo_livro = '$livro_nome' AND usuarios.nome_usuario = '$usuario_nome'";

        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Cadastrou com sucesso!');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar');</script>";
            echo "<script>location.href='?page=emprestimo-listar';</script>";
        }
    } else {
        echo "<script>alert('Livro, usuário ou datas não foram preenchidos corretamente');</script>";
        echo "<script>location.href='?page=emprestimo-listar';</script>";
    }
} catch (Exception $e) {
    // Captura e exibe mensagens de exceção
    echo "Erro: " . $e->getMessage();
}
?>

