<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// DADOS DE CONEXÃO DO BANCO REMOTO
$servername = "sql204.infinityfree.com";
$username = "if0_39187237";
$password = "wWrUHxC0dA"; 
$dbname = "if0_39187237_loreto";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  echo json_encode(["status" => "erro", "mensagem" => "Erro na conexão com o banco."]);
  exit;
}


$nome       = $_POST['nom_cliente'] ?? '';
$email      = $_POST['email'] ?? '';
$telefone   = $_POST['telefone'] ?? '';
$cpf_cnpj   = $_POST['cpf_cnpj'] ?? '';
$cidade     = $_POST['cidade'] ?? '';
$uf         = $_POST['uf'] ?? '';
$cep        = $_POST['cep'] ?? '';
$logradouro = $_POST['logradouro'] ?? '';
$numero     = $_POST['numero'] ?? '';
$bairro     = $_POST['bairro'] ?? '';
$senha      = trim($_POST['senha'] ?? '');
$confirma   = trim($_POST['confirma_senha'] ?? '');
$data       = date("Y-m-d");


if ($senha !== $confirma) {
  echo json_encode(["status" => "erro", "mensagem" => "As senhas não coincidem."]);
  exit;
}


$senha_hash = password_hash($senha, PASSWORD_DEFAULT);


$sql = "INSERT INTO clientes (nom_cliente, email, telefone, cpf_cnpj, cidade, uf, cep, logradouro, numero, bairro, data_cadastro, senha)
        VALUES ('$nome', '$email', '$telefone', '$cpf_cnpj', '$cidade', '$uf', '$cep', '$logradouro', '$numero', '$bairro', '$data', '$senha_hash')";

if ($conn->query($sql) === TRUE) {
  echo json_encode(["status" => "ok", "mensagem" => "Cadastro realizado com sucesso!"]);
} else {
  echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar."]);
}

$conn->close();
?>
