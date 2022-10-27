

<div class="container">
  <div class="row">
    <div class="col-md-12">

       <?php echo form_open_multipart('usuarios/logout'); ?>
      <button type="submit" name="button2" class="btn btn-danger">CERRAR SESION</button>
      <?php echo form_close(); ?>

      <br>
      <h1>Lista de clientes habilitados.</h1>
      <h1>Login: <?php echo $this->session->userdata('login'); ?></h1>
      <h1>Tipo: <?php echo $this->session->userdata('tipo'); ?></h1>
      <h1>ID: <?php echo $this->session->userdata('idusuario'); ?></h1>

      <?php echo form_open_multipart('cliente/agregar'); ?>
      <button type="submit" class="btn btn-primary">AGREGAR CLIENTE</button>
      <?php echo form_close(); ?>

      <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer apellido</th>
                <th scope="col">Segundo apellido</th>
              </tr>
            </thead>
          <tbody>

 <?php
 $indice=1;
      foreach ($cliente->result() as $row) {
       ?>
           <tr>
            <th scope="row"><?php echo $indice; ?></th>
            <td><?php echo $row->nombres; ?></td>
            <td><?php echo $row->apellidoPaterno; ?></td>
            <td><?php echo $row->apellidoMaterno; ?></td>

          
            <td>
                <?php echo form_open_multipart("cliente/eliminarbd"); ?>
                <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">
                <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger">
                <?php echo form_close(); ?>
            </td>

            <td>             
                <?php echo form_open_multipart("cliente/modificar"); ?>
                <input type="hidden" name="idcliente" value="<?php echo $row->idcliente; ?>">
                <input type="submit" name="buttony" value="Modificar" class="btn btn-danger">
                <?php echo form_close(); ?>
            </td>
           
          </tr>
      <?php
      
      $indice++;     
       }
    ?>

  
  
  
         </tbody> 
       </table>
      
    </div>
    
  </div>


</div>


