<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function login(){
		$xusuario = $this->input->post("user");
		$xpass = $this->input->post("password");
		$xpass = sha1($xpass);
		$this->db->where('codigo_usuario',$xusuario);
		$this->db->where('password_usuario',$xpass);
		$respuesta = $this->db->get('usuarios');
		if ($respuesta->num_rows()>0) {
		    $registro = $respuesta->row();
			$this->session->set_userdata('codigo_usuario',$registro->codigo_usuario);
			$this->session->set_userdata('nombre_usuario',$registro->nombre_usuario);
			$this->session->set_userdata('rol_usuario',$registro->rol_usuario);
			return 1;
		}
		else{
			return 0;
		}
	}

	function consultar_documentos(){
		$this->db->order_by("codigo", "desc");
		$res = $this->db->get('archivo');
		return $res->result_array();
	}

	function consultar_roles(){
		$res = $this->db->get('roles');
		return $res->result_array();
	}

	function ver_imagen(){
		$codigo_imagen = $this->input->post("xbuscar");
		$ruta = base_url() + 'static/documentos/' . $codigo . '.jpg';
		if(is_file($ruta)){
			$sql = "SELECT numero_hojas FROM archivo WHERE codigo = " .$codigo;
			foreach ($conn->query($sql) as $row) {
				$hojas = $row['numero_hojas'];
			}
	 		echo "<img id='foto_documento' src='" . $ruta . "'><br><hr><b style='padding-left: 100px'>Numero de Hojas: " . $hojas;
		}
		else {
		   echo '0';
		}	
	}

	function cambiar_password(){
		$datos = array(
				'password_usuario' => sha1($this->input->post('password_new')),
			);
		$this->db->where('codigo_usuario', $this->session->codigo_usuario);
		$this->db->where('password_usuario', sha1($this->input->post('password_old')));
		$respuesta = $this->db->get('usuarios');
		if ($respuesta->num_rows()>0) {
			$this->db->where('codigo_usuario', $this->session->codigo_usuario);
			$res = $this->db->update('usuarios', $datos); 
			if(!$res) return "0";
			else return "1";
		}
		else{
			return "0";
		}
	}

	function agregar_usuario(){
		$datos = array(
				'codigo_usuario' => $this->input->post('codigo_usuario'),
				'nombre_usuario' => $this->input->post('nombre_usuario'),
				'rol_usuario' => $this->input->post('rol_usuario'),
				'password_usuario' => sha1($this->input->post('password_usuario')),
			);
		$res = $this->db->insert('usuarios', $datos);
		if ($res) return 1;
		return 0;
	}

	function get_last_codigo(){
		$fecha = date('Y') . "-" . date('m') . "-" . date('d');
		$y = date('y');
		$m = date('m');
		$y_m_sis = $y . $m;		
		$this->db->order_by("codigo", "desc");
		$this->db->limit(1);
		$respuesta = $this->db->get('archivo');
		if ($respuesta->num_rows()>0){
			$arr = $respuesta->result_array();
			foreach ($arr as $key) {
				$codigo = $key['codigo'];
			}
			$y_m_bd = substr($codigo, 0, 4);
			if ($y_m_bd == $y_m_sis) {
				$codigo = $codigo + 1;
			}
			return $y . $m . "001";
		}
		else{
			return $y . $m . "001";
		}
	}

	function salir(){
		$this->session->unset_userdata('codigo_usuario');
		$this->session->unset_userdata('nombre_usuario');
		$this->session->unset_userdata('rol_usuario');
	}
}
?>