<?php
class VentaModel extends CI_model{
    public function __construct(){
        $this->load->database();
    }

    public function porId($id){
        $venta = new StdClass();
        $venta->detalles = $this->detalleDeVenta($id);
        $venta->productos = $this->productosVendidosDeUnaVenta($id);
        return $venta;
    }

    private function detalleDeVenta($id){
        return $this->db
        ->select("ventas.id, ventas.fecha, sum(productos_vendidos.cantidad * productos_vendidos.precio) as total")
        ->from("ventas")
        ->join("productos_vendidos", "productos_vendidos.id_venta = ventas.id")
        ->where("productos_vendidos.id_venta", $id)
        ->group_by("ventas.id")
        ->get()
        ->row();
    }

    private function productosVendidosDeUnaVenta($idVenta){
        return $this->db
        ->select("productos.descripcion, productos.nombre, productos_vendidos.precio, productos_vendidos.cantidad")
        ->from("productos")
        ->join("productos_vendidos", "productos_vendidos.id_producto = productos.id")
        ->where("productos_vendidos.id_venta", $idVenta)
        ->get()
        ->result();
    }

    public function todas(){
        return $this->db
        ->select("ventas.id, ventas.fecha, sum(productos_vendidos.cantidad * productos_vendidos.precio) as total")
        ->from("ventas")
        ->join("productos_vendidos", "productos_vendidos.id_venta = ventas.id")
        ->group_by("ventas.id")
        ->get()
        ->result();
    }

    public function eliminar($id){
        return $this->db->delete("ventas", array("id" => $id));
    }

    public function nueva($productosVendidos){
        # Primero registramos la venta
        $detalleDeVenta = array("fecha" => date("Y-m-d H:i:s"));
        $this->db->insert("ventas", $detalleDeVenta);

        # Ahora tomamos su ID        
        $idVenta = $this->db->insert_id();

        # Recorrer el carrito
        foreach($productosVendidos as $producto){
            # El producto que insertamos es diferente al del carrito, sólo necesitamos algunas cosas:
            $detalleDeProductoVendido = array(
                "id_producto" => $producto->id,
                "cantidad" => $producto->cantidad,
                "precio" => $producto->precioVenta,
                "id_venta" => $idVenta,
            );
            $this->db->insert("productos_vendidos", $detalleDeProductoVendido);
        }
        $this->boletapdf($idVenta);
        return true;
    }



    //public function boletapdf($idVenta)
    public function boletapdf($idVenta)
    {

        $lista=$this->productosVendidosDeUnaVenta($idVenta);
        $detalleDeUnaVenta=$this->detalleDeVenta($idVenta);
        //$lista=$lista->result();
        $fecha=$detalleDeUnaVenta->fecha;


        //$fecha=$row[$b];
        /*$fecha=$fecha->format('d/m/Y');
        //$row[$b]=$fecha;
        $this->pdf->Cell(70,5,'Fecha de venta','TBLR',0,'L',1);  
        $this->pdf->Cell(70,5,$fecha,'TBLR',0,'L',0); */


        $totalVendido=$detalleDeUnaVenta->total;
        //$this->pdf->Cell(70,5,'Total','TBLR',0,'L',1);  
        //$this->pdf->Cell(70,5,$total,'TBLR',0,'L',0); */


       
        

        //$this->pdf=new Pdf();
        //$this->pdf = new FPDF('P','mm',array(100,150));
        $this->pdf = new FPDF('P','mm',array(200,200));
        $this->pdf->AddPage();
        //$this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Boleta de venta");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210,210,210);
        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120,10,'BOLETA DE VENTA',0,0,'C',1);
        $this->pdf->Ln(10);
        $this->pdf->Image('uploads/logo-disco.png',60,20, 100, 30,'PNG');
        //$this->pdf->Ln(10);
        //100/ancho

        $this->pdf->Ln(30);



        $this->pdf->Cell(8,5,'No.','TBLR',0,'L',1);
        $this->pdf->Cell(70,5,'Nombre producto','TBLR',0,'L',1);        
        $this->pdf->Cell(40,5,'cantidad producto','TBLR',0,'L',1);
        $this->pdf->Cell(40,5,'Precio unitario','TBLR',0,'L',1);
        $this->pdf->Cell(18,5,'Total','TBLR',0,'L',1);
        //$this->pdf->Cell(40,5,'total','TBLR',0,'L',1);
        $this->pdf->Ln(5);

            

        $num=1;
        foreach ($lista as $row) {
            $nombre=$row->nombre;
            $cantidad=$row->cantidad;
            $precio=$row->precio;
            $total=$precio*$cantidad;
           
            

            $this->pdf->Cell(8,5,$num,'TBLR',0,'L',0);
            $this->pdf->Cell(70,5,$nombre,'TBLR',0,'L',0);
            $this->pdf->Cell(40,5,$cantidad,'TBLR',0,'L',0);            
            $this->pdf->Cell(40,5,$precio,'TBLR',0,'L',0); 
            $this->pdf->Cell(18,5,$total,'TBLR',0,'L',0); 
            //$this->pdf->Cell(40,5,$total,'TBLR',0,'L',0); 
            $this->pdf->Ln(5);
            $num++;
        }
        $this->pdf->SetFont("Arial","",20);
        $this->pdf->Cell(176,10,$totalVendido,'TBLR',0,'R',0); 

        $this->pdf->Output("boleta.pdf",'I');


    } 


    /*public function boletapdf($lista)
    {

        $lista=$this->ProductoModel->listaproductos();
        $lista=$lista->result();

        //$lista=$this->productosVendidosDeUnaVenta($idVenta);
        //$lista=$lista->result();
       
        

        $this->pdf=new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Boleta de venta");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210,210,210);
        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120,10,'BOLETA DE VENTA',0,0,'C',1);
        $this->pdf->Ln(20);



        $this->pdf->Cell(7,5,'No.','TBLR',0,'L',1);
        $this->pdf->Cell(90,5,'Nombre producto','TBLR',0,'L',1);        
        $this->pdf->Cell(40,5,'cantidad producto','TBLR',0,'L',1);
        $this->pdf->Cell(40,5,'total','TBLR',0,'L',1);
        $this->pdf->Ln(5);

        $num=1;
        foreach ($lista as $row) {
            $nombre=$row->nombre;
            $cantidad=$row->cantidad;
            $precioVenta=$row->precioVenta;
            $total=$cantidad * $precioVenta;
            

            $this->pdf->Cell(7,5,$num,'TBLR',0,'L',0);
            $this->pdf->Cell(90,5,$nombre,'TBLR',0,'L',0);
            $this->pdf->Cell(40,5,$cantidad,'TBLR',0,'L',0);            
            $this->pdf->Cell(40,5,$total,'TBLR',0,'L',0); 
            $this->pdf->Ln(5);
            $num++;
        }

        $this->pdf->Output("boleta.pdf",'I');


    }*/







}
?>