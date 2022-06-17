<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/custom.css" />
    <!--Jquery-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <title>.::Admin::.</title>

</head>

<body>
    <div class="row blue lighten-4">
        <div id="cuadros">
            <header id="navegacion"></header>
        </div>
        <div class="row"></div>

        <div class="row">
            <ul class="collection" id="alumnos">

            </ul>
        </div>
        <footer id="futer"></footer>
    </div>
</body>

</html>