<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="name">Nome</label>
        <input type="text" name="nome">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="password">Senha</label>
        <input type="password" name="password">
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_POST['nome']))
    {
        $conexao = new mysqli("localhost", "root", "toor", "chat");
        if( $conexao->connect_error )
        {
            die("" . $conexao->connect_error());
        }
        else
        {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['password'];
            $sql = "INSERT INTO Usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            
            if ($conexao->query($sql) === TRUE)
            {
                $conexao->close();
                echo "<script>location.href='Login.php';</script>";
            }
            else
            { 
                $conexao->close();
            }
        }
    }
    ?>
</body>
</html>