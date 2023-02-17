<?php

  require_once('library/tcpdf.php');

  $nombre = $_POST['nombre'];
  $apellidoPaterno = $_POST['apellidoPaterno'];
  $apellidoMaterno = $_POST['apellidoMaterno'];
  $curp = $_POST['curp'];
  $calle = $_POST['calle'];
  $numero = $_POST['numero'];
  $colonia = $_POST['colonia'];
  $ciudad = $_POST['ciudad'];
  $estado = $_POST['estado'];
  $codigoPostal = $_POST['codigoPostal'];
  

  $private_file = "../llaves/mycertificado.key.pem";
  $public_file = "../llaves/MyCer.cer.pem";
  
  $sello = '';

  $cadenaOriginal = "||".$nombre. "|"
                        .$apellidoPaterno. "|"
                        .$apellidoPaterno. "|"
                        .$apellidoMaterno. "|"
                        .$curp. "|"
                        .$calle. "|"
                        .$numero. "|"
                        .$colonia. "|"
                        .$ciudad. "|"
                        .$estado. "|"
                        .$codigoPostal. "||";

  //print($cadenaOriginal);

$private_key = openssl_get_privatekey(file_get_contents($private_file));

$exito = openssl_sign($cadenaOriginal, $Firma, $private_key, OPENSSL_ALGO_SHA256);

$sello = base64_encode($Firma);

$public_key = openssl_pkey_get_public(file_get_contents($public_file));           

$PubData = openssl_pkey_get_details($public_key);

//print_r($PubData);

$result = openssl_verify($cadenaOriginal, $Firma, $public_key, "sha256WithRSAEncryption");

if ($result == 1) {
  $status ="La firma es válida";
} else {
  $status = "La firma no es válida";
}


//echo $Firma. "\n";
//echo $sello;

  // create new PDF document
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  $pdf->SetTitle('Formulario');
  $pdf->SetAuthor('Hector Saldaña');
  $pdf->SetPageOrientation('P');
  
  $pdf->AddPage();
  
  $content = '
    <h2>Formulario</h2>
    <table>
      <tr>
        <td><b>Nombre:</b></td>
        <td>'.$nombre.'</td>
      </tr>  
      <tr>
        <td><b>Apellido Paterno:</b></td>
        <td>'.$apellidoPaterno.'</td>
      </tr>
      <tr>
        <td><b>Apellido Materno:</b></td>
        <td>'.$apellidoMaterno.'</td>
      </tr>
      <tr>
        <td><b>CURP:</b></td>
        <td>'.$curp.'</td>
      </tr>
      <tr>
        <td><b>Calle:</b></td>
        <td>'.$calle.'</td>
      </tr>
      <tr>
        <td><b>Número:</b></td>
        <td>'.$numero.'</td>
      </tr>
      <tr>
        <td><b>Colonia:</b></td>
        <td>'.$colonia.'</td>
      </tr>
      <tr>
        <td><b>Ciudad:</b></td>
        <td>'.$ciudad.'</td>
      </tr>
      <tr>
        <td><b>Estado:</b></td>
        <td>'.$estado.'</td>
      </tr>
      <tr><td><b>Código Postal:</b></td>
        <td>'.$codigoPostal.'</td>
      </tr>    
      <tr><td><b>Cadena Original:</b></td>
      <td>'.$cadenaOriginal.'</td>
    </tr>  
    <tr><td><b>Sello Digital:</b></td>
    <td>'.$sello.'</td>
  </tr>  
  <tr><td><b>Estatus:</b></td>
  <td>'.$status.'</td>
</tr>  
      
    </table>';

  $pdf->writeHTML($content);

  // ob_end_clean();
  $pdf->Output('formulario.pdf', 'I');


?>
