<?php
session_start();

?>

<?php
include "./header.php";
?>


<div class="container">
    <?php
    if (isset($_SESSION['msg'])) {

        echo $_SESSION['msg'];

        unset($_SESSION['msg']);
    }
    ?>


    <div class="titulo">
        <h2>Cadastro visitantes</h2>
        <h3></h3>
    </div>

    <form action="processa.php" method="POST" class="form validator">


        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite Seu nome" data-rules="required">

        <label>Cidade:</label>
        <input type="text" name="cidade" placeholder="Digite a cidade" data-rules="required">


        <label>Evangélico: </label>
        <input type="text" name="evangelico" placeholder="Informe se e evangelico ou não" class="required">


        <label>Nome Da Igreja:</label>
        <input type="text" name="igreja" placeholder="Digite nome da Igreja">




        <button class="btn-cadastrar" type="submit">Cadastrar</button>

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