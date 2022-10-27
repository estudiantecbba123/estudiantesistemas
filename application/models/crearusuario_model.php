<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crearUsuario_model extends CI_Model {

	
	public function listausuarios()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		return $this->db->get();		
	}

	public function agregarusuario($data)
	{
		$this->db->insert('usuarios',$data);		
	}		

}
