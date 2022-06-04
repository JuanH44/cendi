<?php
    //suport to utf8
    mb_internal_encoding("UTF-8");
    //mb_http_output("UTF-8");
    //mb_http_input("UTF-8");
    //mb_language("unified-case");
    mb_regex_encoding("UTF-8");

    //Pondré aquí las expresiones regulares que se utilizarán en el back-end
    // para agregarlas al formulario de registro despues.


    /*Para la entrada del Folio (boleta), se tendrán que validar 10 dígitos o puede ingresarse
    algo como esto: PE12345678 o PP12345678; es decir, las letras PE o PP seguidas de
    8 dígitos o bien; el número de boleta (a 10 dígitos).*/
    $paternBoleta = '/^(PE|PP)[0-9]{8}$/';
    
    /* CURP, se validará que máximo se ingresen 18 caracteres (los primeros 4
    deberán ser letras, los siguientes 6 serán números, los siguientes 6 serán letras y para los
    últimos dos podrán ser números, letras o la combinación de éstos).*/
    $paternCurp = '/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9A-Z]{2}$/';
    
    
    $paternNombre = '/^[a-zA-Z\s]{2,20}$/';

    $paternApellido = '/^[a-zA-Z\s]{2,20}$/';

    /* Email, tendrá que validar que lo que ingrese el usuario sea válido*/
    $paternEmail = '/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/';




    echo preg_match($paternBoleta, 'PE12345678');

    echo preg_match($paternNombre, 'Hernández'); //Buscar como validar un nombre con  UTF-8

    //Validar nombre con UTF-8



   /* Cada campo del formulario deberá estar validado con Javascript (antes de ser
enviados al servidor), por ejemplo, para la entrada de teléfono solo se podrán ingresar
máximo 10 dígitos y el usuario no deberá poder ingresar letras; para la entrada de
Nombre sólo letras y así, para cada uno de las demás entradas/elementos.

✓ En el elemento Fecha de nacimiento, considerar un campo de tipo calendario.
✓ En el campo de Edad se deberá cargar automáticamente los años y meses que tiene el
niño o la niña, tomando en cuenta que no podrá exceder de los 6 años.

✓ El campo de Entidad Federativa, deberá contener el nombre de los 32 estados de la
República Mexicana.

✓ En el campo de Adscripción deberán considerar todos los CECyT, el CET 1, las escuelas
de nivel superior y la opción de Área Central.
✓ En el Horario de trabajo, se podrá elegir: de 07:00 a 15:00, de 08:00 a 15:00 ó de
07:00 a 14:00 horas.*/



?>