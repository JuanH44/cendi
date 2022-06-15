<?php
//datos
    $startYear = 2021;
    $endYear = 2022;
//Registro
    $diaRegistro = "22";
    $mesRegistro = "Diciembre";
    $anioRegistro = "2021";

//Datos Generales

    $cendi="Amalia Solórzano de Cárdenas";//No se puede cambiar
    $folio=$_REQUEST['folio'];
    $grupo=$_REQUEST['grupo'];//

//Datos niño
    $primer_apellido=$_REQUEST['primer_apellido'];
    $segundo_apellido=$_REQUEST['segundo_apellido'];
    $nombre=$_REQUEST['nombre'];
    $fecha=$_REQUEST['fecha'];
    $edadAnios=$_REQUEST['edadAnios'];
    $edadMeses=$_REQUEST['edadMeses'];
    //$edad='2';
    $email=$_REQUEST['email'];
    $curp=$_REQUEST['curp'];

//Datos Derechoabiente
    $primer_apellido_derecho=$_REQUEST['primer_apellido_derecho'];
    $segundo_apellido_derecho=$_REQUEST['segundo_apellido_derecho'];
    $nombre_derecho=$_REQUEST['nombre_derecho'];
    $calle=$_REQUEST['calle'];
    $noExt=$_REQUEST['noExt'];
    $noInt = $_REQUEST['noInt'];
    $colonia= $_REQUEST['colonia'];
    $alcaldia= $_REQUEST['alcaldia'];
    $entidad = $_REQUEST['entidad'];
    $cp = $_REQUEST['cp'];
    $telefono_fijo=$_REQUEST['telefono_fijo'];
    $telefono_celular=$_REQUEST['telefono_celular'];
    $email_derecho=$_REQUEST['email_derecho'];
    $ocupacion=$_REQUEST['ocupacion'];
    $curp_derecho=$_REQUEST['curp_derecho'];
    $puesto=$_REQUEST['puesto'];
    $sueldo=$_REQUEST['sueldo'];
    $numero_empleado=$_REQUEST['numero_empleado'];
    $adscripcion=$_REQUEST['adscripcion'];
    $horario=$_REQUEST['horario'];
    $extension=$_REQUEST['extension'];

//Datos Conyugue
/*
$tieneconyuge=$_REQUEST['tieneconyuge'];
*/
//if $tieneconyuge=='Sí'{
    $primer_apellido_conyuge = $_REQUEST['primer_apellido_conyuge'];
    $segundo_apellido_conyuge = $_REQUEST['segundo_apellido_conyuge'];
    $nombre_conyuge = $_REQUEST['nombre_conyuge'];
    $calle_conyuge = $_REQUEST['calle'];
    $noExt_conyuge = $_REQUEST['noExt_conyuge'];
    $noInt_conyuge = $_REQUEST['noInt_conyuge'];
    $colonia_conyuge = $_REQUEST['colonia_conyuge'];
    $alcaldia_conyuge = $_REQUEST['alcaldia_conyuge'];
    $entidad_conyuge = $_REQUEST['entidad_conyuge'];
    $cp_conyuge = $_REQUEST['cp_conyuge'];
    $telefono_fijo_conyuge=$_REQUEST['telefono_fijo_conyuge'];
    $telefono_celular_conyuge=$_REQUEST['telefono_celular_conyuge'];
    $lugar_trabajo_conyuge=$_REQUEST['lugar_trabajo_conyuge'];
    $domicilio_trabajo_conyuge=$_REQUEST['domicilio_trabajo_conyuge'];
    $telefono_trabajo_conyuge=$_REQUEST['telefono_trabajo_conyuge'];
    $extension_conyuge=$_REQUEST['extension_conyuge'];
//}

//consultas

    $sqlConsDatos="insert into datos_generales values('".$folio."','".$cendi."','".$grupo."')";

    $sqlConsNin="insert into datos_niño values('".$primer_apellido."','".$segundo_apellido."','".$nombre."','".$fecha."','".$email."','".$edadAnios."','".$edadMeses."','".$curp."','".$folio."')";

    $sqlConsDere="insert into datos_derecho values('".$primer_apellido_derecho."','".$segundo_apellido_derecho."','".$nombre_derecho."','".$calle."','".$noExt.
    "','".$noInt."','".$colonia."','".$alcaldia."','".$entidad."','".$cp."','".$telefono_fijo."','".$telefono_celular."','".$email_derecho.
    "','".$ocupacion."','".$curp_derecho."','".$puesto."','".$sueldo."','".$numero_empleado."','".$adscripcion."','".$horario."','".$extension."','".$folio."')";

    if (isset($_REQUEST['tienec'])){
        $tieneconyuge='si';
    }else{
        $tieneconyuge='no';
    }
    if ($tieneconyuge == 'si'){
        $sqlConsCony="insert into conyuge values('".$primer_apellido_conyuge."','".$segundo_apellido_conyuge."','".$nombre_conyuge."','".$calle_conyuge."','".$noExt_conyuge.
        "','".$noInt_conyuge."','".$colonia_conyuge."','".$alcaldia_conyuge."','".$entidad_conyuge."','".$cp_conyuge."','".$telefono_fijo_conyuge."','".$telefono_celular_conyuge."','".
        $lugar_trabajo_conyuge."','".$domicilio_trabajo_conyuge."','".$telefono_trabajo_conyuge."','".$extension_conyuge."','".$folio."')";
    }

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
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");//mandar señal a front para mostrar boton
        }
    }
    elseif ($grupo == "Lac III - Mat I"){
        if ($lugaresOcup[0] == 10){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "Mat IIA"){
        if ($lugaresOcup[0] == 12){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "Mat IIB"){
        if ($lugaresOcup[0] == 12){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "PIA"){
        if ($lugaresOcup[0] == 15){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "PIB"){
        if ($lugaresOcup[0] == 15){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "PIIA"){
        if ($lugaresOcup[0] == 15){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "PIIB"){
        if ($lugaresOcup[0] == 15){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "PIIIA"){
        if ($lugaresOcup[0] == 15){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    elseif ($grupo == "PIIIB"){
        if ($lugaresOcup[0] == 15){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge=='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
            //include("../back/AlumnoGenPDF.php");
        }
    }
    echo json_encode(array("state"=> 0, "folio"=> $folio, "mensaje"=> "Se ha registrado correctamente"));
?>