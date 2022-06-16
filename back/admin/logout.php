<?php
    session_start();
    session_destroy();
    header("Location: /cendi/front/login.html");
?>