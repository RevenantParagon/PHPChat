<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <?php
    session_start();
    if(isset($_SESSION['id']) && isset($_GET['nome']) && isset($_GET['id']) && isset($_GET['dono']) && isset($_GET['dononome']))
    {
        $salanome = $_GET['nome'];
        $salaid = $_GET['id'];
        $saladono = $_GET['dono'];
        $dononome = $_GET['dononome'];
    }
    else
    {
        echo "<script language= 'JavaScript'>location.href='Login.php'</script>";
    }
    require("ChatF.php");
    ?>
</head>
<body>
    <label for="welcome">Bem Vindo a Sala '<?php echo "$salanome"?>' Criada por '<?php echo "$dononome"?>'</label>
    <?php
    BuscaMSG($salaid);
    ?>
    <form action="ChatE.php" method="post">
        <input type="text" name="msg">
        <input type="hidden" name="salaid" value="<?php echo $salaid;?>">
        <input type="hidden" name="pagelink" value="<?php echo "Chat.php?nome=".$salanome."&id=".$salaid."&dono=".$saladono."&dononome=".$dononome;?>">
        <input type="submit" value="Enviar">
    </form>

    <form action="ChatE.php" method="post" enctype="multipart/form-data">
        <label for="Imagem">Selecione a imagem:</label>
        <input type="file" name="arquivo">
        <input type="hidden" name="salaid" value="<?php echo $salaid;?>">
        <input type="hidden" name="pagelink" value="<?php echo "Chat.php?nome=".$salanome."&id=".$salaid."&dono=".$saladono."&dononome=".$dononome;?>">
        <input type="submit" value="Enviar imagem" name="submit">
    </form>

    <form action="GerarPDF.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="gerar" value="<?php BuscaMSG($salaid);?>">
    <input type="submit" value="Gerar">
    </form>
</body>
</html>