<body>
	<section class="ContentPage full-width">
        <div class="ContentPage-Nav full-width">
            <ul class="full-width">
                <li><figure><img src="<?php echo base_url();?>static/img/user.png" alt="UserImage"></figure></li>
                <!--Nombre de Usuario-->
                <li style="padding:0 5px;"><?php echo $this->session->nombre_usuario; ?></li>
                <!--Salir del Sistema-->
                <li><a href="#" title="Salir del Sistema" class="waves-effect waves-light btn-ExitSystem"><i class="zmdi zmdi-power"></i></a></li>
                <!--Cambiar Password-->
                <li><a href="<?php echo base_url();?>administrador/cambiar_password" title="Cambiar Password" class="waves-effect waves-light btn-Search" ><i class="zmdi zmdi-key"></i></a></li>
                <!--Agregar Usuario-->
                <li><a href="<?php echo base_url();?>administrador/agregar_usuario" title="Agregar Usuario" class="waves-effect waves-light btn-Search"><i class="zmdi zmdi-account-add"></i></a></li>
                <!--Agregar Registro-->
                <li><a href="<?php echo base_url();?>administrador/nuevo_documento" title="Agregar Documento" class="waves-effect waves-light btn-AgregarRegistro"><i class="zmdi zmdi-file-plus"></i></a></li>
                <!--Boton Indicador de Papel-->
                <li><a href="#" title="Indicador de Papel Enviado" class="waves-effect waves-light btn-Indicador"><i class="zmdi zmdi-info-outline"></i></a></li>
                <!--Buscar por Fechas-->
                <li><a href="busqueda_fechas.php" title="Filtrar por Fechas" class="waves-effect waves-light"><i class="zmdi zmdi-calendar-alt"></i></a></li>
                <!--Busqueda Avanzada-->
                <li><a href="busqueda_avanzada.php" title="Busqueda Avanzada" class="waves-effect waves-light btn-Search"><i class="zmdi zmdi-search"></i></a></li>
                <!--Barra de Busqueda-->
                <li><input placeholder="Ingrese una Palabra Clave" id="barra_busqueda" type="text" style="width: 250px" onkeypress="return isWord(event)"></li>
                <!--Boton Recargar-->
                <li><a title="Recargar Tabla" class="waves-effect waves-light btn-Recargar" data-position="bottom" data-delay="50" data-tooltip="Recargar Tabla"><i class="zmdi zmdi-refresh-alt"></i></a></li>
                <!--Texto-->
                <li><b>Panel de Administracion - Archivo</b></li>
            </ul>   
        </div>