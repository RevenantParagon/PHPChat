<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <?php
    if(!isset($_SESSION['id']))
    {
        echo "<script language= 'JavaScript'>location.href='Login.php'</script>";
    }
    else if(isset($_GET['nome']) && isset($_GET['id']) && isset($_GET['dono']))
    {
        $salanome = $_GET['nome'];
        $salaid = $_GET['id'];
        $saladono = $_GET['dono'];
    }
    ?>
</head>
<body>
    <label for="welcome">Bem Vindo a Sala <?php echo "$salanome"?> Criada por <?php echo "$saladono"?></label>
    <?php
    
    ?>
</body>
</html>