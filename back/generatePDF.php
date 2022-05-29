<?php
    /* Clase fpdf */
    include("requestData.php");
    require("tfpdf/tfpdf.php");

    class PDF extends tFPDF
    {
        function setFillColorC($col){
            $this->SetFillColor($col,$col,$col);
        }

        // Cabecera de página
        function Header(){
            // Logo
            $this->Image('./encabezado.fw.png',10,8,200);
            $this->Ln(20);  
        }

        // Pie de página
        function Footer(){
            // Posición: a 1.5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','',8);
            // Número de página
            $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $pdf = new PDF("P","mm","Letter");
    //  $pdf->Error("Ha ocurrido un error al generar el PDF");
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $gris = 230;
    $lineHeight = 6;

    //Establecemos los margenes 
    $margins = 20;
    $pdf->SetMargins($margins, $margins);
    $widthBody =  $pdf->GetPageWidth()  - 2 * $margins; //Recuperamos el ancho de la pagina menos los margenes

    $pdf->AddFont('Arial','','arial.ttf',true);
    $pdf->AddFont('Arial','B','arialbd.ttf',true);


    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,"FICHA DE REISNCRIPCIÓN",0,1,"C");

    $pdf->Cell(0,10,"DATOS DE LA NIÑA O EL NIÑO:",0,1,"L");

    $pdf->SetFont('Arial','',12);
    
    //1ra Linea - Nombre completo
    $pdf->SetFillColorC($gris);
    $pdf->Cell($widthBody/3,$lineHeight,$nNombre,1,0,"C",true); 
    $pdf->Cell($widthBody/3,$lineHeight,$nApellido1,1,0,"C",true);
    $pdf->Cell($widthBody/3,$lineHeight,$nApellido2,1,1,"C",true);
    $pdf->Cell($widthBody/3,$lineHeight,"Primer Apellido",1,0,"C"); 
    $pdf->Cell($widthBody/3,$lineHeight,"Segundo Apellido",1,0,"C");
    $pdf->Cell($widthBody/3,$lineHeight,"Nombre(s)",1,1,"C");

    //2da Linea - Fecha de nacimiento

    //3ra Linea - Curp
    $pdf->Cell(20,$lineHeight,"CURP:",1,0,"C");
    $pdf->SetFillColorC($gris);
    $pdf->Cell($widthBody/3,$lineHeight,"",1,0,"C",true); 


    $pdf->LN(10);
    // ### DERECHOHABIENTE
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,"DATOS DEL O LA DERECHOHABIENTE:",0,1,"L");
    $pdf->SetFont('Arial','',12);
    $pdf->Cell($widthBody/3,$lineHeight,"",1,0,"C",true);
    $pdf->Cell($widthBody/3,$lineHeight,"",1,0,"C",true); 
    $pdf->Cell($widthBody/3,$lineHeight,"",1,1,"C",true);
    $pdf->Cell($widthBody/3,$lineHeight,"Primer Apellido",1,0,"C"); 
    $pdf->Cell($widthBody/3,$lineHeight,"Segundo Apellido",1,0,"C");
    $pdf->Cell($widthBody/3,$lineHeight,"Nombre(s)",1,1,"C");
    $pdf->MultiCell(30,$lineHeight,"Domicilo particular:",1,"C");
    $pdf->Cell($widthBody/3,$lineHeight,"Nombre(s)",1,0,"C");

    // ### CONYUGE
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,"DATOS DEL CONYUGE (PADRE, MADRE):",0,1,"L");
    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColorC($gris);
    $pdf->Cell($widthBody/3,$lineHeight,"",1,0,"C",true);
    $pdf->Cell($widthBody/3,$lineHeight,"",1,0,"C",true); 
    $pdf->Cell($widthBody/3,$lineHeight,"",1,1,"C",true);
    $pdf->Cell($widthBody/3,$lineHeight,"Primer Apellido",1,0,"C"); 
    $pdf->Cell($widthBody/3,$lineHeight,"Segundo Apellido",1,0,"C");
    $pdf->Cell($widthBody/3,$lineHeight,"Nombre(s)",1,1,"C");
    $pdf->SetFillColorC(255);
    $pdf->MultiCell(30,$lineHeight,"Domicilo particular:",1,0,"C");
    $pdf->Cell($widthBody/3,$lineHeight,"Nombre(s)",1,0,"C");

    $pdf->Output();

?>