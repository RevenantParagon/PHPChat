<?php 
session_start();
if (isset($_SESSION['id'])) {
    echo "<script language= 'JavaScript'>location.href='Salas.php'</script>";
}
else
{
    echo "<script language= 'JavaScript'>location.href='Login.php'</script>";
}
?>