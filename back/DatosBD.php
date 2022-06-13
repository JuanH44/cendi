<?php
//sacar todos los datos de la BD para el admin

    $conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD

    //datos generales
    $result=array();
    //declarar consulta
    $sqlGeneral="
    select DISTINCT  * 
    from datos_generales as dg, datos_niño as dn, datos_derecho as dd, conyuge as dc WHERE dg.Folio=dn.Folio AND dn.Folio=dd.Folio AND dd.Folio=dc.Folio";

    
    // from datos_generales as dg 
    // inner join datos_niño as dn on dn.Folio = dg.Folio 
    // inner join datos_derecho as dd on dd.Folio = dg.Folio 
    // RIGHT join conyuge as dc on dc.Folio = dg.Folio UNION 
    // select DISTINCT * 
    // from datos_generales as dg 
    // inner join datos_niño as dn on dn.Folio = dg.Folio 
    // inner join datos_derecho as dd on dd.Folio = dg.Folio 
    // LEFT join conyuge as dc on dc.Folio = dg.Folio";

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