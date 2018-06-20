<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		if ($this->session->codigo_usuario) redirect(base_url() . 'inicio/home');
		$this->load->view('inicio');
	}

	public function login(){
		if ($this->session->codigo_usuario) redirect(base_url() . 'inicio/home');
		$this->load->model('administracion');
		$resultado['respuesta'] = $this->administracion->login();
		echo $resultado['respuesta'];
	}

	public function login_invitado(){
		if ($this->session->codigo_usuario) redirect(base_url() . 'inicio/home');
		$this->load->model('administracion');
	}

	public function home(){
		if (!$this->session->codigo_usuario){
			redirect(base_url());
		}
		$this->load->model('administracion');
		$arr['documentos'] = $this->administracion->consultar_documentos();
		$this->load->view('head');
		if ($this->session->rol_usuario == 10) {
			$this->load->view('administrador/menu');
			$this->load->view('administrador/body', $arr);
		}
		elseif ($this->session->rol_usuario == 20) {
			$this->load->view('funcionario/menu');
			$this->load->view('funcionario/body', $arr);	
		}
		elseif ($this->session->rol_usuario == 30) {
			$this->load->view('invitado/menu');
			$this->load->view('invitado/body', $arr);	
		}
		$this->load->view('foot');
	}

	public function salir(){
		$this->load->model('administracion');
		$this->administracion->salir();
		redirect(base_url());
	}
}
