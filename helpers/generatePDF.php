<?php
include_once "../vendor/autoload.php";

use Dompdf\Dompdf;
// ob_start da la pauta desde donde se
// captura la información que se almacenara
// en el pdf

function generatePDF($shoppingCart, $user)
{
    $token = substr(bin2hex(openssl_random_pseudo_bytes(16)), 24);
    $dompdf = new Dompdf();
    ob_start();
    require_once "./template.php";
    $html = ob_get_clean();
    $html.= '<style>'.file_get_contents('../styles/bootstrap.min.css').'</style>';
    // ob_get_clean captura toda la información
    // y lo amacenamos en una variable

    $dompdf->loadHtml($html);
    // loadHtml carga la información contenida
    // en la variable $html

    $basePath = "../pdfs/";
    // se define una ruta en donde se gurdara el pdf

    $fileName =  implode("_", explode(" ", $user["name"])) . "_$token.pdf";
    $filePath = $basePath . $fileName;

    $dompdf->render();
    // define el nombre y la disposicion en la
    // que se vera el documento en el navegador
    $outPut = $dompdf->output();

    file_put_contents($filePath, $outPut);
    // funcion que mueve el archivo a la ruta definida 

    include_once "./sendPDF.php";
    sendPdf($user["email"], $filePath);
}
