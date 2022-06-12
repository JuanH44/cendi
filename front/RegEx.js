





//RegEx para el frontend




/*Para la entrada del Folio (boleta), se tendrán que validar 10 dígitos o puede ingresarse
    algo como esto: PE12345678 o PP12345678; es decir, las letras PE o PP seguidas de
    8 dígitos o bien; el número de boleta (a 10 dígitos).*/
   
   
   
   
    let boleta, nombre, apellido;

    boleta = "PP10345678";



    let patterBoleta = /^(PE|PP)\d{8}$/;

    if(!patterBoleta.test(boleta)){
        console.log("La boleta no es válida");
    } else {
        console.log("La boleta es válida");
    }


    
    /* CURP, se validará que máximo se ingresen 18 caracteres (los primeros 4
    deberán ser letras, los siguientes 6 serán números, los siguientes 6 serán letras y para los
    últimos dos podrán ser números, letras o la combinación de éstos).*/

    let patterCurp = /^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}$/;

    let patterNombre = /^[a-zA-Z\s]{2,20}$/;

    let patterApellido = /^[a-zA-Z\s]{2,20}$/;

    /* Email, tendrá que validar que lo que ingrese el usuario sea válido*/
    let patterEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;