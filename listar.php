<?php
session_start();

include_once("conexao.php");

$sql = "SELECT * FROM usuarios ORDER BY id   ";
$result = $conn->query($sql);




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-1.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <title>Lista Visitantes</title>
</head>

<header class="header header-containe">

    <a href="index.php" class="logo">Logo</a>
    <input type="checkbox" id="check">

    <label for="check" class="icons">
        <i class='bx bx-menu' id="menu-icon"></i>
        <i class='bx bx-x' id="close-icon"></i>


    </label>

    <nav class="navbar navbar-mobile">
        <a href="index.php" style="--i:0;">Home</a>
        <a href="cadastrar.php" style="--i:1;">Cadastrar</a>
        <a href="#" style="--i:3;">Sobre</a>


        <!-- <a href="#" style="--i:3;">Relatorio</a> -->

    </nav>

</header>




<body class="table-container">
    <div class="table-titulo">
        <h1>Lista visitantes</h1>
    </div>
    <div class="m-5">
        <table id="content-tb" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th data-th="Nome" scope="col">Nome</th>
                    <th data-th="Cidade" scope="col">Cidade</th>
                    <th data-th=" Evangelico" scope="col">Evangélico</th>
                    <th data-th="igreja" scope="col">Igreja</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php

                while ($user_lista = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo " <td  data-th='Id' >" . $user_lista['id'] . "</td>";
                    echo " <td data-th='Nome'>" . $user_lista['nome'] . "</td>";
                    echo " <td data-th='Cidade'>" . $user_lista['cidade'] . "</td>";
                    echo " <td data-th='Evangelico'>" . $user_lista['evangelico'] . "</td>";
                    echo " <td data-th='Igreja'>" . $user_lista['igreja'] . "</td>";
                    echo " <td>
                              <a class='btn btn-sm btn-primary' href='editar.php? id=$user_lista[id]'> 
                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                             <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                               </svg> </a>

                               <a>
                               <a class='btn btn-sm btn-danger' href='apagar.php? id=$user_lista[id]'> 
                                 <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 
                                1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1
                                0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                </svg>
                                                            
                               </a>

                    
                    
                              </td>";



                    echo "</tr>";
                }


                ?>

            </tbody>
        </table>
        <button class="btn-pdf" onclick="window.location.href='gerar_pdf.php'">Gerar PDF</button>

    </div>
    <script src="script.js"></script>


</body>


</html>