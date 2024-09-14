<?php 
if (isset($_GET['editar'])) {
	$edit_id = $_GET['editar'];
	$sql = "SELECT * FROM tproveedores WHERE idProv = '$edit_id'";
	$query = mysqli_query($con,$sql);

	$fila = mysqli_fetch_array($query);
	$nombre = $fila['nombreProv'];
	$telefono = $fila['telefonoProv'];
	$direccion = $fila['direccionProv'];
	$correo = $fila['correoProv'];
}
 ?>
<div align="center">
	<form method="POST" action="">
		<label>Nombre: </label><input type="text" name="nombrenu" value="<?php echo $nombre; ?>"/><br>
		<label>Telefono: </label><input type="text" name="telefonou" value="<?php echo $telefono; ?>"/><br>
		<label>Direccion: </label><input type="text" name="direccionu" value="<?php echo $direccion; ?>"/><br>
		<label>Correo: </label><input type="text" name="correonue" value="<?php echo $correo; ?>"/><br>
		<input type="submit" name="actualizar" value="Actualizar Datos">
	</form>
</div>
<?php 
	if (isset($_POST['actualizar'])) {
		$act_nombre = $_POST['nombrenu'];
		$act_telefono = $_POST['telefonou'];
		$act_direccion = $_POST['direccionu'];
		$act_correo = $_POST['correonue'];

		$sql = "UPDATE tproveedores SET nombreProv='$act_nombre',telefonoProv='$act_telefono',direccionProv='$act_direccion',correoProv='$act_correo' WHERE idProv = '$edit_id'";

		$query = mysqli_query($con,$sql);

		if ($query) {
			echo "<script>alert('Datos Actualizados')</script>";

			echo "<script>window.open('gest_proveedores.php','_self')</script>";
		}
		
	}
 ?>