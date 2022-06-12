<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

include("../pdf/stringPDF.php");

$email_user = "equipo3tecweb@gmail.com"; //OJO. Debes actualizar esta línea con tu información
$email_password = "otlheyotnscyleep"; //OJO. Debes actualizar esta línea con tu información
$the_subject = "Prueba de PHPMailer ".date("d-m-Y:H:i:s");
$address_to = "juanh7522@gmail.com"; //OJO. Debes actualizar esta línea con tu información
$from_name = "Tec Web E3";
$phpmailer = new PHPMailer();

// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email

$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Prueba del equipo 3</h1>";
$phpmailer->Body .= "<p>Esta es una prueba del envío de correo :D</p>";

//$phpmailer->AddAttachment("", "Importante - ".date("d-m-Y"));

global $pdfDoc;

$phpmailer->AddStringAttachment($pdfDoc, 'Ficha de Registro.pdf', $encoding = 'base64', $type = 'application/pdf');

$phpmailer->IsHTML(true);
if(!$phpmailer->Send()) {
    $message =  "El correo no se ha enviado. Mailer Error: " . $phpmailer->ErrorInfo;
  } else {
    $message = "El correo se ha enviado correctamente";
  }

  echo "<script>alert('$message');</script>";

?>