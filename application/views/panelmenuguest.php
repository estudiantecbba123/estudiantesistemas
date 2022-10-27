
<div class="container">
  
	<div class="row">
		<div class="col-md-12">
			
    <h1>Panel de invitados</h1>

      <h1>Login: <?php echo $this->session->userdata('login'); ?></h1>
      <h1>Tipo: <?php echo $this->session->userdata('tipo'); ?></h1>
      <h1>Nombres: <?php echo $this->session->userdata('nombres'); ?></h1>
      <h1>ID: <?php echo $this->session->userdata('idusuario'); ?></h1>   

      <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre</th>                
                <th scope="col">tipo</th>
                <th scope="col">ID</th>
                <tr>
                	<td><?php echo $this->session->userdata('nombres'); ?></td>
                    <td><?php echo $this->session->userdata('tipo'); ?></td>
                    <td><?php echo $this->session->userdata('idusuario'); ?></td>
                </tr> 
        </table>

		</div>
	</div>
</div>

