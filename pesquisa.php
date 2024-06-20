
<?php

    //Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_cadastro";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $termo = $_GET ["termo"];

    $sql = "SELECT * FROM tb_cliente WHERE nome LIKE '%termo%' OR email LIKE '%termo%' OR telefone LIKE '%termo%' OR descricao LIKE '%termo%'"; 

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Resultados da pesquisa</h2>";
        echo "<table border='1'";
        echo "<tr>
        <th>Nome</th><th>Email</th><th>Telefone</th><th>Descrição</th></tr>";
        while($row = result->fetch_assoc()){
            echo "<th><td>".$row["nome"] . "<th><td>".$row["email"] . "<th><td>".$row["telefone"] . "<th><td>".$row["descricao"] . "<th><td>";
        }
        echo "</table>";
    }else{
        echo "Nenhum resultado encontrado.";
    }



?>