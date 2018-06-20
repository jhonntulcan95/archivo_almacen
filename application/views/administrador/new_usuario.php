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
                <li style="padding-right: 200px"><b>Panel de Administracion - Archivo Almacén - Adicionar Usuario</b></li>
            </ul>   
        </div>
       	<form method="post" id="formulario_adicionar">
            <div class="row">
                <div id="container_formulario_adicionar" class="col s8">
                    <div class="row">
                        <div class="input-field col s4">
                            <i class="material-icons prefix">account_box</i>
                            <label for="txt_cedula">Cedula</label>
                            <input id="txt_cedula" type="text" class="validate" onkeypress="return isNumber(event)" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <label for="txt_nombre">Nombre de Usuario</label>
                            <input id="txt_nombre" type="text" class="validate" onkeypress="return isWord(event)" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select id="txt_rol">
                              <option value="" disabled selected>Escoje un Rol para el Usuario</option>
                              <?php
                                    foreach ($roles as $key) {
                                        ?>
                                        <option value="<?php echo $key['id_rol']?>"><?php echo $key['nombre_rol']?></option>
                                        <?php
                                    }
                              ?>
                            </select>
                            <label>Rol del Usuario</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">vpn_key</i>
                            <label for="txt_password">Contraseña</label>
                            <input id="txt_password" type="text" class="validate" value="Contraseña Asignada Automaticamente" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="button" class="waves-effect waves-light btn" onclick="adicionar_usuario()" value="Agregar Usuario"></input>
                        </div>
                        <div class="input-field col s6">
                            <button type="reset" class="waves-effect waves-light btn">Limpiar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>