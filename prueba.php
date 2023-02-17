<?php
require_once('assets/php/library/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetTitle('Mi documento PDF');
$pdf->SetAuthor('Yo');
$pdf->SetPageOrientation('P');

$pdf->AddPage();
$pdf->Write(0, 'Este es mi primer documento PDF');

$pdf->Output('mi_documento.pdf', 'I');
