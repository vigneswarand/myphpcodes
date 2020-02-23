<?php
require('./test/html2fpdf.php');
$pdf=new HTML2FPDF();
$pdf->AddPage();
$fp = fopen("./test/sample.html","r");
$strContent = fread($fp, filesize("./test/sample.html"));
fclose($fp);
$pdf->WriteHTML($strContent);
$pdf->Output("sample.pdf");
echo "PDF file is generated successfully!";
?>