$(document).ready(function () {
    
    $("#navegacion").load("./compartidos/barranav.html");
    $("#futer").load("./compartidos/futer.html");
    $('select').formSelect(); //jala select
    $('input#input_text, textarea#textarea2').characterCounter(); // jala counter
    var alumno = { curp: 'Jose Angel', folio: 'Espinosa' };
    //activaciones
    //$('.datepicker').datepicker();
   
      // Initialize Firebase
      
      
      
    function uploadimage() {

        alert('Aqui te voy');
        
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
    

    $('#btn-imprimir').click(function () {
        alert('dalee');
        let url = "../back/hola.php?" + "curp=" + alumno.curp + "&" + "folio=" + alumno.folio;
        window.open(url, '_blank');
    })


    
});