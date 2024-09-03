<?php
session_start();

include_once("conexao.php");


$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
$igreja = filter_input(INPUT_POST, 'igreja', FILTER_DEFAULT);
$evangelico = filter_input(INPUT_POST, 'evangelico', FILTER_DEFAULT);




$result_usuario = "UPDATE  usuarios  SET nome='$nome',cidade='$cidade', igreja='$igreja', evangelico='$evangelico' WHERE id='$id'";

$resultado_usuario = mysqli_query($conn, $result_usuario);


if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<p style='color: green;'> Visitante  alterado com Sucesso</p>";

    header("Location: listar.php");
} else {

    $_SESSION['msg'] = "<p style='color:red;'> Visitante Não foi alterado  por favor escolha ?</p>";
    header("Location: editar.php?id=$id");
}
