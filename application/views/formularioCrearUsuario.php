

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Agregar usuario</h2>

      <?php echo form_open_multipart('crearusuario/agregarbd'); ?>

      <input type="text" name="login" placeholder="Ingrese Login">
      <input type="text" name="password" placeholder="Ingrese Password">
      <select name="tipo" >
           <option value="Administrador">Administrador</option>
           <option value="Caja">Caja</option>
      </select>      
      <input type="text" name="nombres" placeholder="Ingrese nombre/es">
      <input type="text" name="primerApellido" placeholder="Ingrese apellido paterno">
      <input type="text" name="segundoApellido" placeholder="Ingrese apellido materno">
      <input type="text" name="edad" placeholder="edad">
      
      

      <button type="submit" class="btn btn-primary">CREAR USUARIO</button>

      <?php form_close(); ?>

     
      
    </div>
    
  </div>


</div>


