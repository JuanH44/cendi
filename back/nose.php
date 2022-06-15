<?php
    if (isset($_REQUEST['tienec'])){
        $nose='si';
    }else{
        $nose='no';
    }
    if ($nose =='si'){
        echo $nose;
    }
?>