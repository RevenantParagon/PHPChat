<?php
function Chat($salaid)
{
    $conexao = new mysqli("localhost", "root", "toor", "chat");
    if( $conexao->connect_error ) {
        die("" . $conexao->connect_error());
    }
    else
    {
        $sql = "SELECT m.id, m.remetente, m.mensagem, m.sala FROM Mensagens s WHERE m.sala = '$salaid'";
        $result = $conexao->query($sql);
        if ($result->num_rows > 0) {
            while($linha = $result->fetch_assoc()) {
                $dados = "?nome=".$linha['nome']."&id=".$linha['id'];
                echo "<a href='Chat.php".$dados."'>".$linha['nome']."</a>";
                echo "<br>";
            }
        }
    }
    $conexao->close();
}
?>