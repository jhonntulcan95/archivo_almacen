function btn_login(){
    var user = $("#user").val();
    var password = $("#password").val();
    $.ajax({
      type: "POST",
      url: $("#url").val() + "inicio/login",
      data: {"user":user,"password":password},
      beforeSend: function () {},
      success: function(respuesta){
        if(respuesta==1){
          location.href=$("#url").val() + "inicio/home";
        }
        else{
          swal({   title: "Lo Sentimos!",   text: "Nombre de usuario o cotraseña no validos",   type: "error",   confirmButtonText: "Cerrar" });
        }
        }
    });
};