<?php

$conexion = mysqli_connect("localhost","root","","cendi");//conexion a la BD
$sqlConyuge="select * from conyuge";//declarar consulta
$respCon=mysqli_query($conexion,$sqlConyuge);//hacer consulta
while($fila=mysqli_fetch_array($respCon)){
    echo $fila["Primer_Apellido_Conyuge"];
    echo $fila["Segundo_Apellido_Conyuge"];
    echo $fila["Nombre_Conyuge"];
    echo $fila["Domicilio_Conyuge"];
    echo $fila["Telefono_Fijo_Conyuge"];
    echo $fila["Telefono_Celular_Conyuge"];
    echo $fila["Lugar_Trabajo_Conyuge"];
    echo $fila["Domicilio_Trabajo_Conyuge"];
    echo $fila["Telefono_Trabajo_Conyuge"];
    echo $fila["Extension"];
}
$sqlConyuge="select * from datos_derecho";//declarar consulta
$respCon=mysqli_query($conexion,$sqlConyuge);//hacer consulta
while($fila=mysqli_fetch_array($respCon)){
    echo $fila["Primer_Apellido_Derecho"];
    echo $fila["Segundo_Apellido_Derecho"];
    echo $fila["Nombre_Derecho"];
    echo $fila["Domicilio_Derecho"];
    echo $fila["Telefono_Fijo_Derecho"];
    echo $fila["Telefono_Celular_Derecho"];
    echo $fila["Email_Derecho"];
    echo $fila["Ocupacion_Derecho"];
    echo $fila["Curp_Derecho"];
    echo $fila["Puesto"];
    echo $fila["Sueldo"];
    echo $fila["Numero_Empleado"];
    echo $fila["Adscripcion"];
    echo $fila["Horario_Trabajo"];
    echo $fila["Extension"];
}
$sqlConyuge="select * from datos_generales";//declarar consulta
$respCon=mysqli_query($conexion,$sqlConyuge);//hacer consulta
while($fila=mysqli_fetch_array($respCon)){
    echo $fila["Folio"];
    echo $fila["Cendi"];
    echo $fila["Grupo"];
}
while($fila=mysqli_fetch_array($respCon)){
    echo $fila["Primer_Apellido"];
    echo $fila["Segundo_Apellido"];
    echo $fila["Nombre"];    
    echo $fila["FechaNac"];
    echo $fila["Email"];    
    echo $fila["Edad"];
    echo $fila["Curp"];    
    echo $fila["Folio"];
}
while($fila=mysqli_fetch_array($respCon)){
    echo $fila["grupo"];
    echo $fila["lugares"];
    echo $fila["entrevista"];
}
mysqli_close($conexion);
?>