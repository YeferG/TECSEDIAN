<?php 
if (isset($_GET['editar'])) {
	$edit_id = $_GET['editar'];
	$sql = "SELECT * FROM tbl_proveedores WHERE id_provee = '$edit_id'";
	$query = mysqli_query($con,$sql);

	$fila = mysqli_fetch_array($query);
	$nombre = $fila['nom_provee'];
	$telefono = $fila['tel_provee'];
	$direccion = $fila['dir_provee'];
	$correo = $fila['cor_provee'];
}
 ?>
<div align="center">
	<form method="POST" action="">
		<label>Nombre: </label><input type="text" name="nombre_prov" value="<?php echo $nombre; ?>"/><br>
		<label>Telefono: </label><input type="text" name="telefono_prov" value="<?php echo $telefono; ?>"/><br>
		<label>Direccion: </label><input type="text" name="direccion_prov" value="<?php echo $direccion; ?>"/><br>
		<label>Correo: </label><input type="text" name="correo_prov" value="<?php echo $correo; ?>"/><br>
		<input type="submit" name="actualizar" value="Actualizar Datos">
	</form>
</div>
<?php 
	if (isset($_POST['actualizar'])) {
		$act_nombre = $_POST['nombre_prov'];
		$act_telefono = $_POST['telefono_prov'];
		$act_direccion = $_POST['direccion_prov'];
		$act_correo = $_POST['correo_prov'];

		$sql = "UPDATE tbl_proveedores SET nom_provee='$act_nombre',tel_provee='$act_telefono',dir_provee='$act_direccion',cor_provee='$act_correo' WHERE id_provee = '$edit_id'";

		$query = mysqli_query($con,$sql);

		if ($query) {
			echo "<script>alert('Datos Actualizados')</script>";

			echo "<script>window.open('gest_proveedores.php','_self')</script>";
		}
		
	}
 ?>