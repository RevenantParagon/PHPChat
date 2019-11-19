<?php
session_start();
function BuscaMSG($salaid)
{
    $conexao = new mysqli("localhost", "root", "toor", "chat");
    if( $conexao->connect_error ) {
        die("" . $conexao->connect_error());
    }
    else
    {
        $sql = "SELECT m.remetente as 'remetenteid', m.mensagem as 'mensagem', u.nome as 'remetentenome' FROM Mensagens m join Usuarios u on (u.id = m.remetente) WHERE m.sala = '$salaid'";
        $result = $conexao->query($sql);
        if ($result->num_rows > 0) {
            while($linha = $result->fetch_assoc()) {
                if($linha['remetenteid'] != $_SESSION['id'])
                {
                    echo "<div style='text-align:right;background-color:yellow'>".$linha['remetentenome']."<br>".$linha['mensagem']."</div>"
                }
                else
                {
                    echo "<div style='text-align:left;background-color:white'>".$linha['remetentenome']."<br>".$linha['mensagem']."</div>"
                }
            }
        }
    }
    $conexao->close();
}
?>