<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');
error_reporting(0);
if($_POST){  
   $nop = (array)$_POST["no"];
    foreach( $nop as $no){
           
       $si = $_POST["si" . $no] == 'on' ? "Si" : "No";
       	if ( $si=="Si") {
			$sql = "UPDATE Tusuario SET estadoUsu='Bloqueado' 
			WHERE idUsu = '$no'";
			$query = mysqli_query($con,$sql);  
    } else	if ( $si=="No") {
			$sql = "UPDATE Tusuario SET estadoUsu='Activo' 
			WHERE idUsu = '$no'";
			$query = mysqli_query($con,$sql);  
    }
    if ($query){
      echo "<script>alert('Los estados de los usuarios fueron modificados correctamente')</script>";
      echo "<script>window.open('form_bloquear_usuarios.php','_self')</script>";
      }     
    }    
}
?>