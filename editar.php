<?php
session_start();
include_once("conexao.php");

$id = $_GET['id'] ?? '';
$result_usuario = "SELECT * FROM usuarios WHERE id='$id'";
$result_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($result_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style-1.css">
    <title>Cad-visitantes-Editar</title>
</head>

<body>
    <header class="header">
        <a href="listar.php" class="logo">Logo</a>
        <nav class="navbar">
            <a href="index.php" class="active">Home</a>
            <a href="listar.php">Listar</a>
            <a href="cadastrar.php">Cadastrar</a>
            <a href="#">Contato</a>
        </nav>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </header>

    <div class="container">
        <div class="titulo">
            <h2>editar visitante</h2>
            <h3></h3>
        </div>

        <form action="processar-edita.php" method="POST" class="form validator">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite Seu nome" value="<?php echo $row_usuario['nome']; ?>" data-rules="required">

            <label>Cidade:</label>
            <input type="text" name="cidade" placeholder="Digite a cidade" value="<?php echo $row_usuario['cidade']; ?>" data-rules="required">

            <label>Evangélico: </label>
            <input type="text" name="evangelico" placeholder="Informe se é evangélico ou não" value="<?php echo $row_usuario['evangelico']; ?>" class="required">

            <label>Nome Da Igreja:</label>
            <input type="text" name="igreja" value="<?php echo $row_usuario['igreja']; ?>" placeholder="Digite nome da Igreja">

            <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

            <button class="btn-cadastrar" type="submit" name="update" id="update">Editar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script>
        function alert() {
            Swal.fire({
                title: "Visitante cadastrado ",
                text: "",
                icon: "success"
            })
        }
    </script>
</body>

</html>








<!-- /* teste*/ -->

<!-- <?php
        session_start();


        include_once("conexao.php");

        $result_usuario = "SELECT * FROM usuarios WHERE id= ''";
        $result_usuario = mysqli_query($conn, $result_usuario);
        $row_usuario = mysqli_fetch_assoc($result_usuario);



        while ($user_lista = mysqli_fetch_assoc($result_usuario)) {

            $nome =        $user_lista['nome'];
            $cidade =      $user_lista['cidade'];
            $evangelico =  $user_lista['evangelico'];
            $igreja =      $user_lista['igreja'];
        }



        ?>



         <?php
            if (isset($_SESSION['msg'])) {

                echo $_SESSION['msg'];

                unset($_SESSION['msg']);
            }
            ?>
     
          