<?php
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
// Facilitar a referência à Dompdf
use Dompdf\Dompdf;
// cria uma instância e usa a classe dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($_POST['gerar']);
// (Opcional) Ajusta o tamanho e orientação do papel
// outra opção é 'portrait'
$dompdf->setPaper('A4', 'landscape');
// Renderiza o HTML como PDF
$dompdf->render();
// Gera a saída no navegador.
$dompdf->stream();
?>