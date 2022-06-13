$(document).ready(function() {
            $("#navegacion").load("./compartidos/barranavadmin.html");
            $("#futer").load("./compartidos/futer.html");
            $("#contenido1").load("./compartidos/formol.html");

            //Activaciones
            $('select').formSelect(); //jala select
            $('input#input_text, textarea#textarea2').characterCounter(); // jala counter
            
            //$('.modal').modal();
            //$(".dropdown-trigger").dropdown();
            var alumnos;
            function jalaTodo(){
                let direc = "../back/traeTodo.php";
                $.ajax({
                    type: "GET",
                    url: direc,
                    success: function (data) {
                        let jsonData = $.parseJSON(data);
                        alumnos = jsonData;
                    }
                });
            }
            var contenedor = $('#alumnos');
            function construye(){
                let nuevaLista = "<ul class='collection' id='alumnos'> ";
                for (let index = 0; index < alumnos.length; index++) {
                    let nuevoAlumno = "";
                    nuevoAlumno += ("<div id='clave'>");
                    nuevoAlumno += ("<fieldset>");
                    nuevoAlumno += ("<li class='collection-item avatar' id='usr" + index + "'>");
                    nuevoAlumno += ("<div id='arreglo'>");
                    nuevoAlumno += ("<img src='"+alumnos[index].foto+"' alt='" + alumnos[index].folio + "' id='imagen-ipn-2'>");
                    nuevoAlumno += ("</div>");
                    nuevoAlumno += ("<div id='letras'>");
                    nuevoAlumno += ("    <span class='title'>" + alumnos[index].folio + "</span>");
                    nuevoAlumno += ("    <p class='parrafo'>" + alumnos[index].curp + " <br>");
                    nuevoAlumno += ("        " + alumnos[index].nombre + "");
                    nuevoAlumno += ("    </p>");
                    nuevoAlumno += ("</div>");
                    nuevoAlumno += ("    <a href='#!' class='secondary-content'><i class='material-icons'>grade</i></a>");
                    nuevoAlumno += ("    <div class='row' id='alumno" + index + "'>");
                    nuevoAlumno += ("        <a id='vermas' class='waves-effect waves-light btn ver-mas'>Ver mas</a>");
                    nuevoAlumno += ("        <a class='waves-effect waves-light btn ver-menos'>Ver menos</a>");
                    nuevoAlumno += ("        <a class='waves-effect waves-light btn editar'>Editar</a>");
                    nuevoAlumno += ("        <a class='waves-effect waves-light btn cancelar-edicion'>Cancelar edicion</a>");
                    nuevoAlumno += ("        <a class='waves-effect waves-light btn btn-reset'>Restablecer valores</a>");
                    nuevoAlumno += ("        <a class='waves-effect waves-light right btn red elimina'>Eliminar</a>");
                    nuevoAlumno += ("        <form id='formula" + index + "' action='../back/api.php' method='get'>");
                    nuevoAlumno += ("            <!-- Aqui se inserta solito -->");
                    nuevoAlumno += ("        </form>");
                    nuevoAlumno += ("    </div>");
                    nuevoAlumno += ("</li>");
                    nuevoAlumno += ("</fieldset>");
                    nuevoAlumno += ("</div>");
                    nuevoAlumno += ("</br>");
                    nuevaLista += nuevoAlumno;
                }
                nuevaLista += "</ul>";
                contenedor.replaceWith(nuevaLista);
                contenedor = $('#alumnos');
                
            }
            
            
            

            
            ///Generar a partir de la query al back
            
            ///Nested functions para controlar el dom
            function restableceValores(alumnRow, idx) {
                
                    
                     alumnRow.find('.cendi').val(alumnos[idx].cendi);
                     alumnRow.find('.foto').val(alumnos[idx].foto);
                     alumnRow.find('.folio').val(alumnos[idx].folio);
                     alumnRow.find('.grupo').val(alumnos[idx].grupo);
    
                    //Datos niño
                     alumnRow.find('.primer_apellido').val(alumnos[idx].primer_apellido);
                     alumnRow.find('.segundo_apellido').val(alumnos[idx].segundo_apellido);
                     alumnRow.find('.nombre').val(alumnos[idx].nombre);
                     alumnRow.find('.fecha').val(alumnos[idx].fecha);
                     alumnRow.find('.edadAnios').val(alumnos[idx].edadAnios);
                     alumnRow.find('.edadMeses').val(alumnos[idx].edadMeses);
                     alumnRow.find('.email').val(alumnos[idx].email);
                     alumnRow.find('.curp').val(alumnos[idx].curp);
    
                    //Datos de derechohabiente
                     alumnRow.find('.primer_apelido_derecho').val(alumnos[idx].primer_apelido_derecho);
                     alumnRow.find('.segundo_apellido_derecho').val(alumnos[idx].segundo_apellido_derecho);
                     alumnRow.find('.nombre_derecho').val(alumnos[idx].nombre_derecho);
                     alumnRow.find('.calle').val(alumnos[idx].calle);
                     alumnRow.find('.noExt').val(alumnos[idx].noExt);
                     alumnRow.find('.noInt').val(alumnos[idx].noInt);
                     alumnRow.find('.colonia').val(alumnos[idx].colonia);
                     alumnRow.find('.alcaldia').val(alumnos[idx].alcaldia);
                     alumnRow.find('.entidad').val(alumnos[idx].entidad);
                     alumnRow.find('.cp').val(alumnos[idx].cp);
                     alumnRow.find('.telefono_fijo').val(alumnos[idx].telefono_fijo);
                     alumnRow.find('.telefono_celular').val(alumnos[idx].telefono_celular);
                     alumnRow.find('.email_derecho').val(alumnos[idx].email_derecho);
                     alumnRow.find('.ocupacion').val(alumnos[idx].ocupacion);
                     alumnRow.find('.curp_derecho').val(alumnos[idx].curp_derecho);
                     alumnRow.find('.puesto').val(alumnos[idx].puesto);
                     alumnRow.find('.sueldo').val(alumnos[idx].sueldo);
                     alumnRow.find('.numero_empleado').val(alumnos[idx].numero_empleado);
                     alumnRow.find('.adscripcion').val(alumnos[idx].adscripcion);
                     alumnRow.find('.horario').val(alumnos[idx].horario);
                     alumnRow.find('.extension').val(alumnos[idx].extension);
  
                    //Datos del conyuge
                     alumnRow.find('.tienec').val(alumnos[idx].tienec);
                     alumnRow.find('.primer_apelido_conyuge').val(alumnos[idx].primer_apelido_conyuge);
                     alumnRow.find('.segundo_apellido_conyuge').val(alumnos[idx].segundo_apellido_conyuge);
                     alumnRow.find('.nombre_conyuge').val(alumnos[idx].nombre_conyuge);
                     alumnRow.find('.calle_conyuge').val(alumnos[idx].calle_conyuge);
                     alumnRow.find('.noExt_conyuge').val(alumnos[idx].noExt_conyuge);
                     alumnRow.find('.noInt_conyuge').val(alumnos[idx].noInt_conyuge);
                     alumnRow.find('.colonia_conyuge').val(alumnos[idx].colonia_conyuge);
                     alumnRow.find('.alcaldia_conyuge').val(alumnos[idx].alcaldia_conyuge);
                     alumnRow.find('.entidad_conyuge').val(alumnos[idx].entidad_conyuge);
                     alumnRow.find('.cp_conyuge').val(alumnos[idx].cp_conyuge);
                     alumnRow.find('.telefono_fijo_conyuge').val(alumnos[idx].telefono_fijo_conyuge);
                     alumnRow.find('.telefono_celular_conyuge').val(alumnos[idx].telefono_celular_conyuge);
                     alumnRow.find('.lugar_trabajo_conyuge').val(alumnos[idx].lugar_trabajo_conyuge);
                     alumnRow.find('.domicilio_trabajo_conyuge').val(alumnos[idx].domicilio_trabajo_conyuge);
                     alumnRow.find('.telefono_trabajo_conyuge').val(alumnos[idx].telefono_trabajo_conyuge);
                     alumnRow.find('.extension_conyuge').val(alumnos[idx].extension_conyuge);
                     alert('camara');
                
            }
            function activarForm(alumnRow, formID) {
                alumnRow.find(formID).find(':input:disabled').prop('disabled',false);
                alumnRow.find('.btn-enviar').show();
            }
            function bloquearForm(alumnRow, formID) {
                alumnRow.find(formID).find(':input:not(:disabled)').prop('disabled',true);
                alumnRow.find('.btn-enviar').hide();
            }
            function activarEdicion(alumnRow, formID) {
                alumnRow.find(".editar").hide();
                alumnRow.find(".cancelar-edicion").show();
                alumnRow.find(".btn-reset").show();
                activarForm(alumnRow, formID);
            }
            function cancelarEdicion(alumnRow, formID) {
                alumnRow.find(".editar").show();
                alumnRow.find(".cancelar-edicion").hide();
                alumnRow.find(".btn-reset").hide();
                bloquearForm(alumnRow, formID);
            }
            function verMas(alumnRow, formID) {
                alumnRow.find(formID).show();
                alumnRow.find(".ver-menos").show();
                alumnRow.find(".ver-mas").hide();
                cancelarEdicion(alumnRow, formID);
            }

            function verMenos(alumnRow, formID) {
                alumnRow.find(formID).hide();
                alumnRow.find(".ver-mas").show();
                alumnRow.find(".ver-menos").hide();
                alumnRow.find(".editar").hide();
                alumnRow.find(".cancelar-edicion").hide();
                alumnRow.find(".btn-reset").hide();
                bloquearForm(alumnRow, formID);
            }
            
            
            

            $('#actualizar').click(function() {
                jalaTodo();
                construye();
                
                $('#alumnos').ready(function() {
                    
                
                    for (let index = 0; index < alumnos.length; index++) {
                        const element = alumnos[index];
                        let formID = ("#formula" + index);
                        let alumnID = ("#alumno" + index);
    
                        $(formID).load("./compartidos/formRegistro.html").ready(function() {
                            $('select').formSelect(); 
                            M.updateTextFields();
                            let form = $(this);
                            ///
    
                            ///Enviar un fomrulario a actualizar
                            $(formID).submit(function(e) {
                                alert("Voy a subir");
                                e.preventDefault(); // avoid to execute the actual submit of the form.
    
                                let subitForm = $(this);
                                let actionUrl = subitForm.attr('action');
                                let alumno = {
                                    'curp': subitForm.find('.correo').val(),
                                    'nombre': subitForm.find('.contrasena').val()
                                };
                                alert("Tengo el yeison" + alumno + subitForm.find('.contrasena').val());
    
                                $.ajax({
                                    type: "POST",
                                    url: actionUrl,
                                    //data: form.serialize(), // serializes the form's elements.
                                    data: alumno,
                                    success: function(data) {
    
                                        alert("respondido");
                                        alert(data); // show response from the php script.
                                        let jsonData = $.parseJSON(data);
                                        subitForm.find('.correo').val("Enviado chido" + jsonData.curpo);
                                    }
                                });
    
                            });
                            $('select').formSelect(); 
    
                            ///Eliminar un elemento
                        });
                        $(alumnID).ready(function() {
                            M.updateTextFields();
                             
                            
                            let alumInicial = $(alumnID);
                            verMenos(alumInicial, formID);
                            restableceValores(alumInicial, index);
                            $(alumnID).find(".ver-mas").click(function() {
                                let alumRow = $(alumnID);
                                verMas(alumRow, formID);
                                restableceValores(alumRow, index);
                            });
                            $(alumnID).find(".ver-menos").click(function() {
                                let alumRow = $(alumnID);
                                verMenos(alumRow, formID);
                                restableceValores(alumRow, index);
                            });
                            $(alumnID).find(".editar").click(function() {
                                let alumRow = $(alumnID);
                                activarEdicion(alumRow, formID);
                                $('select').formSelect();
                            });
                            $(alumnID).find(".cancelar-edicion").click(function() {
                                let alumRow = $(alumnID);
                                cancelarEdicion(alumRow, formID);
                                restableceValores(alumRow, index);
                            });
                            $(alumnID).find(".btn-reset").click(function() {
                                let alumRow = $(this).closest(alumnID);
                                restableceValores(alumRow, index);
                                //$(this).closest(alumnID).find('.contrasena').val(alumnos[index].nombre);
    
                            });
                            $(alumnID).find('.elimina').click(function() {
                                $.ajax({
                                    type: "GET",
                                    url: '../back/api.php?ide=12345',
                                    success: function(response) {
                                        let jsonData = JSON.parse(response);
    
                                        // user is logged in successfully in the back-end
                                        // let's redirect
                                        if (jsonData.success == "1") {
                                            //location.href = 'inicio.html';
                                            alert(jsonData.arre[0]);
                                        } else {
                                            alert('Invalid Credentials!');
                                        }
                                    }
                                });
                            });
                             
                        });
                    }
                });
            });
            ///Colocar los controladores de los botones de cada formulario
            
        });