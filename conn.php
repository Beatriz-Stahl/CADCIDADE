<?php
$servername = "localhost"; 
$database = "cadastro_cidades";
$username = "root";
$password = "";
// conexao
$conn = mysqli_connect($servername, $username, $password, $database); //comando do mysqli vem do php
// verificando conexão 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());//verificação de falha
}
echo "Conexão realizada";

?>