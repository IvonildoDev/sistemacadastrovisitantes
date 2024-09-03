<?php
session_start();

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
$igreja = filter_input(INPUT_POST, 'igreja', FILTER_DEFAULT);
$evangelico = filter_input(INPUT_POST, 'evangelico', FILTER_DEFAULT);




$result_usuario = "INSERT INTO usuarios (nome, cidade,evangelico,igreja) VALUES ('$nome', '$cidade','$evangelico','$igreja')";

$resultado_usuario = mysqli_query($conn, $result_usuario);


if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color: green;'> Visitante  cadastrado com Sucesso</p>";

    header("Location: index.php");
} else {

    $_SESSION['msg'] = "<p style='color:red;'> Visitante Não foi cadastrado com Sucesso</p>";
    header("Location: index.php");
}
