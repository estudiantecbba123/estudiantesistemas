<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	
	public function index()
	{
        if($this->session->userdata('login'))
           { 
        	//el usuario ya esta logueado
        	//redirect('productos/index','refresh');
          redirect('usuarios/panel','refresh');         	
           } 
           else
           { 
        	//usuario no esta logueado
        	$this->load->view('inc/header');
		      $this->load->view('login');
		      $this->load->view('inc/footer');

           }				
	}

  

  public function validar()
    {
      $login=$_POST['login'];
      /*$password=md5($_POST['password']);*/
      $password=$_POST['password'];

      $consulta=$this->usuario_model->validar($login,$password);

        if($consulta->num_rows()>0)
        {
          foreach ($consulta->result() as $row) 
          {
              $this->session->set_userdata('idusuario',$row->idUsuario);
              $this->session->set_userdata('nombres',$row->nombres);
              $this->session->set_userdata('login',$row->login);
              $this->session->set_userdata('tipo',$row->tipo);
              redirect('usuarios/panel','refresh'); 
          }

        }
        else
        {
              redirect('usuarios/index','refresh');
        }
    }

        public function panel()
        {
        
                if($this->session->userdata('login'))
                {
                  if($this->session->userdata('tipo')=='Admin')
                  {                    
                    redirect('usuarios/menuadm','refresh');
                  }
                  else
                  {
                    if($this->session->userdata('tipo')=='Guest'){
                    //redirect('cliente/guest','refresh');
                    redirect('usuarios/menuguest','refresh');
                    }
                  }                                                                          
                }
                else
                {
                        redirect('usuarios/index','refresh');
                }

        }

  public function logout()
  {
        $this->session->sess_destroy();
        redirect('usuarios/index','refresh');
  }

  public function menuadm()
  {
     $this->load->view('inc/encabezado1');
     $this->load->view('panelmenuadm');
     $this->load->view('inc/pie1');   
  }

   public function menuguest()
  {
     $this->load->view('inc/encabezado');
     $this->load->view('panelmenuguest');     
     $this->load->view('inc/pie'); 
  }

	/*public function prueba()
	{
        $query = $this->db->get('cliente');
        $execonsulta=$query->result();
        print_r($execonsulta);
	}*/
}
