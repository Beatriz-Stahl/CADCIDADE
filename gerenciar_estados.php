<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //atributido os valores que o usuario digitou
    if (isset($_POST["nomecidade"]) && isset($_POST["nomeestado"])) {//qual a necessidade 
     $cidade = $_POST["nomecidade"];
     $estado = $_POST["nomeestado"];
    //inserindo os valores para o banco de dados 
    $stmt = $conn->prepare("INSERT INTO estado (nome_estado,nome_cidade)  values (?, ?)"); //nao entendi direito
    $stmt->bind_param("ss", $estado, $cidade);
    $stmt->execute();
    //verificando se a inserção foi feita
        if ($stmt->affected_rows === 1) {   
            echo "Cadastro bem-sucedido!"; 
        } else { 
            echo "Erro ao cadastrar: " . $conn->error; 
        }
    }
}
   // if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
     $id = $_POST['id_excluir'];
    echo $id;
    echo $_SERVER['REQUEST_METHOD'];
   // $stmt = $conn->prepare("DELETE FROM estado WHERE id = ?");
  //  $stmt->bind_param("i", $id);
   // $stmt->execute();
    //}

 //coletando do banco de dados os campos
    $select = "SELECT id, nome_estado , nome_cidade FROM estado";
    $result = $conn->query($select);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro de cidades</title>
   <link rel="stylesheet" type="text/css" href="/.estilo.css" />
</head>
<body>
    <table border='1'>
    <thead>
        <tr>
            <th>cidade</th>
            <th>estado</th>
            <th>Ações</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Iterando sobre os resultados com foreach
    foreach($rows as $row): ?> 
        <tr>
        <td><?= $row['nome_cidade'] ?> </td>
        <td><?= $row['nome_estado'] ?> </td>
        <td>
                <form action="gerenciar_estados.php" method='DELETE'>
                    <input type="hidden" name="id_excluir" value="<?= $row['id'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            
         </td>

         <td>
         <form action="gerenciar_estados.php" method="POST">
                    <input type="hidden" name="id_excluir" value="<?= $row['id'] ?>">
                    <button type="submit">Editar</button>
                </form>
         </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

    <form action="index.html" method="get">
        <input type="hidden" name="voltar">
        <button   type="submit">voltar para o Cadastro</button>
     
        
    </body>      
</html>