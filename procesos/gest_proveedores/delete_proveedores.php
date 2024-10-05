<?php 
if (isset($_GET['eliminar'])) {
	$elim_id = $_GET['eliminar'];

	$sql = "DELETE FROM tbl_proveedores WHERE id_provee = '$elim_id'";
	$query = mysqli_query($con,$sql);

	if ($query) {
		echo "<script>alert('Registro eliminado')</script>";

		echo "<script>window.open('gest_proveedores.php','_self')</script>";
	}
}


 ?>