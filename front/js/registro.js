$(document).ready(function () {
    $("#navegacion").load("./compartidos/barranav.html");
    $("#futer").load("./compartidos/futer.html");
    $('select').formSelect(); //jala select
    $('input#input_text, textarea#textarea2').characterCounter(); // jala counter
    var alumno = { curp: 'Jose Angel', folio: 'Espinosa' };
    //activaciones
    //$('.datepicker').datepicker();
    // Import the functions you need from the SDKs you need
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    
    /*
    const firebaseConfig = {
        apiKey: "AIzaSyAhbifQ26AXAHwEfLfWHsy-zUpgUFJ5RU4",
        authDomain: "cendi-c14d4.firebaseapp.com",
        projectId: "cendi-c14d4",
        storageBucket: "cendi-c14d4.appspot.com",
        messagingSenderId: "698358442422",
        appId: "1:698358442422:web:3b294082c1704d543d7917",
        measurementId: "G-8G6YYRHKLQ"
    };
    */
   //alert(firebaseConfig);

    // Initialize Firebase
    //const app = initializeApp(firebaseConfig);
    

    //uploading file in storage
    function uploadimage() {

        alert('Aqui te voy');
        /*
        
        var type = "Images";
        var storage = app.storage();
        var file = $("#foto").files[0];
        var storageref = storage.ref();
        var thisref = storageref.child(type).child(file.name).put(file);
        alert('Ahora sy');
        thisref.on('state_changed', function (snapshot) {


        }, function (error) {

        }, function () {
            // Uploaded completed successfully, now we can get the download URL
            thisref.snapshot.ref.getDownloadURL().then(function (downloadURL) {
                //getting url of image
                //document.getElementById("url ").value = downloadURL;
                let urele = 'uploaded successfully'+ downloadURL; 
                alert(urele);
            });
        });

        */
    }

    function anioHoy() {
        var hoy = new Date();
        return hoy.getFullYear();
    }

    $('.datepicker').datepicker({
        format: 'dd mmm yyyy',
        yearRange: [anioHoy() - 6, anioHoy()],
        i18n: {
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
            weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            selectMonths: true,
            selectYears: 100, // Puedes cambiarlo para mostrar más o menos años
            today: 'Hoy',
            clear: 'Limpiar',
            close: 'Ok',
            labelMonthNext: 'Siguiente mes',
            labelMonthPrev: 'Mes anterior',
            labelMonthSelect: 'Selecciona un mes',
            labelYearSelect: 'Selecciona un año',
        }
        ,
        onSelect: function (selDate) {
            var hoy = new Date();
            var fechaNac = new Date(selDate);
            var anios = hoy.getFullYear() - fechaNac.getFullYear();
            var meses = hoy.getMonth() - fechaNac.getMonth();
            if (anios <= 0 && meses <= 0 && (hoy.getDate() < fechaNac.getDate())) {
                let texto = "Esa criatura aún no ha nacido. " + "Años: " + anios + ", meses: " + meses;
                alert(texto);
            } else {
                if (meses < 0) {
                    anios--;
                    meses = (12 + meses);
                }
                if ((anios > 6) || (anios == 6 && meses > 0)) {
                    let texto = "Va para Primaria, no CENDI. " + "Años: " + anios + ", meses: " + meses;
                    alert(texto);
                } else {
                    //let texto = "Chido "+ "Años: " + anios + ", meses: " + meses;
                    //alert(texto);
                }
            }
            ///Se llenan los campos con la edad calculada
            $('#edadAnios').val(anios);
            $('#edadMeses').val(meses);
            M.updateTextFields();

        }
    });
    /*
    $('#fecha').ready(function (){
        $("#fecha").change(function (selDate) {
            var today = new Date();
            alert(typeof(selDate ));
            var birthDate = new Date(selDate);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
    
            alert(age);
        });
    });
    */




    $('#fila-conyuge').hide();
    $('#tienec').click(function () {
        if ($('#tienec').prop('checked')) {
            //alert('cheacado pap');
            $('#fila-conyuge').show();
        } else {
            //alert('no tiene');
            $('#fila-conyuge').hide();
        }
    });
    $("#btn-reset").click(function () {
        $("#formulario").trigger('reset');
        $('#fila-conyuge').hide();
    });

    // Old way
    // $('select').material_select();
    $("#formulario").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        uploadimage();

        var form = $(this);
        var actionUrl = form.attr('action');
        let fotoURL = "https://www.ipn.mx/assets/files/saes/img/escudosNS/IPN-Default.png";
        var informacion = {

            cendi: $('#cendi').val(),
            foto: fotoURL,
            folio: $('#folio').val(),
            grupo: $('#grupo').val(),

            //Datos niño
            primer_apellido: $('#primer_apellido').val(),
            segundo_apellido: $('#segundo_apellido').val(),
            nombre: $('#nombre').val(),
            fecha: $('#fecha').val(),
            edadAnios: $('#edadAnios').val(),
            edadMeses: $('#edadMeses').val(),
            email: $('#email').val(),
            curp: $('#curp').val(),

            //Datos de derechohabiente
            primer_apelido_derecho: $('#primer_apelido_derecho').val(),
            segundo_apellido_derecho: $('#segundo_apellido_derecho').val(),
            nombre_derecho: $('#nombre_derecho').val(),
            calle: $('#calle').val(),
            noExt: $('#noExt').val(),
            noInt: $('#noInt').val(),
            colonia: $('#colonia').val(),
            alcaldia: $('#alcaldia').val(),
            entidad: $('#entidad').val(),
            cp: $('#cp').val(),
            telefono_fijo: $('#telefono_fijo').val(),
            telefono_celular: $('#telefono_celular').val(),
            email_derecho: $('#email_derecho').val(),
            ocupacion: $('#ocupacion').val(),
            curp_derecho: $('#curp_derecho').val(),
            puesto: $('#puesto').val(),
            sueldo: $('#sueldo').val(),
            numero_empleado: $('#numero_empleado').val(),
            adscripcion: $('#adscripcion').val(),
            horario: $('#horario').val(),
            extension: $('#extension').val(),

            //Datos del conyuge
            tienec: $('#tienec').val(),
            primer_apelido_conyuge: $('#primer_apelido_conyuge').val(),
            segundo_apellido_conyuge: $('#segundo_apellido_conyuge').val(),
            nombre_conyuge: $('#nombre_conyuge').val(),
            calle_conyuge: $('#calle_conyuge').val(),
            noExt_conyuge: $('#noExt_conyuge').val(),
            noInt_conyuge: $('#noInt_conyuge').val(),
            colonia_conyuge: $('#colonia_conyuge').val(),
            alcaldia_conyuge: $('#alcaldia_conyuge').val(),
            entidad_conyuge: $('#entidad_conyuge').val(),
            cp_conyuge: $('#cp_conyuge').val(),
            telefono_fijo_conyuge: $('#telefono_fijo_conyuge').val(),
            telefono_celular_conyuge: $('#telefono_celular_conyuge').val(),
            lugar_trabajo_conyuge: $('#lugar_trabajo_conyuge').val(),
            domicilio_trabajo_conyuge: $('#domicilio_trabajo_conyuge').val(),
            telefono_trabajo_conyuge: $('#telefono_trabajo_conyuge').val(),
            extension_conyuge: $('#extension_conyuge').val()

        };

        let salida = JSON.stringify(informacion);
        alert('averaaaa');



        $.ajax({
            type: "POST",
            url: actionUrl,
            data: informacion, // serializes the form's elements.
            success: function (data) {
                alert(data); // show response from the php script.
            }
        });

    });

    $('#btn-imprimir').click(function () {
        alert('dalee');
        let url = "../back/hola.php?" + "curp=" + alumno.curp + "&" + "folio=" + alumno.folio;
        window.open(url, '_blank');
    })


    
});