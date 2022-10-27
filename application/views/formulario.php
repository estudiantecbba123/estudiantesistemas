

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Agregar cliente</h2>

      <?php echo form_open_multipart('cliente/agregarbd'); ?>

      <input type="text" name="nombres" placeholder="Ingrese nombre/es">
      <input type="text" name="apellidoPaterno" placeholder="Ingrese apellido paterno">
      <input type="text" name="apellidoMaterno" placeholder="Ingrese apellido materno">
      
      

      <button type="submit" class="btn btn-primary">AGREGAR CLIENTE</button>

      <?php form_close(); ?>

     
      
    </div>
    
  </div>


</div>


