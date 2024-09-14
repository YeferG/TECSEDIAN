<?php 
if (isset($_GET['editar'])) {
	$edit_id = $_GET['editar'];
	$sql = "SELECT * FROM Tclientes WHERE idCli = '$edit_id'";
	$query = mysqli_query($con,$sql);

	$fila = mysqli_fetch_array($query);

	$nombre = $fila['nombreCli'];
	$telefono = $fila['telefonoCli'];
	$direccion = $fila['direccionCli'];
}
 ?>
 <br><br>
		<div align="center">
			<form method="POST" action="">
				<label>Nombre   </label><input type="text" name="clientesu" value="<?php echo $nombre; ?>"/><br>
				<label>Telefono </label><input type="text" name="telefonou" value="<?php echo $telefono; ?>"/><br>
				<label>Direccion</label><input type="text" name="direccionu" value="<?php echo $direccion; ?>"/><br>
				<input type="submit" name="actualizar" value="Actualizar Datos">
			</form>
		</div>
		<?php 
		if (isset($_POST['actualizar'])) {
			$act_nombre = $_POST['clientesu'];
			$act_telefono = $_POST['telefonou'];
			$act_direccion = $_POST['direccionu'];

			$sql = "UPDATE Tclientes SET nombreCli='$act_nombre',telefonoCli='$act_telefono',direccionCli='$act_direccion' WHERE idCli = '$edit_id'";

			$query = mysqli_query($con,$sql);

			if ($query) {
			echo "<script>alert('Datos Actualizados')</script>";

			echo "<script>window.open('gest_clientes.php','_self')</script>";
			}
		
		}

		 ?>
		