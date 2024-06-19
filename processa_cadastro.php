<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // CONEXAO COM BANCO DE DADOS
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "db_cadastro";

    $conn = new mysqli($servername,$username,$password,$db_name);

    if ($conn->connect_error){
        die("Erro na conexão com o banco e dados:" . $conn->connect_error);
    }

    // captura os dados do formulario
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $descricao = $_POST["descricao"];

    // sql para inserir os dados coletados na tabela clientes
    $sql = "INSERT INTO tb_cliente (nome, email, telefone, descricao) VALUES ('$nome', '$email', '$telefone', '$descricao')";

    if($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar:" . $conn->error;

    
    } 
    $conn->close();
}
?>

<a href="index.php">Voltar</a>


?>