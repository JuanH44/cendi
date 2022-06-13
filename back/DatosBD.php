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

    $cont=0;
    while($filaGen=mysqli_fetch_assoc($respGen)){
        while($filaNin=mysqli_fetch_assoc($respNin)){
            if ($filaGen['Folio'] == $filaNin["Folio"]){
                $result[$cont]=array_merge_recursive($filaGen,$filaNin);
                break;
            }
        }
        while($filaDer=mysqli_fetch_assoc($respDer)){
            if ($filaGen['Folio']==$filaDer["Folio"]){
                $result[$cont]=array_merge_recursive($result,$filaDer);
                break;
            }
        }
        while($filaCon=mysqli_fetch_assoc($respCon)){
            if ($filaGen['Folio']==$filaCon["Folio"]){
                $result[$cont]=array_merge_recursive($result,$filaCon);
                break;
            }
        }
        $cont++;
    }
    print_r( $result[2]);
    //echo $json_info = json_encode($result[1]);
    mysqli_close($conexion);
?>