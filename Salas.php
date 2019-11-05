<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salas</title>
    <?php
    session_start();
    if (!isset($_SESSION['id'])) {
        echo "<script language= 'JavaScript'>location.href='Login.php'</script>";
    }
    require("SalasF.php");
    ?>
</head>
<body>
    <?php
    if(isset($_POST['nome']) && $_POST['nome'] != "")
    {
        CriaSala($_POST['nome'], $_SESSION['id']);
        echo "<script language= 'JavaScript'>location.href='Login.php'</script>";
    }
    ?>
    <label for="title">Criar sala</label><br>
    <form action="#" method="post">
        <input type="text" name="nome">
        <input type="submit" value="Criar">
    </form>
    <br>
    <label for="Salas">Minhas Salas</label>
    <br>
    <?php
    BuscaMSala($_SESSION['id']);
    ?>
    <label for="Salas">Outras Salas</label>
    <br>
    <?php
    BuscaOSala($_SESSION['id']);
    ?>
</body>
</html>