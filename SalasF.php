<?php
function CriaSala($nome, $dono)
{
    $conexao = new mysqli("localhost", "root", "toor", "chat");
    if( $conexao->connect_error )
    {
        die("" . $conexao->connect_error());
    }
    else
    {
        $sql = "INSERT INTO sala(nome, dono) VALUES ('$nome', '$dono')";

        if ($conexao->query($sql) === TRUE)
        {
            $conexao->close();
            
        }
        else
        {
            $conexao->close();
        }
    }
}
function BuscaMSala($dono)
{
    $conexao = new mysqli("localhost", "root", "toor", "chat");
    if( $conexao->connect_error ) {
        die("" . $conexao->connect_error());
    }
    else
    {
        $sql = "SELECT s.id, s.nome, u.nome, s.dono FROM sala s join Usuarios u on (u.id = s.dono) WHERE s.dono = '$dono'";
        $result = $conexao->query($sql);
        if ($result->num_rows > 0) {
            while($linha = $result->fetch_assoc()) {
                $dados = "?nome=".$linha['s.nome']."&id=".$linha['s.id']."&dono=".$linha['s.dono']."&dononome=".$linha['u.nome'];
                echo "<a href='Chat.php".$dados."'>".$linha['s.nome']."</a>";
                echo "<br>";
            }
        }
    }
    $conexao->close();
}
function BuscaOSala($dono)
{
    $conexao = new mysqli("localhost", "root", "toor", "chat");
    if( $conexao->connect_error ) {
        die("" . $conexao->connect_error());
    }
    else
    {
        $sql = "SELECT s.id, s.nome, u.nome, s.dono FROM sala s join Usuarios u on (u.id = s.dono) WHERE s.dono = '$dono'";
        $result = $conexao->query($sql);
        if ($result->num_rows > 0) {
            while($linha = $result->fetch_assoc()) {
                $dados = "?nome=".$linha['s.nome']."&id=".$linha['s.id']."&dono=".$linha['s.dono']."&dononome=".$linha['u.nome'];
                echo "Sala de ".$linha['u.nome']." ";
                echo "<a href='Chat.php".$dados."'>".$linha['s.nome']."</a>";
                echo "<br>";
            }
        }
    }
    $conexao->close();
}
?>