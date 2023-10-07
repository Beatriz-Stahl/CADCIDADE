<?php 
    require "./conn.php";
    $cidade = $_POST["nomecidade"];
    $estado = $_POST["nomeestado"];

    $sql2 = "insert into estado (nome_estado)  values ('$estado');";
    $sql = "insert into cidade (nome_cidade)  values ('$cidade');";
    $result = $conn->query($sql); //para o select faça da mesma forma 
    $result2 = $conn->query($sql2);
    if (!$result) {
        
        die("Connection failed: " . mysqli_connect_error());

    } else if (!$result2) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Consulta SQL para selecionar todas as cidades
    $sql3 = "SELECT nome_cidade FROM cidade";
    $result3 = $conn->query($sql3);

    $sql4 = "SELECT nome_estado FROM estado";
    $result4 = $conn->query($sql4);
    
    echo "<table border='1'>";
    echo "<tr><th>Cidade</th><th>Estado</th></tr>";
    
    if ($result3->num_rows > 0 && $result4->num_rows > 0) {
        // Saída de cada linha
        while(($row3 = $result3->fetch_assoc()) && ($row4 = $result4->fetch_assoc())) {
            echo "<tr><td>" . $row3["nome_cidade"]. "</td><td>" . $row4["nome_estado"]. "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No results</td></tr>";
    }

    echo "</table>";
?>

