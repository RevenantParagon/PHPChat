<?php
require_once 'pdf/lib/html5lib/Parser.php';
require_once 'pdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'pdf/lib/php-svg-lib/src/autoload.php';
require_once 'pdf/src/Autoloader.php';
Dompdf\Autoloader::register();
// Facilitar a referência à Dompdf
use Dompdf\Dompdf;
// cria uma instância e usa a classe dompdf
$pdf = new Dompdf();
$pdf->loadHtml($_POST['gerar']);
// (Opcional) Ajusta o tamanho e orientação do papel
// outra opção é 'portrait'
$pdf->setPaper('A4', 'landscape');
// Renderiza o HTML como PDF
$pdf->render();
// Gera a saída no navegador.
$pdf->stream();
?>