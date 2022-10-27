  
<div class="container">
  
	<div class="row">
		<div class="col-md-12">
			
      <header>
          </div></dir><img src="fantastico.jpg"/>                  
          <h1>Discoteca</h1>
      </header>

    

      <center>
    <?php 
    echo form_open_multipart('usuarios/validar',array('id'=>'form1','class'=>
      'form-control'))
    ?>			
              <div class="mb-3">
                <label class="form-label">Login</label>
                <input type="text" name="login" class="form-control" placeholder="Ingrese su login">
               </div>
              <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Password</label>
                 <input type="password" name="password" class="form-control" placeholder="Ingrese su password">
              </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>                                             
           <?php
           echo form_close();
           ?>


            <td>
                <?php echo form_open_multipart("crearusuario/agregar"); ?>               
                <input type="submit" name="buttonx" value="Crear Usuario" class="btn btn-danger">
                <?php echo form_close(); ?>
            </td>

       </center> 

		</div>
	</div>
</div>

