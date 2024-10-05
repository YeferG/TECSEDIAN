  <?php 
 	
 	if (isset($_GET['eliminar'])){
 		$eliminar_id = $_GET['eliminar'];

 		$sql = "DELETE FROM tbl_compras WHERE compra_id ='$eliminar_id'";
 		$query = mysqli_query($con,$sql);


	if ($query) {
		echo "<script>alert('Compra eliminada')</script>";

		echo "<script>window.open('gest_compras.php','_self')</script>";
	}
 }
  ?>