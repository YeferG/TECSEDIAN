<?php 
if (isset($_GET['eliminar'])) {
	$elim_id = $_GET['eliminar'];

	$sql = "DELETE FROM Tclientes WHERE idCli = '$elim_id'";
	$query = mysqli_query($con,$sql);

	if ($query) {
		echo "<script>alert('Registro Eliminado')</script>";

		echo "<script>window.open('gest_clientes.php','_self')</script>";
	}
}


 ?>