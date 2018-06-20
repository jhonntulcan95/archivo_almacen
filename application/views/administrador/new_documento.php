<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body>
    <section class="ContentPage full-width">
        <div class="ContentPage-Nav full-width">
            <ul class="full-width">
                <li><figure><img src="<?php echo base_url();?>static/img/user.png" alt="UserImage"></figure></li>
                <li style="padding:0 5px;"><?php echo $this->session->nombre_usuario; ?></li>
                <li><a href="#" class="tooltipped waves-effect waves-light btn-ExitSystem" data-position="bottom" data-delay="50" data-tooltip="Salir del Sistema"><i class="zmdi zmdi-power"></i></a></li>
                <li><a href="<?php echo base_url();?>" class="tooltipped waves-effect waves-light btn-Regresar" data-position="bottom" data-delay="50" data-tooltip="Regresar"><i class="zmdi zmdi-home"></i></a></li>
                <li style="padding-right: 200px"><b>Panel de Administracion - Archivo Almacén - Agregar un nuevo Documento</b></li>
            </ul>   
        </div>
       	<form method="post" id="formulario_adicionar">
            <div class="row">
                <div id="container_formulario_adicionar" class="col s8">
                    <div class="row">
                        <div class="input-field col s4">
                            <i class="material-icons prefix">offline_pin</i>
                            <label for="txt_codigo">Codigo de Documento</label>
                            <input id="txt_codigo" type="text" class="validate" onkeypress="return isNumber(event)" value="<?php echo $last_codigo?>" disabled style="font-weight: bold; color: black;">
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">date_range</i>
                            <label for="txt_fecha">Fecha del Documento</label>
                            <input type="text" class="datepicker" id="txt_fecha" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <label for="txt_asunto">Asunto</label>
                            <input id="txt_asunto" type="text" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <label for="txt_destinatario">Destinatario</label>
                            <input id="txt_destinatario" type="text" class="validate" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">domain</i>
                            <label for="txt_cargo_destinatario">Cargo/Dependencia Destinatario</label>
                            <input id="txt_cargo_destinatario" type="text" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <label for="txt_remitente">Remitente</label>
                            <input id="txt_remitente" type="text" class="validate" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">domain</i>
                            <label for="txt_cargo_remitente">Cargo/Dependencia Remitente</label>
                            <input id="txt_cargo_remitente" type="text" class="validate" required>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">layers</i>
                            <label for="txt_numero_hojas">Numero de Hojas</label>
                            <input id="txt_numero_hojas" type="number" class="validate" min="0" onkeypress="return isNumber(event)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="button" class="waves-effect waves-light btn" onclick="adicionar_registro()" value="Agregar Documento"></input>
                        </div>
                        <div class="input-field col s6">
                            <button type="reset" class="waves-effect waves-light btn">Limpiar Formulario</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>