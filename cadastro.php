<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loreto";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}


$nome       = $_POST['nom_cliente'];
$email      = $_POST['email'];
$telefone   = $_POST['telefone'];
$cpf_cnpj   = $_POST['cpf_cnpj'];
$cidade     = $_POST['cidade'];
$uf         = $_POST['uf'];
$cep        = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero     = $_POST['numero'];
$bairro     = $_POST['bairro'];
$data       = date("Y-m-d"); 
$senha = trim($_POST['senha']);
$confirma = trim($_POST['confirma_senha']);


if ($senha !== $confirma) {
  header("Location: cadastro.html?status=erro");
  exit;
}


$senha_hash = password_hash($senha, PASSWORD_DEFAULT);



$sql = "INSERT INTO clientes (nom_cliente, email, telefone, cpf_cnpj, cidade, uf, cep, logradouro, numero, bairro, data_cadastro, senha)
        VALUES ('$nome', '$email', '$telefone', '$cpf_cnpj', '$cidade', '$uf', '$cep', '$logradouro', '$numero', '$bairro', '$data', '$senha_hash')";

if ($conn->query($sql) === TRUE) {
  header("Location: cadastro.html?status=ok");
} else {
  header("Location: cadastro.html?status=erro");
}

$conn->close();
?>