<?php 
$granTotal = 0;
?>
<div class="col-xs-12">
	<h1>Vender</h1>
	<?php if(!empty($this->session->flashdata())): ?>
		<div class="alert alert-<?php echo $this->session->flashdata('clase')?>">
			<?php echo $this->session->flashdata('mensaje') ?>
		</div>
	<?php endif; ?>

<br>
	
<!--<select class="form-control" name="productName[]" id="productName<?php echo 
$x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
<option value="">-- Selecciona --</option>
<?php

?>
</select>



	<br>-->
	<form action="<?php echo base_url() ?>index.php/productos/buscar" method="POST">
        Palabras clave
       <input type="text" id="keywords" name="keywords" size="30" maxlength="30">
       <input type="submit" name="search" id="search" value="Buscar">
    </form>
	<br>
	<form method="post" action="<?php echo base_url() ?>index.php/vender/agregar">
		<label for="codigo">Nombre del producto:</label>
		<input autocomplete="off" autofocus class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre del producto">
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Precio de venta</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Acción</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($carrito as $indice => $producto){ 
					$granTotal += $producto->total;
				?>
			<tr>
				<td><?php echo $producto->id ?></td>
				<td><?php echo $producto->nombre ?></td>
				<td><?php echo $producto->descripcion ?></td>
				<td><?php echo $producto->precioVenta ?></td>
				<td><?php echo $producto->cantidad ?></td>
				<td><?php echo $producto->total ?></td>
				<td>
					<a class="btn btn-info btn-sm" href="<?php echo base_url() . "index.php/vender/aumentarCantidad/" . $indice?>">
						+						
					</a>
					<a class="btn btn-info btn-sm btn btn-danger" href="<?php echo base_url() . "index.php/vender/rebajarCantidad/" . $indice?>">
						-						
					</a>
				</td>
				<td><a class="btn btn-danger" href="<?php echo base_url() . "index.php/vender/quitarDelCarrito/" . $indice?>"><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<h3>Total: <?php echo $granTotal; ?></h3>
	<input name="total" type="hidden" value="<?php echo $granTotal;?>">
	 <a href="<?php echo base_url() ?>index.php/vender/terminarVenta" class="btn btn-success">Terminar venta</a>   
	<!-- <a href="<?php echo base_url() ?>index.php/vender/terminarVenta" class="btn btn-success" target="_blank">Terminar venta</a>  -->
	 <a href="<?php echo base_url() ?>index.php/vender/cancelarVenta" class="btn btn-danger">Cancelar venta</a>

	
</div>