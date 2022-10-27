

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Modificar cliente</h2>

      <?php
      foreach ($infocliente->result() as $row) 
      {                                                  

        echo form_open_multipart('cliente/modificarbd'); ?>


        <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">


        <input type="text" name="nombres" placeholder="Ingrese nombres" value="<?php echo $row->nombre; ?>">
        <input type="text" name="apellidoPaterno" placeholder="Ingrese apellido paterno" value="<?php echo $row->precio; ?>">
        <input type="text" name="apellidoMaterno" placeholder="Ingrese apellido materno" value="<?php echo $row->stock; ?>">
                
        <button type="submit" class="btn btn-primary">MODIFICAR CLIENTE</button>
        <?php 
        form_close(); 
      }

      ?>

     
      
    </div>
    
  </div>


</div>


