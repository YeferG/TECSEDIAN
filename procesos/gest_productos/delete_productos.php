  <?php 
 	
 	if (isset($_GET['eliminar'])){
 		$eliminar_id = $_GET['eliminar'];

 		$sql = "DELETE FROM Tproductos WHERE proId ='$eliminar_id'";
 		$query = mysqli_query($con,$sql);


	if ($query) {
		echo "<script>alert('Registro Eliminado')</script>";

		echo "<script>window.open('gest_productos.php','_self')</script>";
	}
 }
  ?>