$(document).ready(function(){
    
    $("#back-top").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('#back-top').fadeIn();
                $('#back-top').addClass("show");
            } else {
                $('#back-top').fadeIn();
                $('#back-top').removeClass("show");
            }
        });
        // scroll body to 0px on click
        $('#back-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    if (document.getElementById("barra_busqueda")){
            document.getElementById("barra_busqueda").addEventListener("keypress", function(evt){
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if ( charCode ==39 || charCode==34) {
                    }
                else{
                    var busqueda = $("#barra_busqueda").val() + evt.key;
                    $.ajax({
                            url: "procesar_busqueda.php", // aqui debemos cambiar por una funcion en el controlador
                            type: "post",
                            data: {xbusqueda: busqueda},
                            beforeSend: function () {
                                document.getElementById("div_table_registros").innerHTML = "Espere un Momento Por favor...";
                            },
                            success: function (datos) {
                                document.getElementById("div_table_registros").innerHTML = datos;
                            },
                            error: function (err) {
                                alert(err);
                            }
                    });
        
                }
            });
        }
    $('select').material_select();
    $('.btn-ExitSystem').on('click', function(e){
        e.preventDefault();
        swal({ 
            title: "¿Quieres Salir del Sistema?",   
            text: "La Sesion que actualmente está funcionando será cerrada por completo",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si",
            animation: "slide-from-top",   
            closeOnConfirm: false,
            cancelButtonText: "Cancelar"
        }, function(){   
            location.href=$("#url").val() + "inicio/salir";
        });
    });

    $('.btn-Recargar').on('click', function(e){
        var update = "<script type='text/javascript'>$('#table_archivo').load('tabla.php');</script>";
        $("#table_archivo").html(update);
        $("#barra_busqueda").val("");
    }); 

 $('.datepicker').pickadate({
    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Cerrar',
    format: 'yy-mm-dd',
    max: true,
    selectMonths: true, 
    selectYears: true, 
    closeOnSelect: false
    });
 //format: 'dd/mm/yyyy'
});
function adicionar_usuario(){
    var codigo_usuario = $('#txt_cedula').val();
    var nombre_usuario = $('#txt_nombre').val();
    var rol_usuario = $('#txt_rol').val();
    var password_usuario = "Alma2017";
    var nombre_rol = "Administrador";
    if (rol_usuario == '20') nombre_rol="Funcionario Almacen";
    if (codigo_usuario=="" || nombre_usuario=="" || rol_usuario=="" || password_usuario=="") {
        swal({
            title:"Debe digitar todos los Campos",
            type: "error",
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ok",
            animation: "slide-from-top"  
            });
        return false;
    }
    swal({ 
            title: "¿Estas Seguro de Querer Agregar el Usuario?",   
            text: "Cedula: " + codigo_usuario + "\n" + "Nombre: " + nombre_usuario + "\n" + 
            "Rol de Usuario: " + nombre_rol,
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Agregar",
            animation: "slide-from-top",   
            closeOnConfirm: false,
            cancelButtonText: "Regresar"
        }, function(){
            $.ajax({
                        url: $("#url").val() + "administrador/procesar_agregar_usuario",
                        type: "post",
                        data: {codigo_usuario:codigo_usuario, nombre_usuario:nombre_usuario, 
                            rol_usuario:rol_usuario, password_usuario:password_usuario},
                        beforeSend: function () {
                        },
                        success: function (datos) {
                            if (datos=='1') {
                                swal({
                                    title: "Usuario Agregado con Éxito",
                                    type: "success"
                                },function(){
                                    location.href=$("#url").val() + "inicio/home";
                                });
                            }
                            else{
                                swal({
                                    title: "El usuario no se pudo agregar",
                                    type: "error"
                                });
                            }
                        },
                        error: function (err) {
                            swal({
                                    title: "El usuario no se pudo agregar",
                                    type: "error"
                                });
                        }
                });

        });
}

function cambiar_password(){
    var password_old = $('#txt_password1').val();
    var password_new = $('#txt_password2').val();
    if (password_old == "" || password_new== "") {
        swal({
            title: "Los dos campos son obligatorios",
            type: "error"
        });
        return false;
    }
    swal({
        title: "Confirmar el Cambio",
        type: "warning",
        showCancelButton: true,   
        confirmButtonText: "Confirmar",
        closeOnConfirm: false,
        cancelButtonText: "Cancelar"
    },function(){
        $.ajax({
            url: $("#url").val() + "administrador/procesar_cambiar_password",
            type: "post",
            data: {password_old:password_old, password_new:password_new},
            success: function (datos) {
                if (datos == '1') {
                    swal({
                    title: "Cambio de Contraseña Exitoso",
                    type: "success"
                },function(){
                    location.href= $("#url").val();
                });
                }
                else{
                    swal({
                    title: "Error en el cambio de Contraseña",
                    type: "error"
                });
                }
            },
            error: function (err) {
                swal({
                    title: "Error en el cambio de Contraseña",
                    type: "error"
                });
            }
        });
    });
}

