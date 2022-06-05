<?php 
    //require("fpdf184/fpdf.php");

    //$pdf = new FPDF();
    //$pdf -> AddPage();
    //$pdf ->SetFont('helvetica','B',20);
    //$pdf ->Cell(0,20, 'Hola grupo 4CM4!',1);
    //$pdf ->Output();
    /////////////////////Conexion BD////////////////////:

//Datos Generales

$folio=$_GET['folio'];
$grupo=$_GET['grupo'];
$cendi="Amalia Solórzano de Cárdenas";//cambiar value

echo "Aquie".$folio;


//Datos niño
$primer_apellido=$_GET['primer_apellido'];
$segundo_apellido=$_GET['segundo_apellido'];
$nombre=$_GET['nombre'];
$fecha=$_GET['fecha'];
$email=$_GET['email'];
$edad=$_GET['edad'];
$curp=$_GET['curp'];

//Datos Derechoabiente
$primer_apellido_derecho=$_GET['primer_apellido_derecho'];
$segundo_apellido_derecho=$_GET['segundo_apellido_derecho'];
$nombre_derecho=$_GET['nombre_derecho'];
$domicilio=$_GET['domicilio'];
$telefono_fijo=$_GET['telefono_fijo'];
$telefono_celular=$_GET['telefono_celular'];
$email_derecho=$_GET['email_derecho'];
if ($_GET['ocupacion']==1){
    $ocupacion="Docente";
}elseif($_GET['ocupacion']==1){
    $ocupacion="PAAE";
}else{
    $ocupacion="Funcionario(a)";
}
$curp_derecho=$_GET['curp_derecho'];
$puesto=$_GET['puesto'];
$sueldo=$_GET['sueldo'];
$numero_empleado=$_GET['numero_empleado'];
if ($_GET['adscripcion']==1){
    $adscripcion="Cet";
}elseif($_GET['adscripcion']==2){
    $adscripcion="Cecyt 1";
}else{
    $adscripcion="Cecyt 2";
}

if ($_GET['horario']==1){
    $horario="07:00 a 15:00";
}elseif($_GET['horario']==2){
    $horario="08:00 a 15:00";
}else{
    $horario="07:00 a 14:00";
}
$extension=$_GET['extension'];

//Datos Conyugue
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


//conectar a BD
$conexion = mysqli_connect("localhost","root","","cendi");

$sql1="insert into datos_generales values('".$folio."','".$cendi."','".$grupo."')";

$sql2="insert into datos_niño values('".$primer_apellido."','".$segundo_apellido."','".$nombre."','".$fecha."','".$email."','".$edad."','".$curp."','".$folio."')";

$sql3="insert into datos_derecho values('".$primer_apellido_derecho."','".$segundo_apellido_derecho."','".$nombre_derecho."','".$domicilio."','".$telefono_fijo."','"
.$telefono_celular."','".$email_derecho."','".$ocupacion."','".$curp_derecho."','".$puesto."','".$sueldo."','".$numero_empleado."','".$adscripcion."','".$horario."','".$extension."')";

$sql4="insert into conyuge values('".$primer_apellido_conyuge."','".$segundo_apellido_conyuge."','".$nombre_conyuge."','".$domicilio_conyuge."','".$telefono_fijo_conyuge."','"
.$telefono_celular_conyuge."','".$lugar_trabajo_conyuge."','".$domicilio_trabajo_conyuge."','".$telefono_trabajo_conyuge."','".$extension_conyuge."')";

mysqli_query($conexion, $sql1);//insert todos los datos
mysqli_query($conexion, $sql2);
mysqli_query($conexion, $sql3);
//comprobar que tiene conyugue
mysqli_query($conexion, $sql4);



echo "ha sido registrado";
?>