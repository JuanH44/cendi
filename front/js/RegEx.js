$(document).ready(function () {

    const inputs = document.querySelectorAll('input');

    inputs.forEach((input) => {
        input.addEventListener('blur', (e) => {
            validate(e.target, patterns[e.target.attributes.id.value]);
         });
    });


    const patterns = {
    folio:/^(PE|PP)\d{8}$/,

    nombre:/^[a-zA-Z\s]{2,}$/i,
    primer_apellido: /^[a-zA-Z\s]{2,}$/,
    segundo_apellido: /^[a-zA-Z\s]{2,}$/,
    curp: /^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}$/,
    email: /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,

    primer_apellido_derecho: /^[a-zA-Z\s]{2,}$/,
    segundo_apellido_derecho:/^[a-zA-Z\s]{2,}$/,
    nombre_derecho:/^[a-zA-Z\s]{2,}$/,

    noExt: /^\d{1,}$/,
    noInt: /^\d{0,}$/,
    cp:  /^\d{5}$/,

    telefono_fijo:  /^\d{10}$/,
    telefono_celular: /^\d{10}$/,
    email_derecho: /^\d{10}$/,
    curp_derecho:  /^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}$/,
    puesto: /^[a-zA-Z\s]{2,}$/,
    sueldo: /^\d$/,

    numEmpleado:  /^\d{5,7}$/,
    extension: /^\d{5}$/,

    primer_apellido_conyuge:  /^[a-zA-Z\s]{2,}$/,
    segundo_apellido_conyuge:  /^[a-zA-Z\s]{2,}$/,
    nombre_conyuge:  /^[a-zA-Z\s]{2,}$/,
    noExt_conyuge: /^\d{1,}$/,
    noInt_conyuge: /^\d{0,}$/,
    cp_conyuge:  /^\d{5}$/,
    telefono_fijo_conyuge: /^\d{10}$/,
    telefomo_celular_conyuge: /^\d{10}$/,
    telefomo_trabajo_conyuge: /^\d{10}$/,
    extension_conyuge: /^\d{4,5}$/,
 
};

function validate(field, regex) {
  if (regex.test(field.value)) {
    field.className = 'form-control valid';
  } else {
    field.className = 'form-control invalid';
  }
}

function checkValid(inputs){
    let valid = true;
    
    return valid;
}

$("#btn-submit").click(function(){
    let valid = true;

    for(let i=0; i < inputs.length; i++){
        if (inputs[i].classList.contains("invalid") || inputs[i].value == "" || inputs[i].value == null){
             Swal.fire({
                icon: 'error',
                title: 'Datos incompetos',
                text: 'Faltan datos o no cumplen con el formato requerido',
                showConfirmButton: true,
              //  timer: 2200
            });
              
            inputs[i].focus();
            valid = false;
            break;
        }
    }

    // inputs.forEach((input) => {
    //     if (input.classList.contains('invalid')) {
    //     valid = false;
    //     //alert("Faltan campos por llenar");
    //     input.focus();
    //     return false;
    //     }
    //     break;
    // });
    return valid;
});

});
