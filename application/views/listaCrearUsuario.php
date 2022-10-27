

<div class="container">
  <div class="row">
    <div class="col-md-12">
    
      
      <?php echo form_open_multipart('crearusuario/agregar'); ?>
      <button type="submit" class="btn btn-primary">AGREGAR USUARIO</button>
      <?php echo form_close(); ?>

      <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Login</th>
                <th scope="col">Password</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer apellido</th>
                <th scope="col">Segundo apellido</th>
                <th scope="col">Edad</th>
              </tr>
            </thead>
          <tbody>

 <?php
 $indice=1;
      foreach ($usuarios->result() as $row) {
       ?>
           <tr>
            <th scope="row"><?php echo $indice; ?></th>
            <td><?php echo $row->login; ?></td>
            <td><?php echo $row->password; ?></td>
            <td><?php echo $row->nombres; ?></td>
            <td><?php echo $row->primerApellido; ?></td>
            <td><?php echo $row->segundoApellido; ?></td>
            <td><?php echo $row->edad; ?></td>                   
           
           
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


