

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Modificar producto</h2>

      <?php
      foreach ($infoproducto->result() as $row) 
      {                                                  

        echo form_open_multipart('Productos/modificarbd'); ?>


        <input type="hidden" name="id" value="<?php echo $row->id; ?>"> 

        <label for="nombre">Nombre:</label>
        <input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escriba el nombre"> 

        <br>

        <label for="stock">Stock:</label>
        <input class="form-control" name="stock" required type="number" id="stock" placeholder="Escriba el stock"> 

        <br>



        <!-- <input type="text" name="nombre" placeholder="Ingrese nombre" value="<?php echo $row->nombre; ?>"> -->
        <!-- <input type="text" name="precio" placeholder="Ingrese precio" value="<?php echo $row->precio; ?>"> -->
        <!-- <input type="text" name="stock" placeholder="Ingrese stock" value="<?php echo $row->stock; ?>"> -->

        <!-- <label for="stock">Stock:</label>
        <input value="<?php echo $producto->stock ?>" class="form-control" name="stock" required type="number" id="existencia" placeholder="Cantidad existente o stock">
        <br> -->        
        <label>Ingrese nueva imagen:</label> 
        <br>
 
        <input type="file" name="userfile">  

        <br>
                
        <button type="submit" class="btn btn-primary">MODIFICAR PRODUCTO</button>
        <?php 
        form_close(); 
      }

      ?>
           
    </div>
    
  </div>


</div>