function adicionar_registro(){
    var codigo = $('#txt_codigo').val();
    var fecha = $('#txt_fecha').val();
    var asunto = $('#txt_asunto').val();
    var destinatario = $('#txt_destinatario').val();
    var cargo_destinatario = $('#txt_cargo_destinatario').val();
    var remitente = $('#txt_remitente').val();
    var cargo_remitente = $('#txt_cargo_remitente').val();
    var numero_hojas = $('#txt_numero_hojas').val();
    if (codigo=="" || fecha=="" || asunto=="") {
        swal({
            title:"Debe digitar los campos obligatorios",
            text: "(codigo,fecha,asunto)",
            type: "error",
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ok",
            animation: "slide-from-top"  
            });
        return false;
    }
    swal({ 
            title: "¿Estas Seguro de Querer Agregar el Registro?",   
            text: "Codigo: " + codigo + "\n" + "Fecha: " + fecha + "\n" + 
            "Asunto: " + asunto + "\n" + "Destinatario: " + destinatario + "\n" + 
            "Cargo Destinatario: " + cargo_destinatario + "\n" + 
            "Remitente: " + remitente + "\n" + "Cargo Remitente: " + cargo_remitente,
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Agregar",
            animation: "slide-from-top",   
            closeOnConfirm: false,
            cancelButtonText: "Regresar"
        }, function(){
            $.ajax({
                        url: "procesar_adicionar.php",
                        type: "post",
                        data: {codigo:codigo, fecha:fecha, asunto:asunto, 
                            destinatario:destinatario, 
                            cargo_destinatario:cargo_destinatario,
                            remitente:remitente, 
                            cargo_remitente:cargo_remitente,
                            numero_hojas:numero_hojas},
                        beforeSend: function () {
                        },
                        success: function (datos) {
                            if (datos==1) {
                                swal({
                                    title: "El Registro ha sido Agregado con éxito",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    location.href='home.php';
                                });
                            }
                            else{
                                  swal({
                                    title: "El Registro no ha podido ser Agregado",
                                    type: "error",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    location.href='home.php';
                                });   
                            } 
                            },
                        error: function (err) {
                            swal({
                                    title: "El Registro no ha podido ser Agregado",
                                    type: "error",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    location.href= $("#url").val();
                                });
                        }
                    });
            
        });
}

function isWord(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode <65 || (charCode>90 && charCode<97) || charCode>122){
        return false;
    }
};

function isNumber(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ( charCode >=48 && charCode<=57) {
        return true;
    }
    else{
        return false;
    }
};

function isEnter(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ( charCode == 13) {
        btn_login();
    }
};

function ver_imagen(codigo){
            $.ajax({
                        url: $("#url").val() + "administrador/ver_imagen",
                        type: "post",
                        data: {xbuscar: codigo},
                        beforeSend: function () {
                        },
                        success: function (datos) {
                            if (datos=='0') {
                                swal({
                                    title: "El Registro no tiene almacenada una fotografia",
                                    type: "error",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                });
                            }
                            else{
                                $('#table_archivo').html(
                                    "<br><a href='home.php' style='padding-left: 600px'><input type='button' class='waves-effect waves-light btn' value='Regresar'></input></a>"
                                    );
                                $('#table_archivo').append(datos);
                                $('#table_archivo').append(
                                    "<a href='home.php' style='padding-left: 600px'><input type='button' class='waves-effect waves-light btn' value='Regresar'></input></a>"
                                    );

                            }
                        },
                        error: function (err) {
                            alert(err);
                        }
                    });
};

function eliminar_documento(codigo){
            swal({
                title: "Desea Borrar el Documento " + codigo,
                type: "error",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "SI"
            },
            function() {
                $.ajax({
                    url: "eliminar_registro.php",
                    type: "post",
                    data: {codigo: codigo},
                    beforeSend: function () {},
                    success: function(datos) {
                        if (datos==1) {
                            swal({
                                title: "El Registro fue eliminado",
                                type: "success"
                                });
                        }
                        else{
                            swal({
                                title: "El Registro NO fue eliminado",
                                type: "error"
                                });
                        }
                        window.location='home.php';
                    },
                    error: function(err) {
                        alert(err);
                    }
                });
            });
}

