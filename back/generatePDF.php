<?php
    /* Clase fpdf */
    include("requestData.php");
    require("tfpdf/tfpdf.php");

    class PDF extends tFPDF
    {
        //private $widthBody =   $this->GetPageWidth(); //Recuperamos el ancho de la pagina menos los margenes

        function setFillColorC($col){
            $this->SetFillColor($col,$col,$col);
        }

        function getBodyWidth(){
            return $this->GetPageWidth() - $this->lMargin - $this->rMargin;
        }

        function getFraction($numerator, $denominator){
            return $this->getBodyWidth() / $denominator * $numerator;
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
    $margins = 15;
    $pdf->SetMargins($margins, $margins);
    
    function getFrac($numerator, $denominator){
        global $pdf;
        return $pdf->getBodyWidth() / $denominator * $numerator;
    }
    $pdf->AddFont('Arial','','arial.ttf',true);
    $pdf->AddFont('Arial','B','arialbd.ttf',true);


    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(0,10,"FICHA DE REISNCRIPCIÓN",0,1,"C");

    $pdf->Cell(0,10,"DATOS DE LA NIÑA O EL NIÑO:",0,1,"L");

    $pdf->SetFont('Arial','',11);
    
    //1ra Linea - Nombre completo
    $pdf->SetFillColorC($gris);
    $pdf->Cell(getFrac(1,3),$lineHeight,$nNombre,1,0,"C",true); 
    $pdf->Cell(getFrac(1,3),$lineHeight,$nApellido1,1,0,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,$nApellido2,1,1,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"Primer Apellido",1,0,"C"); 
    $pdf->Cell(getFrac(1,3),$lineHeight,"Segundo Apellido",1,0,"C");
    $pdf->Cell(getFrac(1,3),$lineHeight,"Nombre(s)",1,1,"C");

    //2da Linea - Fecha de nacimiento
    $pdf->Cell(getFrac(4,16),$lineHeight,"Fecha de Nacimiento:",1,0,"C");
    $pdf->Cell(getFrac(1,16),$lineHeight,"Día",1,0,"C");
    $pdf->Cell(getFrac(1,16),$lineHeight,"",1,0,"C", true);
    $pdf->Cell(getFrac(1,16),$lineHeight,"Mes",1,0,"C");
    $pdf->Cell(getFrac(2,16),$lineHeight,"Diciembre",1,0,"C", true);
    $pdf->Cell(getFrac(1,16),$lineHeight,"Año",1,0,"C");
    $pdf->Cell(getFrac(1,16),$lineHeight,"",1,0,"C", true);
    $pdf->Cell(getFrac(1,16),$lineHeight,"Edad:",1,0,"C");
    $pdf->Cell(getFrac(1,16),$lineHeight,"Años",1,0,"C");
    $pdf->Cell(getFrac(1,16),$lineHeight,"",1,0,"C", true);
    $pdf->Cell(getFrac(1,16),$lineHeight,"Mes",1,0,"C");
    $pdf->Cell(getFrac(1,16),$lineHeight,"",1,1,"C", true);

    //3ra Linea - Curp
    $pdf->Cell(getFrac(2,12),$lineHeight,"CURP:",1,0,"C");
    $pdf->SetFillColorC($gris);
    $pdf->Cell(getFrac(4,12),$lineHeight,"",1,0,"C",true); 


    $pdf->Ln(10);
    // ### DERECHOHABIENTE
    //1ra Linea - Nombre completo
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(0,10,"DATOS DEL O LA DERECHOHABIENTE:",0,1,"L");
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,0,"C",true); 
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"Primer Apellido",1,0,"C"); 
    $pdf->Cell(getFrac(1,3),$lineHeight,"Segundo Apellido",1,0,"C");
    $pdf->Cell(getFrac(1,3),$lineHeight,"Nombre(s)",1,1,"C");

    //2da Linea -  Domicilio
    $pdf->Cell(getFrac(1,10),$lineHeight,"Domicilo","L", 0,"C");
    $pdf->Cell(getFrac(4,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(3,10),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"particular:","L", 0,"C");
    $pdf->Cell(getFrac(4,10),$lineHeight,"Calle",1,0,"C");
    $pdf->Cell(getFrac(1,10),$lineHeight,"N°. Ext.",1,0,"C");
    $pdf->Cell(getFrac(1,10),$lineHeight,"N°. Int.",1,0,"C");
    $pdf->Cell(getFrac(3,10),$lineHeight,"Colonia",1,1,"C");

    //3ra Linea - Alcaldía, Entidad Federativa, CP y Teléfono
    $pdf->Cell(getFrac(3,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,10),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(3,10),$lineHeight,"Alcaldía o municipio",1,0,"C");
    $pdf->Cell(getFrac(2,10),$lineHeight,"Entidad federativa",1,0,"C");
    $pdf->Cell(getFrac(1,10),$lineHeight,"C.P.",1,0,"C");
    $pdf->Cell(getFrac(2,10),$lineHeight,"Teléfono fijo",1,0,"C");
    $pdf->Cell(getFrac(2,10),$lineHeight,"Teléfono celular",1,1,"C");
    //4ta Linea - Correo electrónico, Ocupación y Curp
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"Correo electrónico",1,0,"C");
    $pdf->Cell(getFrac(1,3),$lineHeight,"Ocupación",1,0,"C");
    $pdf->Cell(getFrac(1,3),$lineHeight,"CURP",1,1,"C");

    //5ta Linea - Puesto, Sueldo y No. de Empleado
    $pdf->Cell(getFrac(3,7),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,7),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,7),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(3,7),$lineHeight,"Nombre de plaza o puesto",1,0,"C");
    $pdf->Cell(getFrac(2,7),$lineHeight,"Sueldo mensual",1,0,"C");
    $pdf->Cell(getFrac(2,7),$lineHeight,"Número de empleado",1,1,"C");
   
    //6ta Linea - Adscripción
    $pdf->Cell(getFrac(1,1),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(1,1),$lineHeight,"Adscripción (Secretaría, Coordinación, Dirección, Centro, Escuela, etc.) [Iniciales]",1,1,"C"); 
    
    //7ma Linea - Jefe inmediato
    $pdf->Cell(getFrac(1,1),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(1,1),$lineHeight,"Nombre y cargo de su jefe o jefa inmediato",1,1,"C"); 

    //8va Linea - Horario de trabajo, Extensión
    $pdf->Cell(getFrac(3,4),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,4),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(3,4),$lineHeight,"Horario de trabajo",1,0,"C");
    $pdf->Cell(getFrac(1,4),$lineHeight,"Extensión",1,0,"C");

    $pdf->Ln(10);

    // ### CONYUGE
    //1ra Linea - Nombre completo
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(0,10,"DATOS DEL CONYUGE (PADRE, MADRE):",0,1,"L");
    $pdf->SetFont('Arial','',11);
    $pdf->SetFillColorC($gris);
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,0,"C",true); 
    $pdf->Cell(getFrac(1,3),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(1,3),$lineHeight,"Primer Apellido",1,0,"C"); 
    $pdf->Cell(getFrac(1,3),$lineHeight,"Segundo Apellido",1,0,"C");
    $pdf->Cell(getFrac(1,3),$lineHeight,"Nombre(s)",1,1,"C");
    

    //2da Linea - Domicilio Particular
    $pdf->Cell(getFrac(1,10),$lineHeight,"Domicilo","L", 0,"C");
    $pdf->Cell(getFrac(4,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(3,10),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"particular:","L", 0,"C");
    $pdf->Cell(getFrac(4,10),$lineHeight,"Calle",1,0,"C");
    $pdf->Cell(getFrac(1,10),$lineHeight,"N°. Ext.",1,0,"C");
    $pdf->Cell(getFrac(1,10),$lineHeight,"N°. Int.",1,0,"C");
    $pdf->Cell(getFrac(3,10),$lineHeight,"Colonia",1,1,"C");

    //3ra Linea - Alcaldía, Entidad Federativa, CP y Teléfono
    $pdf->Cell(getFrac(3,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,10),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(2,10),$lineHeight,"",1,1,"C",true);
    $pdf->Cell(getFrac(3,10),$lineHeight,"Alcaldía o municipio",1,0,"C");
    $pdf->Cell(getFrac(2,10),$lineHeight,"Entidad federativa",1,0,"C");
    $pdf->Cell(getFrac(1,10),$lineHeight,"C.P.",1,0,"C");
    $pdf->Cell(getFrac(2,10),$lineHeight,"Teléfono fijo",1,0,"C");
    $pdf->Cell(getFrac(2,10),$lineHeight,"Teléfono celular",1,1,"C");

    //4ta Linea - Lugar de trabajo, Ocupación
    $pdf->Cell(getFrac(1,5),$lineHeight,"Lugar de trabajo:",1,0,"C");
    $pdf->Cell(getFrac(2,5),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,5),$lineHeight,"Ocupación:",1,0,"C");
    $pdf->Cell(getFrac(1,5),$lineHeight,"",1,1,"C",true);

    //5ta Linea - Domicilio del trabajo
    $pdf->Cell(getFrac(1,4),$lineHeight,"Domicilio del trabajo:",1,0,"L");
    $pdf->Cell(getFrac(3,4),$lineHeight,"",1,1,"C",true);

    //6ta Linea - Teléfono del trabajo, Religión
    $pdf->Cell(getFrac(1,4),$lineHeight,"Teléfono del trabajo:",1,0,"L");
    $pdf->Cell(getFrac(1,4),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,4),$lineHeight,"Religión de la familia:",0,0,"C");
    $pdf->Cell(getFrac(1,4),$lineHeight,"","LTR",1,"C",true);

    //7ma Linea - Telefono celular
    $pdf->Cell(getFrac(1,4),$lineHeight,"Télefono celular:",1,0,"L");
    $pdf->Cell(getFrac(1,4),$lineHeight,"",1,0,"C",true);
    $pdf->Cell(getFrac(1,4),$lineHeight,"","RB",0,"C");
    $pdf->Cell(getFrac(1,4),$lineHeight,"","LBR",1,"C",true);




    $pdf->Output();
?>