  <?php 
 	
 	if (isset($_GET['eliminar'])){
 		$eliminar_id = $_GET['eliminar'];

 		$sql = "DELETE FROM Tventas WHERE idVen ='$eliminar_id'";
 		$query = mysqli_query($con,$sql);


	if ($query) {
		echo "<script>alert('Venta Eliminada')</script eliminado')</script>";

		echo "<script>window.open('gest_ventas.php','_self')</script>";
	}
 }
  ?>