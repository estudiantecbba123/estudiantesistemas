
<div class="container">
  
	<div class="row">
		<div class="col-md-12">
			
    <h2>Panel de invitados</h2>

    <?php echo form_open_multipart('usuarios/logout'); ?>
      <button type="submit" name="button2" class="btn btn-danger">CERRAR SESION</button>
      <?php echo form_close(); ?>

      <h1>Login: <?php echo $this->session->userdata('login'); ?></h1>
      <h1>Tipo: <?php echo $this->session->userdata('tipo'); ?></h1>
      <h1>ID: <?php echo $this->session->userdata('idusuario'); ?></h1>


		</div>
	</div>
</div>

