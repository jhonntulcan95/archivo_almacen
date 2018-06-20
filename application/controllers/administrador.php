<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function modificar_registro($codigo_documento){

	}

	public function ver_imagen(){
		if ($this->session->codigo_usuario)
		$this->load->model('administracion');
		
	}

	public function cambiar_password(){
		if ((!$this->session->codigo_usuario) || ($this->session->rol_usuario==30)){
			alert("No se le permite ingresar a esta pagina");
			redirect(base_url());
		}
		$this->load->view('head');
		$this->load->view('password');
		$this->load->view('foot');
	}

	public function procesar_cambiar_password(){
		$this->load->model('administracion');
		$res['respuesta'] = $this->administracion->cambiar_password();
		echo $res['respuesta'];
	}

	public function agregar_usuario(){
		if ((!$this->session->codigo_usuario) || ($this->session->rol_usuario!=10)){
			alert("No se le permite ingresar a esta pagina");
			redirect(base_url());
		}
		$this->load->model('administracion');
		$arr['roles'] = $this->administracion->consultar_roles();
		$this->load->view('head');
		$this->load->view('administrador/new_usuario', $arr);
		$this->load->view('foot');
	}

	public function procesar_agregar_usuario(){
		if ((!$this->session->codigo_usuario) || ($this->session->rol_usuario!=10)){
			alert("No se le permite ingresar a esta pagina");
			redirect(base_url());	
		}
		$this->load->model('administracion');
		$res['respuesta'] = $this->administracion->agregar_usuario();
		echo $res['respuesta'];
	}

	public function nuevo_documento(){
		if ((!$this->session->codigo_usuario) || ($this->session->rol_usuario!=10)){
			alert("No se le permite ingresar a esta pagina");
			redirect(base_url());	
		}
		$this->load->model('administracion');
		$arr['last_codigo'] = $this->administracion->get_last_codigo();
		$this->load->view('head');
		$arr['llave']=$this->session->codigo_usuario;
		$arr['error']="";
		$this->load->view('administrador/new_documento',$arr);
		$this->load->view('foot');
	}

	public function agregar_nuevo_documento() {
		

	}
	
}
?>
