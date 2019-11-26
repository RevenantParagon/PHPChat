<?php
session_start();
if(isset($_POST['msg']) && isset($_POST['salaid']) && isset($_POST['pagelink']) && isset($_SESSION['id']))
{
    $conexao = new mysqli("localhost", "root", "toor", "chat");
    if( $conexao->connect_error )
    {
        die("" . $conexao->connect_error());
    }
    else
    {
        $userid = $_SESSION['id'];
        $msg = $_POST['msg'];
        $salaid = $_POST['salaid'];
        $sql = "INSERT INTO Mensagens(remetente, mensagem, sala) VALUES ('$userid', '$msg', '$salaid')";
        if ($conexao->query($sql) === TRUE)
        {
            $conexao->close();
            echo "<script>location.href='".$_POST['pagelink']."';</script>";
        }
        else
        { 
            $conexao->close();
        }
    }
}

if (isset($_FILES['arquivo']) && isset($_POST['salaid']) && isset($_POST['pagelink']) && isset($_SESSION['id']))
{
    date_default_timezone_set("America/Sao_Paulo");
    $diretorio = "img/".date("YmdHms");
    $destino = $diretorio . basename($_FILES["arquivo"]["name"]);
    if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $destino))
    {
        $conexao = new mysqli("localhost", "root", "toor", "chat");
        if( $conexao->connect_error )
        {
            die("" . $conexao->connect_error());
        }
        else
        {
            $userid = $_SESSION['id'];
            $msg = '<img src='.$destino.'>';
            $salaid = $_POST['salaid'];
            $sql = "INSERT INTO Mensagens(remetente, mensagem, sala) VALUES ('$userid', '$msg', '$salaid')";
            if ($conexao->query($sql) === TRUE)
            {
                $conexao->close();
                echo "<script language= 'JavaScript'>location.href='".$_POST['pagelink']."'</script>";
            }
            else
            {
                $conexao->close();
            }
        }
        echo "<script language= 'JavaScript'>location.href='".$_POST['pagelink']."'</script>";
    }
}
else
{
    echo "<script language= 'JavaScript'>location.href='Login.php'</script>";
}
?>