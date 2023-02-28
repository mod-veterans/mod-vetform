<?php
namespace App\Http\Controllers;
// Reference the Dompdf namespace
use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();





$html = '
<h1>A Compensation Service Test PDF</h1>
<table width="100%">
    <tr>
        <td width="40%"><strong>This is the question</strong></td>
        <td width="60%">And this is the answer</td>
    </tr>
</table>
';












// Load HTML content
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('AFCS.pdf');



