<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	
	public function listaclientes()
	{
		$this->db->select('*');
		$this->db->from('cliente');
		return $this->db->get();		
	}

	public function agregarcliente($data)
	{
		$this->db->insert('cliente',$data);		
	}

	public function eliminarcliente($idcliente)
	{
		$this->db->where('idcliente',$idcliente);
		$this->db->delete('cliente');
	}


	public function recuperarcliente($idcliente)
	{
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('idcliente',$idcliente);
		return $this->db->get();
	}


	public function modificarcliente($idcliente,$data)
	{
		$this->db->where('idcliente',$idcliente);
		$this->db->update('cliente',$data);
	}

}
