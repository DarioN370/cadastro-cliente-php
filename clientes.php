<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>

    <?php



    //Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_cadastro";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Erro na conexão com o banco dados: " . $conn->connect_error);
        }

        //Verificar se o cliente foi excluido

        if (isset($_GET["excluído"]) && $_GET["excluído"] == "true") {
            echo "<p>Cliente excluído com sucesso</p>";
        }


        //Criar um comando SQL para selecionar todos os clientes

        $sql = "SELECT * FROM tb_cliente";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Descrição</th><th>Ações</th></tr>";
        

            while ($row = $result -> fetch_assoc()){

                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";
                echo "<td>";
                echo "<a href='editar_cliente.php?id=" . $row["id"] . "'>Editar</a>";
                echo "|";
                echo "<a href='excluir_cliente.php?id=" . $row["id"] . "'>Excluir</a>";
                echo "</td>";
                echo "<tr>";
            }
            echo "</table>";
        } 

        else {
            echo "Nenhu cliente cadastrado.";
        }

        $conn->close();




    ?>

</body>
</html>