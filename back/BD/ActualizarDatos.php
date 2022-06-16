<?php
    require("./conexionBD.php");
    $folio='1231';//recibir cual folio a actualizar
    $sqlConyuge="select * from conyuge";//declarar consulta
    $respCon=mysqli_query($conexion,$sqlConyuge);//hacer consulta
    while($fila = mysqli_fetch_array($respCon)){
        if ( $fila['Folio'] == $folio ) {
            $primer_apellido_conyuge = $fila["Primer_Apellido_Conyuge"];
            $segundo_apellido_conyuge = $fila["Segundo_Apellido_Conyuge"];
            $nombre_conyuge = $fila["Nombre_Conyuge"];
            $calle_conyuge = $fila['calle_conyuge'];
            $noExt_conyuge = $fila['noExt_conyuge'];
            $noInt_conyuge = $fila['noInt_conyuge'];
            $colonia_conyuge = $fila['colonia_conyuge'];
            $alcaldia_conyuge = $fila['alcaldia_conyuge'];
            $entidad_conyuge = $fila['entidad_conyuge'];
            $cp_conyuge = $fila['cp_conyuge'];
            $telefono_fijo_conyuge = $fila["Telefono_Fijo_Conyuge"];
            $telefono_celular_conyuge = $fila["Telefono_Celular_Conyuge"];
            $lugar_trabajo_conyuge = $fila["Lugar_Trabajo_Conyuge"];
            $domicilio_trabajo_conyuge = $fila["Domicilio_Trabajo_Conyuge"];
            $telefono_trabajo_conyuge = $fila["Telefono_Trabajo_Conyuge"];
            $extension = $fila["Extension"];
            $imagen_conyuge=$fila["Imagen_Conyuge"];
            $tieneconyuge='si';
        }
        else{
            echo "Folio: ".$folio." no encontrado";
            $tieneconyuge='no';
        }
    }

    $sqlDerecho="select * from datos_derecho";//derecho
    $respDerecho = mysqli_query($conexion,$sqlDerecho);
    while($fila = mysqli_fetch_array($respDerecho)){
        if ( $fila['Folio'] == $folio ) {
            $primer_apellido_derecho = $fila["Primer_Apellido_Derecho"];
            $segundo_apellido_derecho = $fila["Segundo_Apellido_Derecho"];
            $nombre_derecho = $fila["Nombre_Derecho"];
            $calle = $fila['calle'];
            $noExt = $fila['noExt'];
            $noInt = $fila['noInt'];
            $colonia= $fila['colonia'];
            $alcaldia= $fila['alcaldia'];
            $entidad = $fila['entidad'];
            $cp = $fila['cp'];
            $telefono_fijo = $fila["Telefono_Fijo_Derecho"];
            $telefono_celular = $fila["Telefono_Celular_Derecho"];
            $email_derecho = $fila["Email_Derecho"];
            $ocupacion = $fila["Ocupacion_Derecho"];
            $curp_derecho = $fila["Curp_Derecho"];
            $puesto = $fila["Puesto"];
            $sueldo = $fila["Sueldo"];
            $numero_empleado = $fila["Numero_Empleado"];
            $adscripcion = $fila["Adscripcion"];
            $horario = $fila["Horario_Trabajo"];
            $extension = $fila["Extension"];
            $imagen_derecho=$fila["Imagen_Derecho"];
        }else{
            echo "Folio: ".$folio." no encontrado";
        }
    }

    $sqlGen="select * from datos_generales";//generales
    $respGen = mysqli_query($conexion,$sqlGen);
    while($fila = mysqli_fetch_array($respGen)){
        if ( $fila['Folio'] == $folio ) {
            $cendi = $fila["Cendi"];
            $grupo = $fila["Grupo"];
            $imagen_autorizada=$fila["Imagen_Autorizada"];
        }else{
            echo "Folio: ".$folio." no encontrado";
        }
    }
    $sqlNin="select * from datos_niño";//niño
    $respNin = mysqli_query($conexion,$sqlNin);
    while($fila = mysqli_fetch_array($respNin)){
        if ( $fila['Folio'] == $folio ) {
            $primer_apellido = $fila["Primer_Apellido"];
            $segundo_apellido = $fila["Segundo_Apellido"];
            $nombre = $fila["Nombre"];    
            $fechaNac = $fila["FechaNac"];
            $email = $fila["Email"];    
            $edadAnios = $fila["Edad_Anios"];
            $edadMeses= $fila['Edad_Meses'];
            $curp = $fila["Curp"];
            $imagen_ninio=$fila['Imagen_Ninio'];
        }else{
            echo "Folio: ".$folio." no encontrado";
        }
    }

