<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body>
    <section class="ContentPage full-width">
        <div class="ContentPage-Nav full-width">
            <ul class="full-width">
                <li><figure><img src="<?php echo base_url();?>static/img/user.png" alt="UserImage"></figure></li>
                <!--Nombre de Usuario-->
                <li style="padding:0 5px;"><?php echo $this->session->nombre_usuario; ?></li>
                <!--Salir del Sistema-->
                <li><a href="#" title="Salir del Sistema" class="waves-effect waves-light btn-ExitSystem"><i class="zmdi zmdi-power"></i></a></li>
                <!--Ir al Inicio-->
                <li><a href="<?php echo base_url();?>" class="tooltipped waves-effect waves-light btn-Regresar" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="zmdi zmdi-home"></i></a></li>
                <!--Texto-->
                <li style="padding-right: 200px"><b>Panel de Administracion - Archivo Almacén - Cambio de Contraseña</b></li>
            </ul>   
        </div>
       	<form method="post" id="formulario_adicionar">
            <div class="row">
                <div id="container_formulario_cambiar" class="col s8">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">vpn_key</i>
                            <label for="txt_password1">Antigua Contraseña</label>
                            <input id="txt_password1" type="password" class="validate"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">vpn_key</i>
                            <label for="txt_password2">Nueva Contraseña</label>
                            <input id="txt_password2" type="password" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="button" class="waves-effect waves-light btn" onclick="cambiar_password()" value="Cambiar Contraseña"></input>
                        </div>
                    </div>
                </div>
            </div>
        </form>