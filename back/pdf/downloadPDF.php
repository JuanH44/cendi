<?php
    include("../pdf/generatePDF.php");
    include("../mail/mail.php");


   
    global $pdf;
    $pdf ->Output("Ficha de Registro ".$folio.".pdf","I");
    $pdfDoc =$pdf ->Output("Test Invoice.pdf","S");

    $phpmailer->AddStringAttachment($pdfDoc, 'My Doc.pdf', $encoding = 'base64', $type = 'application/pdf');


        if(!$phpmailer->Send()) {
        $message =  "Invoice could not be send. Mailer Error: " . $phpmailer->ErrorInfo;
        } else {
        $message = "Invoice sent!";
        }

        echo "<script>alert('$message');</script>";


// $option = 1;

// switch ($option) {
//     case 1:
//         generatePDF();
//         break;
//     case 2:
//         sendPDF();
//         break;
//     case 3:
//         viewPDF();
//         sendPDF();
//         break;
//     default:
//         # code...
//         break;
//     }

   
// }

// downloadPDF(1);
?>