<?php

session_start();
if (isset($_SESSION['id']) && isset($_POST['file']))
{
    date_default_timezone_set("America/Sao_Paulo");
    $diretorio = "img/".date("YmdHms");
    $destino = $diretorio . basename($_FILES["arquivo"]["name"]);
    if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $destino))
    {
        echo "O arquivo ". basename( $_FILES["arquivo"]["name"]). " foi enviado.";
    }
    else
    {
        echo "Erro no envio.";
    }
}
else
{
    echo "<script language= 'JavaScript'>location.href='Login.php'</script>";
}
?>