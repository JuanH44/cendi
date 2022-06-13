<?php
//sacar todos los datos de la BD para el admin

    $conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD

    //datos generales
    $result=array();

    $sqlGeneral="select * from datos_generales";//declarar consulta
    $respGen=mysqli_query($conexion,$sqlGeneral);//hacer consulta

    $sqlNin="select * from datos_niño";//declarar consulta
    $respNin=mysqli_query($conexion,$sqlNin);//hacer consulta

    $sqlDerecho="select * from datos_derecho";//declarar consulta
    $respDer=mysqli_query($conexion,$sqlDerecho);//hacer consulta

    $sqlConyuge="select * from conyuge";//declarar consulta
    $respCon=mysqli_query($conexion,$sqlConyuge);//hacer consulta

    while($filaGen=mysqli_fetch_assoc($respGen)){
        $result[]=$filaGen;
    }
    while($filaNin=mysqli_fetch_assoc($respNin)){
        $result[]=$filaNin;
    }
    while($filaDer=mysqli_fetch_assoc($respDer)){
        $result[]=$filaDer;
    }
    while($filaCon=mysqli_fetch_assoc($respCon)){
        $result[]=$filaCon;
    }
    $resultado=json_encode($result);
    file_put_contents("BD.json",$resultado);
    mysqli_close($conexion);
?>