function actualizar_documento(){
    var codigo = $('#txt_codigo').val();
    var fecha = $('#txt_fecha').val();
    var asunto = $('#txt_asunto').val();
    var destinatario = $('#txt_destinatario').val();
    var cargo_destinatario = $('#txt_cargo_destinatario').val();
    var remitente = $('#txt_remitente').val();
    var cargo_remitente = $('#txt_cargo_remitente').val();
    var numero_hojas = $('#txt_numero_hojas').val();
    if (codigo=="" || fecha=="" || asunto=="") {
        swal({
            title:"Debe digitar los campos obligatorios",
            text: "(codigo,fecha,asunto)",
            type: "error",
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ok",
            animation: "slide-from-top"  
            });
        return false;
    }
    swal({ 
            title: "¿Estas Seguro de Querer Actualizar el Registro?",   
            text: "Codigo: " + codigo + "\n" + "Fecha: " + fecha + "\n" + 
            "Asunto: " + asunto + "\n" + "Destinatario: " + destinatario + "\n" + 
            "Cargo Destinatario: " + cargo_destinatario + "\n" + 
            "Remitente: " + remitente + "\n" + "Cargo Remitente: " + cargo_remitente,
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Actualizar",
            animation: "slide-from-top",   
            closeOnConfirm: false,
            cancelButtonText: "Regresar"
        }, function(){
            $.ajax({
                        url: "procesar_actualizar.php",
                        type: "post",
                        data: {codigo:codigo, fecha:fecha, asunto:asunto, 
                            destinatario:destinatario, 
                            cargo_destinatario:cargo_destinatario,
                            remitente:remitente, 
                            cargo_remitente:cargo_remitente,
                            numero_hojas:numero_hojas},
                        beforeSend: function () {
                        },
                        success: function (datos) {
                            if (datos==1) {
                                swal({
                                    title: "El Registro ha sido Actualizado con éxito",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    location.href='home.php';
                                });
                            }
                            else{
                                  swal({
                                    title: "El Registro no ha podido ser Actualizado",
                                    type: "error",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    location.href='home.php';
                                });   
                            } 
                            },
                        error: function (err) {
                            swal({
                                    title: "El Registro no ha podido ser Actualizado",
                                    type: "error",
                                    showCancelButton: false,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    location.href='home.php';
                                });
                        }
                    });
            
        });
}

function busqueda_avanzada(){
    var codigo = $('#txt_codigo').val();
    var fecha = $('#txt_fecha').val();
    var asunto = $('#txt_asunto').val();
    var destinatario = $('#txt_destinatario').val();
    var cargo_destinatario = $('#txt_cargo_destinatario').val();
    var remitente = $('#txt_remitente').val();
    var cargo_remitente = $('#txt_cargo_remitente').val();
    $.ajax({
        url: "procesar_busqueda_avanzada.php",
        type: "post",
        data: {codigo:codigo, fecha:fecha, asunto:asunto, 
                destinatario:destinatario, 
                cargo_destinatario:cargo_destinatario,
                remitente:remitente, 
                cargo_remitente:cargo_remitente},
        beforeSend: function () {
            document.getElementById("div_table_registros").innerHTML = "Espere un Momento Por favor...";
        },
        success: function (datos) {
            $("#formulario_buscar").remove();
            document.getElementById("div_table_registros").innerHTML = datos;
        },
        error: function (err) {
            alert(err);
        }
    });
}

function busqueda_fechas(){
    var fecha1 = $('#txt_fecha1').val();
    var fecha2 = $('#txt_fecha2').val();
    $.ajax({
        url: "procesar_busqueda_fechas.php",
        type: "post",
        data: {fecha1: fecha1, fecha2:fecha2},
        beforeSend: function () {
            document.getElementById("div_table_registros").innerHTML = "Espere un Momento Por favor...";
        },
        success: function (datos) {
            $("#formulario_buscar").remove();
            document.getElementById("div_table_registros").innerHTML = datos;
        },
        error: function (err) {
            alert(err);
        }
    });
}

function btn_regresar_tabla(){
    var temp = "<script type='text/javascript'>$('#table_archivo').load('tabla.php')</script>";
    $('#table_archivo').html(temp);
}