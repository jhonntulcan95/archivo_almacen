<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Sistema de Gestion de Archivo</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/style.css">
    <script src="<?php echo base_url(); ?>static/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>static/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>static/js/login.js"></script>
</head>
<input type="hidden" id="url" value="<?php echo base_url(); ?>">
<body class="font-cover" id="login">
    <div class="container-login center-align">
        <div style="margin:15px 0;">
            <img class="udenar_logo" src="<?php echo base_url();?>static/img/udenar_logo.png">
            <p>Sistema de Gestion de Archivo<br>
            Almacen y Suministros</p>
            <p>Inicia sesión con tu cuenta</p>   
        </div>
        <form method="post" id="form_login">
            <div class="input-field">
                <input id="user" name="user" type="text" class="validate">
                <label for="user"><i class="zmdi zmdi-account"></i>&nbsp; Codigo de Usuario</label>
            </div>
            <div class="input-field col s12">
                <input id="password" name="password" type="password" class="validate" onkeypress="return isEnter(event)">
                <label for="password"><i class="zmdi zmdi-lock"></i>&nbsp; Contraseña</label>
            </div>
                <input type="button" class="waves-effect waves-light btn" value="Ingresar" onclick="btn_login();"></input>
        </form>
        <div class="divider" style="margin: 20px 0;"></div>
        <form method="post" id="form_invitado" action="<?php echo base_url();?>inicio/login_invitado">
        	<button type="submit" class="waves-effect waves-light btn" style="background-color: #d4e157; color: #01579b ">Entrar Como Invitado</button>
        </form>
    </div>
</body>
</html>