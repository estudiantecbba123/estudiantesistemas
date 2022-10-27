<?php
    class ProductoModel extends CI_Model{
        public $id;
        public $imagen;
        public $nombre;
        public $descripcion;
        public $precioVenta;
        public $precioCompra;
        public $stock;

        public function __construct(){
            $this->load->database();
        }

        public function nuevo($nombre, $descripcion, $precioVenta, $precioCompra, $stock){
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->precioVenta = $precioVenta;
            $this->precioCompra = $precioCompra;
            $this->stock = $stock;
            return $this->db->insert('productos', $this);
        }

  

        public function guardarCambios($id, $nombre, $descripcion, $precioVenta, $precioCompra, $stock){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->precioVenta = $precioVenta;
            $this->precioCompra = $precioCompra;
            $this->stock = $stock;
            return $this->db->update('productos', $this, array("id" => $id));
        }

        public function todos(){
            return $this->db->get("productos")->result();
        }

        public function eliminar($id){
            return $this->db->delete("productos", array("id" => $id));
        }

        public function uno($id){
            return $this->db->get_where("productos", array("id" => $id))->row();
        }

        public function porNombre($nombre){
            return $this->db->get_where("productos", array("nombre" => $nombre))->row();
        }

              

        public function recuperarproducto($idproducto)
        {
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->where('id',$idproducto);
        return $this->db->get();
        }


        public function modificarproducto($idproducto,$data)
        {
        $this->db->where('id',$idproducto);
        $this->db->update('productos',$data);
        }


     public function listaproductos()
    {
        $this->db->select('*');
        $this->db->from('productos');
        //$this->db->where('habilitado','1');
        return $this->db->get();        
    }

    public function buscar($keyword){
        $this->db->select('*'); 
        $this->db->from('productos');
        $this->db->like('nombre', $keyword);
        return $this->db->get()->result_array();                
    }

           
      

    }
?>