//Insertar los datos a BD

    $conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD

    $sqlActGeneral="update datos_generales set Cendi='".$cendi."',Grupo='".$grupo."',Imagen_Autorizada='".$imagen_autorizada."' where folio = '".$folio."'";

    $sqlActNinio="update datos_niño set Primer_Apellido='".$primer_apellido."',Segundo_Apellido='".$segundo_apellido."',Nombre='".$nombre."',FechaNac='".$fecha."',Email='".$email."',Edad_Anios='".$edadAnios."',Edad_Meses='".$edadMeses.
    "',Curp='".$curp."',Imagen_Ninio='".$imagen_ninio."',Folio='".$folio."'";

    $sqlActDerecho="update datos_derecho set Primer_Apellido_Derecho='".$primer_apellido_derecho."',Segundo_Apellido_Derecho='".$segundo_apellido_derecho."',Nombre_Derecho='".$nombre_derecho."',calle='"
    .$calle."',NoExt='".$noExt."',noInt='".$noInt."',colonia='".$colonia."',alcaldia='".$alcaldia."',entidad='".$entidad."',cp='".$cp."',Telefono_Fijo_Derecho='".$telefono_fijo."',Telefono_Celular_Derecho='"
    .$telefono_celular."',Email_Derecho='".$email_derecho."',Ocupacion_Derecho='".$ocupacion."',Curp_Derecho='".$curp_derecho."',Puesto='".$puesto."',Sueldo='".$sueldo."',Numero_Empleado='".$numero_empleado.
    "',Adscripcion='".$adscripcion."',Horario_Trabajo='".$horario."',Extension='".$extension."',Folio='".$folio."',Imagen_Derecho='".$imagen_derecho."'";
    
    if ($tieneconyuge=='si'){
        $sqlActConyuge="update conyuge set Primer_Apellido_Conyuge = '".$primer_apellido_conyuge."',Segundo_Apellido_Conyuge='".$segundo_apellido_conyuge."',Nombre_Conyuge='".$nombre_conyuge."',calle_conyuge='"
        .$calle_conyuge."',NoExt_conyuge='".$noExt_conyuge."',noInt_conyuge='".$noInt_conyuge."',colonia_conyuge='".$colonia_conyuge."',alcaldia_conyuge='".$alcaldia_conyuge."',entidad_conyuge='".$entidad_conyuge.
        "',cp_conyuge='".$cp_conyuge."',Telefono_Fijo_Conyuge='".$telefono_fijo_conyuge."',Telefono_Celular_Conyuge='".$telefono_celular_conyuge."',Lugar_Trabajo_Conyuge='".$lugar_trabajo_conyuge."',Domicilio_Trabajo_Conyuge='"
        .$domicilio_trabajo_conyuge."',Telefono_Trabajo_Conyuge='".$telefono_trabajo_conyuge."',Extension='".$extension_conyuge."',Folio='".$folio."',Imagen_Conyuge='".$imagen_conyuge."'";
        mysqli_query($conexion,$sqlActConyuge);
    }
    
    mysqli_query($conexion,$sqlActNinio);
    mysqli_query($conexion,$sqlActGeneral);
    mysqli_query($conexion,$sqlActDerecho);

    mysqli_close($conexion);//Cerrar conexion con BD
?>  