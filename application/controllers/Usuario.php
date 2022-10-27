<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	
	public function index()
	{
		$lista=$this->cliente_model->listaclientes();
		$data['cliente']=$lista;


		$this->load->view('inc/header');
		$this->load->view('lista',$data);
		$this->load->view('inc/footer');		
	}

	public function guest()
	{
		$this->load->view('inc/header');
		$this->load->view('panelguest');
		$this->load->view('inc/footer');		
	}

	public function agregar()
	{
		
		$this->load->view('inc/header');
		$this->load->view('formulario');
		$this->load->view('inc/footer');		
	}

	public function agregarbd()
	{
        $data['nombres']=$_POST['nombres'];        
        $data['apellidoPaterno']=$_POST['apellidoPaterno'];        
        $data['apellidoMaterno']=$_POST['apellidoMaterno'];        
               
        


		$lista=$this->cliente_model->agregarcliente($data);
		redirect('cliente/index','refresh');
	
	}

	public function eliminarbd()
	{
		$idcliente=$_POST['idcliente'];
		$this->cliente_model->eliminarcliente($idcliente);
		redirect('cliente/index','refresh');

	}

	public function modificar()
	{
		$idcliente=$_POST['idcliente'];
		$data['infocliente']=$this->cliente_model->recuperarcliente($idcliente);
		$this->load->view('inc/header');
		$this->load->view('formulariomodificar',$data);
		$this->load->view('inc/footer');
	}

	public function modificarbd()
	{
		$idcliente=$_POST['idcliente'];

		$data['nombres']=$_POST['nombres'];        
        $data['apellidoPaterno']=$_POST['apellidoPaterno'];        
        $data['apellidoMaterno']=$_POST['apellidoMaterno'];        
        

        $this->cliente_model->modificarcliente($idcliente,$data);
        redirect('cliente/index','refresh');

	}

}
