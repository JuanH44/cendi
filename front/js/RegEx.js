


 function validateFields(){

     let valido = true;
    //Validar datos del (la) infante
    valido = valido & validateFolio();
    valido = valido & validateNombre('#nombre');
    valido = valido & validateApellido('#primer_apellido');
    valido = valido & validateApellido('#segundo_apellido');
    valido = valido & validateCurp('#curp');
    valido = valido & validateEmail('#email');

    //Validar datos del derechohabitante
    valido = valido & validateApellido('#primer_apellido_derecho');
    valido = valido & validateApellido('#segundo_apellido_derecho');
    valido = valido & validateNombre('#nombre_derecho');

    valido = valido & validateNumero('#noExt');
    valido = valido & validateNumero('#noInt');
    valido = valido & validateCP('#cp');


    valido = valido & validateTelefono('#telefono_fijo');
    valido = valido & validateTelefono('#telefono_celular');
    valido = valido & validateEmail('#email_derecho');
    valido = valido & validateCurp('#curp_derecho');
    valido = valido & validatePuesto('#puesto');
    valido = valido & validateNumero('#sueldo');
    valido = valido & validateNumEmpleado();
    valido = valido & validateExtension();
   

    //Validar datos del conyuge
    if ($('#tienec').is(':checked')) {
    valido = valido & validateApellido('#primer_apellido_conyuge');
    valido = valido & validateApellido('#segundo_apellido_conyuge');
    valido = valido & validateNombre('#nombre_conyuge');
    valido = valido & validateNumero('#noExt_conyuge');
    valido = valido & validateNumero('#noInt_conyuge');
    valido = valido & validateCP('#cp_conyuge');
    valido = valido & validateTelefono('#telefono_fijo_conyuge');
    valido = valido & validateTelefono('#telefono_celular_conyuge');
    valido = valido & validateTelefono('#telefono_trabajo_conyuge');
    valido = valido & validateExtension2();
    }    


    return valido;

 }


//RegEx para el frontend




/*Para la entrada del Folio (boleta), se tendrán que validar 10 dígitos o puede ingresarse
    algo como esto: PE12345678 o PP12345678; es decir, las letras PE o PP seguidas de
    8 dígitos o bien; el número de boleta (a 10 dígitos).*/
function validateFolio(){
    let folio = $('#folio').val();
    let patterBoleta = /^(PE|PP)\d{8}$/;
    if(!patterBoleta.test(folio)){
        alert("El Folio debe tener 10 caracteres y empezar con PE o PP");
       // $('#folio').val("");
        $('#folio').focus();
        return false;
    }
    return true;
}

function validateNombre(id){
    let nombre = $(id).val();
    let patterNombre = /^[a-zA-Z\s]{2,}$/;
    if(!patterNombre.test(nombre)){
        alert("El nombre sólo puede contener letras y debe tener al menos 2 caracteres");
        $(id).focus();
        return false;
    }
    return true;
}

function validateApellido(id){
    let apellido = $(id).val();
    let patterApellido = /^[a-zA-Z\s]{2,}$/;
    if(!patterApellido.test(apellido)){
        alert("El apellido sólo puede contener letras y debe tener al menos 2 caracteres");
        $(id).focus();
        return false;
    }
    return true;
}
    
function validateCurp(id){
    let curp = $(id).val();
    let patterCurp = /^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}$/;
    if(!patterCurp.test(curp)){
        alert("La CURP es incorrecta");
        $(id).focus();
        return false;
    }
    return true;
}

function validateEmail(id){
    let email = $(id).val();
    let patterEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    if(!patterEmail.test(email)){
        alert("El email es incorrecto");
        $(id).focus();
        return false;
    }
    return true;
}

function validateTelefono(id){
    let telefono = $(id).val();
    let patterTelefono = /^\d{10}$/;
    if(!patterTelefono.test(telefono)){
        alert("El teléfono debe tener 10 dígitos");
        $(id).focus();
        return false;
    }
    return true;
}

function validatePuesto(id) {
    let puesto = $(id).val();
    let patterPuesto = /^[a-zA-Z\s]{2,}$/;
    if(!patterPuesto.test(puesto)){
        alert("Este campo sólo puede contener letras y debe tener al menos 2 caracteres");
        $(id).focus();
        return false;
    }
    return true;
}

function validateNumero(id) {
    let numero = $(id).val();
    let patterNumero = /^\d{1,}$/;
    if(!patterNumero.test(numero)){
        alert("Este campo sólo puede contener números");
        $(id).focus();
        return false;
    }
    return true;
}

function validateNumEmpleado() {
    let numEmpleado = $('#numero_empleado').val();
    let patterNumEmpleado = /^\d{5,7}$/;
    if(!patterNumEmpleado.test(numEmpleado)){
        alert("El número de empleado debe tener de 5 a 7 dígitos");
        $('#num_empleado').focus();
        return false;
    }
    return true;
}

function validateExtension(){
    let extension = $('#extension').val();
    let patterExtension = /^\d{5}$/;
    if(!patterExtension.test(extension)){
        alert("La extensión debe tener 5 dígitos");
        $('#extension').focus();
        return false;
    }  
    return true;
}

function validateExtension2(){
    let extension = $('#extension_conyuge').val();
    let patterExtension = /^\d{4,5}$/;
    if(!patterExtension.test(extension)){
        alert("La extensión debe tener de 4 a 5 dígitos");
        $('#extension_conyuge').focus();
        return false;
    }  
    return true;

}

function validateCP(id){
    let cp = $(id).val();
    let patterCP = /^\d{5}$/;
    if(!patterCP.test(cp)){
        alert("El código postal debe tener 5 dígitos");
        $(id).focus();
        return false;
    }
    return true;
}

    /* CURP, se validará que máximo se ingresen 18 caracteres (los primeros 4
    deberán ser letras, los siguientes 6 serán números, los siguientes 6 serán letras y para los
    últimos dos podrán ser números, letras o la combinación de éstos).*/
