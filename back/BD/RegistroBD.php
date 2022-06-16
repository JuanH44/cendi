<?php
    require("./conexionBD.php");
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
    $foto_autorizada=$_REQUEST['foto_autorizada'];
    $foto_autorizada='1';

//Datos niño
    $primer_apellido=$_REQUEST['primer_apellido'];
    $segundo_apellido=$_REQUEST['segundo_apellido'];
    $nombre=$_REQUEST['nombre'];
    $fecha=$_REQUEST['fecha'];
    $edadAnios=$_REQUEST['edadAnios'];
    $edadMeses=$_REQUEST['edadMeses'];
    $email=$_REQUEST['email'];
    $curp=$_REQUEST['curp'];
    $foto=$_REQUEST['foto'];

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
    $foto_derecho=$_REQUEST['foto_derecho'];
    $foto_derecho='1';



//Datos Conyugue

    $primer_apellido_conyuge = $_REQUEST['primer_apellido_conyuge'];
    $segundo_apellido_conyuge = $_REQUEST['segundo_apellido_conyuge'];
    $nombre_conyuge = $_REQUEST['nombre_conyuge'];
    $calle_conyuge = $_REQUEST['calle_conyuge'];
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
    $foto_conyuge=$_REQUEST['foto_conyuge'];
    $foto_conyuge='3';

    if ($primer_apellido_conyuge==''){
        $tieneconyuge='no';
    }else{
        $tieneconyuge='si';
    }
    echo $tieneconyuge;

    if ($grupo!='Lac I-II'){
        $cita='no';
    }else{
        if($lugaresOcup[0]==1){
            $docs='09:00-10:00';
        }elseif($lugaresOcup[0]==2){
            $docs='10:00-11:00';
        }elseif($lugaresOcup[0]==3){
            $docs='11:00-12:00';
        }elseif($lugaresOcup[0]==4){
            $docs='12:00-13:00';
        }elseif($lugaresOcup[0]==5){
            $docs='13:00-14:00';
        }elseif($lugaresOcup[0]==6){//a partir de aqui se agrega un dia 
            $docs='09:00-10:00';
        }elseif($lugaresOcup[0]==7){
            $docs='10:00-11:00';
        }elseif($lugaresOcup[0]==8){
            $docs='11:00-12:00';
        }elseif($lugaresOcup[0]==9){
            $docs='12:00-13:00';
        }elseif($lugaresOcup[0]==10){
            $docs='13:00-14:00';
        }
    }

    $sqlConsLug = "select lugares from horario where grupo = '$grupo'";//Consulta para obtener lugares del grupo
    $resultado = mysqli_query($conexion, $sqlConsLug);//ejecutar consulta
    $lugaresOcup = mysqli_fetch_row($resultado);//obener los lugares ocupados en ese grupo
    //entrega de docs
function asignarHorarioDocs($lugaresOcup){
    if($lugaresOcup[0]==0){
        $docs='09:00-09:15';
    }elseif($lugaresOcup[0]==1){
        $docs='09:15-09:30';
    }elseif($lugaresOcup[0]==2){
        $docs='09:30-09:45';
    }elseif($lugaresOcup[0]==3){
        $docs='09:45-10:00';
    }elseif($lugaresOcup[0]==4){
        $docs='10:00-10:15';
    }elseif($lugaresOcup[0]==5){
        $docs='10:15-10:30';
    }elseif($lugaresOcup[0]==6){
        $docs='10:30-10:45';
    }elseif($lugaresOcup[0]==7){
        $docs='10:45-11:00';
    }elseif($lugaresOcup[0]==8){
        $docs='11:00-11:15';
    }elseif($lugaresOcup[0]==9){
        $docs='11:15-11:30';
    }elseif($lugaresOcup[0]==10){
        $docs='11:30-11:45';
    }elseif($lugaresOcup[0]==11){
        $docs='11:45-12:00';
    }elseif($lugaresOcup[0]==12){
        $docs='12:00-12:15';
    }elseif($lugaresOcup[0]==13){
        $docs='12:15-12:30';
    }elseif($lugaresOcup[0]==14){
        $docs='12:30-12:45';
    }
    return $docs;
}


//consultas

    $sqlConsDatos="insert into datos_generales values('$folio','$cendi','$grupo','$foto_autorizada','$cita')";

    $sqlConsNin="insert into datos_niño values('".$primer_apellido."','".$segundo_apellido."','".$nombre."','".$fecha."','".$email."','".$edadAnios."','".$edadMeses."','".$curp."','".$folio.
    "','".$foto."')";

    $sqlConsDere="insert into datos_derecho values('".$primer_apellido_derecho."','".$segundo_apellido_derecho."','".$nombre_derecho."','".$calle."','".$noExt.
    "','".$noInt."','".$colonia."','".$alcaldia."','".$entidad."','".$cp."','".$telefono_fijo."','".$telefono_celular."','".$email_derecho.
    "','".$ocupacion."','".$curp_derecho."','".$puesto."','".$sueldo."','".$numero_empleado."','".$adscripcion."','".$horario."','".$extension."','".$folio.
    "','".$foto_derecho."')";

    if ($tieneconyuge =='si'){
        $sqlConsCony="insert into conyuge values('".$primer_apellido_conyuge."','".$segundo_apellido_conyuge."','".$nombre_conyuge."','".$calle_conyuge."','".$noExt_conyuge.
        "','".$noInt_conyuge."','".$colonia_conyuge."','".$alcaldia_conyuge."','".$entidad_conyuge."','".$cp_conyuge."','".$telefono_fijo_conyuge."','".$telefono_celular_conyuge."','".
        $lugar_trabajo_conyuge."','".$domicilio_trabajo_conyuge."','".$telefono_trabajo_conyuge."','".$extension_conyuge."','".$folio."','".$foto_conyuge."')";
    }

//Datos para el pdf

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
        }
    }
    elseif ($grupo == "Lac III - Mat I"){
        if ($lugaresOcup[0] == 10){
            echo "No quedan mas lugares";
        }else{
            mysqli_query($conexion, $sqlConsDatos);//insert todos los datos a BD
            mysqli_query($conexion, $sqlConsNin);
            mysqli_query($conexion, $sqlConsDere);
            if ($tieneconyuge =='si'){
                mysqli_query($conexion, $sqlConsCony);
            }
            $lugaresOcup[0]+=1;
            $sqlConsLug2 = "update horario set lugares = ".$lugaresOcup[0]." where grupo = '".$grupo."'";
            mysqli_query($conexion, $sqlConsLug2);
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
        }
    }
    echo json_encode(array("state"=> 0, "folio"=> $folio, "mensaje"=> "Se ha registrado correctamente"));
?>