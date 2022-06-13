<?php
//sacar todos los datos de la BD para el admin

    $conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD

    //datos generales
    $result=array();
    //declarar consulta
    $sqlGeneral="
    select DISTINCT * 
    from datos_generales as dg 
    inner join datos_niño as dn on dn.Folio = dg.Folio 
    inner join datos_derecho as dd on dd.Folio = dg.Folio 
    RIGHT join conyuge as dc on dc.Folio = dg.Folio UNION 
    select DISTINCT * 
    from datos_generales as dg 
    inner join datos_niño as dn on dn.Folio = dg.Folio 
    inner join datos_derecho as dd on dd.Folio = dg.Folio 
    LEFT join conyuge as dc on dc.Folio = dg.Folio";

    $respGen=mysqli_query($conexion,$sqlGeneral);//hacer consulta
    while($filaGen=mysqli_fetch_assoc($respGen)){
        $result[]=$filaGen;
        echo " ".$filaGen['Folio'];
    }
    $resultado=json_encode($result);
    file_put_contents("BD.json",$resultado);
    mysqli_close($conexion);
?>