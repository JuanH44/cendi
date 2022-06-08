<?php
    //$folio = $_REQUEST['folio'];
    folio = 123;//

    //Datos Generales

    $folio=$_REQUEST['folio'];
    $grupo=$_REQUEST['grupo'];
    $cendi="Amalia Solórzano de Cárdenas";//cambiar value

    //Datos niño
    $primer_apellido=$_REQUEST['primer_apellido'];
    $segundo_apellido=$_REQUEST['segundo_apellido'];
    $nombre=$_REQUEST['nombre'];
    $fecha=$_REQUEST['fecha'];
    $email=$_REQUEST['email'];
    $edad=$_REQUEST['edad'];
    $curp=$_REQUEST['curp'];

    //Datos Derechoabiente
    $primer_apellido_derecho=$_REQUEST['primer_apellido_derecho'];
    $segundo_apellido_derecho=$_REQUEST['segundo_apellido_derecho'];
    $nombre_derecho=$_REQUEST['nombre_derecho'];
    $domicilio=$_REQUEST['domicilio'];
    $telefono_fijo=$_REQUEST['telefono_fijo'];
    $telefono_celular=$_REQUEST['telefono_celular'];
    $email_derecho=$_REQUEST['email_derecho'];
    if ($_REQUEST['ocupacion']==1){
        $ocupacion="Docente";
    }elseif($_REQUEST['ocupacion']==1){
        $ocupacion="PAAE";
    }else{
        $ocupacion="Funcionario(a)";
    }
    $curp_derecho=$_REQUEST['curp_derecho'];
    $puesto=$_REQUEST['puesto'];
    $sueldo=$_REQUEST['sueldo'];
    $numero_empleado=$_REQUEST['numero_empleado'];
    if ($_GET['adscripcion']==1){
        $adscripcion="Cet";
    }elseif($_REQUEST['adscripcion']==2){
        $adscripcion="Cecyt 1";
    }else{
        $adscripcion="Cecyt 2";
    }

    if ($_REQUEST['horario']==1){
        $horario="07:00 a 15:00";
    }elseif($_G_REQUESTET['horario']==2){
        $horario="08:00 a 15:00";
    }else{
        $horario="07:00 a 14:00";
    }
    $extension=$_REQUEST['extension'];

    //Datos Conyugue
    $primer_apellido_conyuge=$_REQUEST['primer_apellido_conyuge'];
    $segundo_apellido_conyuge=$_REQUEST['segundo_apellido_conyuge'];
    $nombre_conyuge=$_REQUEST['nombre_conyuge'];
    $domicilio_conyuge=$_REQUEST['domicilio_conyuge'];
    $telefono_fijo_conyuge=$_REQUEST['telefono_fijo_conyuge'];
    $telefono_celular_conyuge=$_REQUEST['telefono_celular_conyuge'];
    $lugar_trabajo_conyuge=$_REQUEST['lugar_trabajo_conyuge'];
    $domicilio_trabajo_conyuge=$_REQUEST['domicilio_trabajo_conyuge'];
    $telefono_trabajo_conyuge=$_REQUEST['telefono_trabajo_conyuge'];
    $extension_conyuge=$_REQUEST['extension_conyuge'];


    //Insertar los datos

    $sqlConsDatos="insert into datos_generales values('".$folio."','".$cendi."','".$grupo."')";

    $sqlConsNin="insert into datos_niño values('".$primer_apellido."','".$segundo_apellido."','".$nombre."','".$fecha."','".$email."','".$edad."','".$curp."','".$folio."')";

    $sqlConsDere="insert into datos_derecho values('".$primer_apellido_derecho."','".$segundo_apellido_derecho."','".$nombre_derecho."','".$domicilio."','".$telefono_fijo."','"
    .$telefono_celular."','".$email_derecho."','".$ocupacion."','".$curp_derecho."','".$puesto."','".$sueldo."','".$numero_empleado."','".$adscripcion."','".$horario."','".$extension.
    "','".$folio."')";

    $sqlConsCony="insert into conyuge values('".$primer_apellido_conyuge."','".$segundo_apellido_conyuge."','".$nombre_conyuge."','".$domicilio_conyuge."','".$telefono_fijo_conyuge."','"
    .$telefono_celular_conyuge."','".$lugar_trabajo_conyuge."','".$domicilio_trabajo_conyuge."','".$telefono_trabajo_conyuge."','".$extension_conyuge."','".$folio."')";


?>