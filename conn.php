<?php
$servername = "localhost";
$database = "cadastro_cidades";
$username = "root";
$password = "";
// conexao
$conn = mysqli_connect($servername, $username, $password, $database);
// verificando conexão 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Conexão realizada";

?>