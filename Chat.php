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
    <label for="welcome">Bem Vindo a Sala <?php echo "$salanome"?> Criada por <?php echo "$dononome"?></label>
    <?php
    BuscaMSG($salaid);
    ?>
    <form action="#" method="post"></form>
</body>
</html>