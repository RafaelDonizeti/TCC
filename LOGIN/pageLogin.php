<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <title> Acesso ao Sistema </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <?php 
        if (isset($_SESSION['status'])) {
            echo  $_SESSION['status'];
            unset($_SESSION['status']);
        }
        ?>
        <form name="home" method="POST" action="verificalogin.php">
            <h1>Sistema WEB Para </h1>
            <h1>Síndicos</h1>
            <label> E-mail : </label> <br />
            <input type="text" name="email" required class="form-control border-primary"> <br /><br />

            <label> Senha : </label> <br />
            <input type="password" name="senha" required class="form-control border-primary"> <br /><br />
            <input type="submit" class="btn btn-primary" value="Acessar">
        </form>
    </div>
    <br>
</body>

</html>