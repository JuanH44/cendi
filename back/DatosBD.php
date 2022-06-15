<?php
//sacar todos los datos de la BD para el admin

    $conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD

    //datos generales
    $result=array();
    //declarar consulta
    $sqlGeneral=
        "SELECT DISTINCT * 
        from datos_generales 
        INNER JOIN datos_niño on datos_niño.Folio = datos_generales.Folio
        INNER JOIN datos_derecho on datos_derecho.Folio = datos_generales.Folio
        RIGHT JOIN conyuge on conyuge.Folio = datos_generales.Folio";

    $respGen=mysqli_query($conexion,$sqlGeneral);//hacer consulta
    while($filaGen=mysqli_fetch_assoc($respGen)){
        $result[]=$filaGen;
        //echo 
    }

    $resultado=json_encode($result);
    echo $resultado;
    //file_put_contents("BD.json",$resultado);
    mysqli_close($conexion);
?>