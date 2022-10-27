<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crearUsuario extends CI_Controller {

	
	public function index()
	{
		$listacrearusuario=$this->crearusuario_model->listausuarios();
		$data['usuarios']=$listacrearusuario;


		$this->load->view('inc/header');
		$this->load->view('listacrearusuario',$data);
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
		$this->load->view('formulariocrearusuario');
		$this->load->view('inc/footer');		
	}

	public function agregarbd()
	{
		$data['login']=$_POST['login'];
		$data['password']=$_POST['password'];
		$data['tipo']=$_POST['tipo'];
        $data['nombres']=$_POST['nombres'];        
        $data['primerApellido']=$_POST['primerApellido'];        
        $data['segundoApellido']=$_POST['segundoApellido'];
        $data['edad']=$_POST['edad'];        
               
        


		$lista=$this->crearusuario_model->agregarusuario($data);
		/*redirect('crearUsuario/index','refresh');¨*/
		redirect('usuarios/validar','refresh');
	
	}	

	

}
