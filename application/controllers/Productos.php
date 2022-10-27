<?php
class Productos extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("ProductoModel");
        $this->load->library('session');
    }

    public function agregar(){
        $this->load->view("inc/encabezado1");
        $this->load->view("agregarProducto");
        $this->load->view("inc/pie1");
    }

    public function guardarCambios(){
        $resultado = $this->ProductoModel->guardarCambios(
            $this->input->post("id"),
            $this->input->post("nombre"),
            $this->input->post("descripcion"),
            $this->input->post("precioVenta"),
            $this->input->post("precioCompra"),
            $this->input->post("stock")
        );
        if($resultado){
            $mensaje = "Producto actualizado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al actualizar el producto";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("productos/");
    }

    public function editar($id){
        $producto = $this->ProductoModel->uno($id);
        if(null === $producto){
            $this->session->set_flashdata(array(
                "mensaje" => "El producto que quieres editar no existe",
                "clase" => "danger",
            ));
            redirect("productos/");
        }
        $this->load->view("inc/encabezado");
        $this->load->view("productos/editar", array("producto" => $producto));
        $this->load->view("inc/pie");
    }

    public function eliminar($id){
        $resultado = $this->ProductoModel->eliminar($id);
        if($resultado){
            $mensaje = "Producto eliminado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al eliminar el producto";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("productos/");
    }

    public function index(){

        $listaproductos=$this->ProductoModel->todos();
        $data['productos']=$listaproductos;


        $this->load->view('inc/encabezado');
        $this->load->view('listar1',$data);
        $this->load->view('inc/pie');
        
        //$this->load->view("inc/encabezado");
        //$this->load->view("productos/listar", array(
         //   "productos" => $this->ProductoModel->todos()
        //));
        //$this->load->view("inc/pie");
    }

    public function index1(){

        $listaproductos=$this->ProductoModel->todos();
        $data['productos']=$listaproductos;


        $this->load->view('inc/encabezado1');
        $this->load->view('listar',$data);
        $this->load->view('inc/pie1');
        
        //$this->load->view("inc/encabezado");
        //$this->load->view("productos/listar", array(
         //   "productos" => $this->ProductoModel->todos()
        //));
        //$this->load->view("inc/pie");
    }

   

    // public function modificar()
    //{
    //    $id=$_POST['id'];
    //    $data['infoproducto']=$this->ProductoModel->uno($id);
    //    $this->load->view('inc/encabezado');
    //    $this->load->view('editar',$data);
    //    $this->load->view('inc/pie');
    //}

    public function modificar()
    {
        $idproducto=$_POST['id'];
        $data['infoproducto']=$this->ProductoModel->recuperarproducto($idproducto);
        $this->load->view('inc/encabezado1');
        $this->load->view('formulariomodificarproducto',$data);
        $this->load->view('inc/pie1');
    }


    public function modificarbd()
    {
        $idproducto=$_POST['id'];
        $data['nombre']=$_POST['nombre'];        
        //$data['precio']=$_POST['precio'];        
        $data['stock']=$_POST['stock'];        
        
        $nombrearchivo=$idproducto.".png";

        $config['upload_path']='./uploads/';
        $config['file_name']=$nombrearchivo;
        $direccion="./uploads/".$nombrearchivo;
        if(file_exists($direccion))
        {
           unlink($direccion);    
        }
        

        $config['allowed_types']='png';
        $this->load->library('upload',$config);


        if(!$this->upload->do_upload())
        {
           $data['error']=$this->upload->display_errors();
        }else{
           $data['imagen']=$nombrearchivo;
        }

        $this->ProductoModel->modificarproducto($idproducto,$data);
        $this->upload->data();
        redirect('productos/index1','refresh');

    }



   

    public function guardar(){
        $resultado = $this->ProductoModel->nuevo(
                $this->input->post("nombre"),
                $this->input->post("descripcion"),
                $this->input->post("precioVenta"),
                $this->input->post("precioCompra"),
                $this->input->post("stock")
            );
        if($resultado){
            $mensaje = "Producto guardado correctamente";
            $clase = "success";
        }else{
            $mensaje = "Error al guardar el producto";
            $clase = "danger";
        }
        $this->session->set_flashdata(array(
            "mensaje" => $mensaje,
            "clase" => $clase,
        ));
        redirect("agregarProducto");
    }

    public function buscar(){
      if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
       $keywords = $_POST['keywords'];
       $resultado = $this->ProductoModel->buscar($keywords);
       if($resultado){
         echo '<h2>Se han encontrado '.count($resultado).' resultados.</h2>';
         echo '<ul>';
         $conteo = count($resultado);
         for($indice = 0; $indice < $conteo; $indice++){
            $nombre=$resultado[$indice]->nombre;
            return $nombre;
        }
            
         /*while ($row_searched = mysql_fetch_array($query_searched)) {
            //En este caso solo mostramos el titulo y fecha de la entrada
            echo '<li><a href="#">'.$row_searched['nombre'].')</a></li>';*/

        }
        echo '</ul>';
        }
         else {
        //Si no hay registros encontrados
        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
        }
     }

    




}
?>