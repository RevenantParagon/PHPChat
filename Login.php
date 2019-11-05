<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <?php
    session_start();
    ?>
</head>
<body>
    <?php
    if(isset($_SESSION['id']) && isset($_SESSION['nome']))
    {
        echo "<script language= 'JavaScript'>location.href='Salas.php'</script>";
    }
    else if (isset($_POST['email']) && isset($_POST['senha'])) {
        $conexao = new mysqli("localhost", "root", "toor", "chat");
        if( $conexao->connect_error ) {
            die("" . $conexao->connect_error());
        }
        else
        {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $sql = "SELECT p.id, p.nome FROM Usuarios p WHERE p.email = '$email' AND p.senha = '$senha'";
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while($linha = $result->fetch_assoc()) {
                    $_SESSION['id'] = $linha['id'];
                    $_SESSION['nome'] = $linha['nome'];
                }
                $conexao->close();
                echo "<script language= 'JavaScript'>Chat.href='Salas.php'</script>";
            }
            else
            {
                $conexao->close();
                session_unset();
                echo "<script language= 'JavaScript'>Login.href='Login.php'</script>";
            }
        }
    }
    else
    {
        echo "<form action='#' method='post'>
        <label for='email'>Email</label>
        <input type='text' name='email'>
        <label for='password'>Senha</label>
        <input type='password' name='senha'>
        <input type='submit' value='Enviar'>
        </form><BR>"."<label for='cadastro'>Ou Cadastre-se <a href='Cadastro.php'>Aqui!</a></label>";
    }
    ?>
</body>
</html>