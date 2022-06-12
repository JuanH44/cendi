<?php
$registro='si';
//datos
$startYear = 2021;
 $endYear = 2022;
 //Registro
 $diaRegistro = "22";
 $mesRegistro = "Diciembre";
 $anioRegistro = "2021";

//Datos Generales

$cendi="Amalia Solórzano de Cárdenas";//No se puede cambiar
$folio=$_GET['folio'];
$grupo=$_GET['grupo'];//

//Datos niño
$primer_apellido=$_GET['primer_apellido'];
$segundo_apellido=$_GET['segundo_apellido'];
$nombre=$_GET['nombre'];
$fecha=$_GET['fecha'];
//$edad=$_GET['edadAnios'];
$edad='2';
$email=$_GET['email'];
$curp=$_GET['curp'];

//Datos Derechoabiente
$primer_apellido_derecho=$_GET['primer_apellido_derecho'];
$segundo_apellido_derecho=$_GET['segundo_apellido_derecho'];
$nombre_derecho=$_GET['nombre_derecho'];
$calle=$_GET['calle'];
$noExt=$_GET['noExt'];
$noInt = $_GET['noInt'];
$colonia= $_GET['colonia'];
$alcaldia= $_GET['alcaldia'];
$entidad = $_GET['entidad'];
$cp = $_GET['cp'];
$telefono_fijo=$_GET['telefono_fijo'];
$telefono_celular=$_GET['telefono_celular'];
$email_derecho=$_GET['email_derecho'];
$ocupacion=$_GET['ocupacion'];
$curp_derecho=$_GET['curp_derecho'];
$puesto=$_GET['puesto'];
$sueldo=$_GET['sueldo'];
$numero_empleado=$_GET['numero_empleado'];
$adscripcion=$_GET['adscripcion'];
$horario=$_GET['horario'];
$extension=$_GET['extension'];

//Datos Conyugue
/*
$tieneconyuge=$_GET['tieneconyuge'];
*/
//if $tieneconyuge=='Sí'{
    $primer_apellido_conyuge = $_GET['primer_apellido_conyuge'];
    $segundo_apellido_conyuge = $_GET['segundo_apellido_conyuge'];
    $nombre_conyuge = $_GET['nombre_conyuge'];
    $calle_conyuge = $_GET['calle'];
    $noExt_conyuge = $_GET['noExt_conyuge'];
    $noInt_conyuge = $_GET['noInt_conyuge'];
    $colonia_conyuge = $_GET['colonia_conyuge'];
    $alcaldia_conyuge = $_GET['alcaldia_conyuge'];
    $entidad_conyuge = $_GET['entidad_conyuge'];
    $cp_conyuge = $_GET['cp_conyuge'];
    $telefono_fijo_conyuge=$_GET['telefono_fijo_conyuge'];
    $telefono_celular_conyuge=$_GET['telefono_celular_conyuge'];
    $lugar_trabajo_conyuge=$_GET['lugar_trabajo_conyuge'];
    $domicilio_trabajo_conyuge=$_GET['domicilio_trabajo_conyuge'];
    $telefono_trabajo_conyuge=$_GET['telefono_trabajo_conyuge'];
    $extension_conyuge=$_GET['extension_conyuge'];
//}

//consultas

$sqlConsDatos="insert into datos_generales values('".$folio."','".$cendi."','".$grupo."')";

$sqlConsNin="insert into datos_niño values('".$primer_apellido."','".$segundo_apellido."','".$nombre."','".$fecha."','".$email."','".$edad."','".$curp."','".$folio."')";

$sqlConsDere="insert into datos_derecho values('".$primer_apellido_derecho."','".$segundo_apellido_derecho."','".$nombre_derecho."','".$calle."','".$noExt.
"','".$noInt."','".$colonia."','".$alcaldia."','".$entidad."','".$cp."','".$telefono_fijo."','".$telefono_celular."','".$email_derecho.
"','".$ocupacion."','".$curp_derecho."','".$puesto."','".$sueldo."','".$numero_empleado."','".$adscripcion."','".$horario."','".$extension."','".$folio."')";

//$tieneconyuge=$_GET['tienec'];

$sqlConsCony="insert into conyuge values('".$primer_apellido_conyuge."','".$segundo_apellido_conyuge."','".$nombre_conyuge."','".$calle_conyuge."','".$noExt_conyuge.
"','".$noInt_conyuge."','".$colonia_conyuge."','".$alcaldia_conyuge."','".$entidad_conyuge."','".$cp_conyuge."','".$telefono_fijo_conyuge."','".$telefono_celular_conyuge."','".
$lugar_trabajo_conyuge."','".$domicilio_trabajo_conyuge."','".$telefono_trabajo_conyuge."','".$extension_conyuge."','".$folio."')";


//Datos para el pdf

$conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD
$sqlConsLug = "select lugares from horario where grupo = '".$grupo."'";//Consulta para obtener lugares del grupo
$resultado = mysqli_query($conexion, $sqlConsLug);//ejecutar consulta
$lugaresOcup = mysqli_fetch_row($resultado);//obener los lugares ocupados en ese grupo

if ($grupo == "Lac I-II"){
    if ($lugaresOcup[0] == 10){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "Lac III - Mat I"){
    if ($lugaresOcup[0] == 10){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
            mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "Mat IIA"){
    if ($lugaresOcup[0] == 12){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "Mat IIB"){
    if ($lugaresOcup[0] == 12){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "PIA"){
    if ($lugaresOcup[0] == 15){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "PIB"){
    if ($lugaresOcup[0] == 15){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "PIIA"){
    if ($lugaresOcup[0] == 15){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "PIIB"){
    if ($lugaresOcup[0] == 15){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "PIIIA"){
    if ($lugaresOcup[0] == 15){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
elseif ($grupo == "PIIIB"){
    if ($lugaresOcup[0] == 15){
        echo "No quedan mas lugares";
    }else{
        mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
        mysqli_query($conexion, $sqlConsNin);
        mysqli_query($conexion, $sqlConsDere);
        //if $tieneconyuge=='Sí'{
        //    mysqli_query($conexion, $sqlConsCony);
        //}
        $lugaresOcup[0]+=1;
        $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
        mysqli_query($conexion, $sqlConsLug2);
        include("../back/pdf/generatePDF.php");
    }
}
mysqli_close($conexion);
echo "Registrado Exitosamente";
?>