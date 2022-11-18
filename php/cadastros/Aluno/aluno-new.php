<?php
require_once '../../init.php';

$_SESSION["nome"] = $_POST["nome"];
$_SESSION["cpf"] = $_POST["cpf"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["telefone"] = $_POST["telefone"];

$nome = htmlentities($_POST["nome"]);
$cpf = htmlentities($_POST["cpf"]);
$email = htmlentities($_POST["email"]);
$telefone = htmlentities($_POST["telefone"]);

$PDO = connectDB();
if (isset($_POST["Adicionar"])) {
  //Insere no banco
  $sql = "INSERT INTO alunos (nome, cpf, email, telefone) VALUES (:nome, :cpf, :email, :telefone)";
  $stmt = $PDO->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':cpf', $cpf);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefone', $telefone);

  if ($stmt->execute()) {
    header('Location: ' . APP . '../../CadastroAluno.php');
  } else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
  }
}
