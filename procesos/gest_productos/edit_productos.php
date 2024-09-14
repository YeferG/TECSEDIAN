<?php 
if (isset($_GET['editar'])) {
	$editar_id = $_GET['editar'];

	$sql = "SELECT * FROM Tproductos where proId = '$editar_id'";
	$query = mysqli_query($con,$sql);

	$fila=mysqli_fetch_array($query);

	$descripcion = $fila['proNombre'];
	$precioCompra = $fila['proPreCom'];
	$precioVenta = $fila['proPreVen'];
	$stock = $fila['proStock'];
}

?>
<br>
<div align="center">
	<form method="POST" action="" >
		<input type="text" name="nombreu" value="<?php echo $descripcion; ?>"/><br>
		<input type="number" name="preCompra" id="idPreCompra" value="<?php echo $precioCompra; ?>"/><br>
		<input type="number" name="preVenta" id="idPreVenta" value="<?php echo $precioVenta; ?>"/><br>
		<input type="number" name="stocku" value="<?php echo $stock ?>"/><br><br>
		<input type="submit" name="actualizar" value="ACTUALIZAR DATOS"/>
	</form>
</div>
<?php 
if (isset($_POST['actualizar'])) {
	$actualizar_nombre=$_POST['nombreu'];
	$actualizar_precioCompra = $_POST['preCompra'];
	$actualizar_precioVenta= $_POST['preVenta'];
	$actualizar_stock=$_POST['stocku'];

	$sql= "UPDATE Tproductos SET proNombre='$actualizar_nombre',proPreCom=$actualizar_precioCompra,proPreVen=$actualizar_precioVenta, proStock=$actualizar_stock where  proId = '$editar_id'";

	$query = mysqli_query($con,$sql);

	if ($query) {
		echo "<script>alert('Datos Actualizados')</script>";

		echo "<script>window.open('gest_productos.php','_self')</script>";
	}
}

 ?>