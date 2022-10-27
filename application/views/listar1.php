<div class="col-xs-12">
    <h1>Productos</h1>
    <?php if(!empty($this->session->flashdata())): ?>
		<div class="alert alert-<?php echo $this->session->flashdata('clase')?>">
			<?php echo $this->session->flashdata('mensaje') ?>
		</div>
	<?php endif; ?>
    <!-- <div>
        <a class="btn btn-success" href="<?php echo base_url() ?>index.php/productos/agregar">Nuevo <i class="fa fa-plus"></i></a>
    </div> -->
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <!--<th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Ganancia</th>-->
                <th>Stock</th>
                <!--<th>Editar</th>
                <th>modificar</th> 
                <th>Eliminar</th>-->
                <th scope="col">Agregar a carrito</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $indice=1;
            foreach($productos as $producto){ ?>
            <tr>
                <th scope="producto"><?php echo $indice; ?></th>
                <td>
                    <?php  
                    $imagen=$producto->imagen;
                      if($imagen=="")
                      {
                    ?>
                      <img src="<?php echo base_url(); ?>/uploads/user.png" width="50px">
                    <?php
                      }
                      else
                      {
                    ?>
                      <img src="<?php echo base_url(); ?>/uploads/<?php echo $imagen; ?>" width="50px">
                    <?php
                      }
                    ?>
                </td>
                <td><?php echo $producto->nombre ?></td>
                <td><?php echo $producto->descripcion ?></td>
                <!--<td><?php echo $producto->precioCompra ?></td>
                <td><?php echo $producto->precioVenta ?></td>
                <td><?php echo $producto->precioVenta - $producto->precioCompra ?></td>-->
                <td><?php echo $producto->stock ?></td>
                 <td>
                <?php echo form_open_multipart("vender/agregar"); ?>
                <!-- <?php echo form_open_multipart('Vender/agregarAlCarrito'); ?> -->
                <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                <input type="submit" name="buttony" value="Agregar" class="btn btn-danger">
                <?php echo form_close(); ?>
            </td>
                <!-- <td><a class="btn btn-warning" href="<?php echo base_url() ."index.php/productos/editar/" . $producto->id ?>"><i class="fa fa-edit"></i></a></td>
                 <td><a class="btn btn-warning" href="<?php echo base_url() ."index.php/productos/editar/" . $producto->id ?>"><i class="fa fa-edit"></i></a></td> 
                 <td>
                    <?php echo form_open_multipart('productos/modificar'); ?>
                    <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                    <button type="submit" name="buton2" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                    <?php echo form_close(); ?>  
                </td>                    
                <td><a class="btn btn-warning" href="<?php echo base_url(); ?>index.php/productos/modificar"><i class="fa fa-edit"></i></a></td> 
                <td><a class="btn btn-danger" href="<?php echo base_url() ."index.php/productos/eliminar/" . $producto->id ?>"><i class="fa fa-trash"></i></a></td> -->
            </tr>
            <?php 
         $indice++;     
          } ?>
        </tbody>
    </table>
</div>