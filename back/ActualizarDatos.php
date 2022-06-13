<?php

    //Datos Generales
    $cendi="Amalia Solórzano de Cárdenas";//No se puede cambiar
    $folio=$_GET['folio'];
    $grupo=$_GET['grupo'];//**********

    //Datos niño
    $primer_apellido=$_GET['primer_apellido'];
    $segundo_apellido=$_GET['segundo_apellido'];
    $nombre=$_GET['nombre'];
    $fecha=$_GET['fecha'];
    $edad=$_GET['edadAnios'];
    $email=$_GET['email'];
    $curp=$_GET['curp'];

    //Datos Derechoabiente
    $primer_apellido_derecho=$_GET['primer_apellido_derecho'];
    $segundo_apellido_derecho=$_GET['segundo_apellido_derecho'];
    $nombre_derecho=$_GET['nombre_derecho'];
    $domicilio=$_GET['domicilio'];
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
    $tieneconyuge=$_GET['tieneconyuge'];
    if ($tieneconyuge =='Sí'){
        $primer_apellido_conyuge=$_GET['primer_apellido_conyuge'];
        $segundo_apellido_conyuge=$_GET['segundo_apellido_conyuge'];
        $nombre_conyuge=$_GET['nombre_conyuge'];
        $domicilio_conyuge=$_GET['domicilio_conyuge'];
        $telefono_fijo_conyuge=$_GET['telefono_fijo_conyuge'];
        $telefono_celular_conyuge=$_GET['telefono_celular_conyuge'];
        $lugar_trabajo_conyuge=$_GET['lugar_trabajo_conyuge'];
        $domicilio_trabajo_conyuge=$_GET['domicilio_trabajo_conyuge'];
        $telefono_trabajo_conyuge=$_GET['telefono_trabajo_conyuge'];
        $extension_conyuge=$_GET['extension_conyuge'];
    }

//Insertar los datos a BD

    $conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD

    $sqlActGeneral="update datos_generales set Cendi='".$cendi."',Grupo='".$grupo."' where folio = '".$folio."'";

    $sqlActNinio="update datos_niño set Primer_Apellido='".$primer_apellido."',Segundo_Apellido='".$segundo_apellido."',Nombre='".$nombre."',FechaNac='".$fecha."',Email='".$email."',Edad='".$edad."',Curp='"
    .$curp."',Folio='".$folio."'";

    $sqlActDerecho="update datos_derecho set Primer_Apellido_Derecho='".$primer_apellido_derecho."',Segundo_Apellido_Derecho='".$segundo_apellido_derecho."',Nombre_Derecho='".$nombre_derecho."',Domicilio_Derecho='"
    .$domicilio."',Telefono_Fijo_Derecho='".$telefono_fijo."',Telefono_Celular_Derecho='".$telefono_celular."',Email_Derecho='".$email_derecho."',Ocupacion_Derecho='".$ocupacion."',Curp_Derecho='"
    .$curp_derecho."',Puesto='".$puesto."',Sueldo='".$sueldo."',Numero_Empleado='".$numero_empleado."',Adscripcion='".$adscripcion."',Horario_Trabajo='".$horario."',Extension='".$extension."',Folio='".$folio."'";
    
    $tieneconyuge=$_GET['tieneconyuge'];
    if ($tieneconyuge=='Sí'){
        $sqlActConyuge="update conyuge set Primer_Apellido_Conyuge = '".$primer_apellido_conyuge."',Segundo_Apellido_Conyuge='".$segundo_apellido_conyuge."',Nombre_Conyuge='".$nombre_conyuge."',Domicilio_Conyuge='"
        .$domicilio_conyuge."',Telefono_Fijo_Conyuge='".$telefono_fijo_conyuge."',Telefono_Celular_Conyuge='".$telefono_celular_conyuge."',Lugar_Trabajo_Conyuge='".$lugar_trabajo_conyuge."',Domicilio_Trabajo_Conyuge='"
        .$domicilio_trabajo_conyuge."',Telefono_Trabajo_Conyuge='".$telefono_trabajo_conyuge."',Extension='".$extension_conyuge."',Folio='".$folio."'";
        mysqli_query($conexion,$sqlActConyuge);
    }
    mysqli_query($conexion,$sqlActNinio);
    mysqli_query($conexion,$sqlActGeneral);
    mysqli_query($conexion,$sqlActDerecho);

    mysqli_close($conexion);//Cerrar conexion con BD
?>  