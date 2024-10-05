<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');
if(isset($_POST['registrar'])){

  if(strlen($_POST['nombres']) > 1 && strlen($_POST['apellidos']) > 1 && strlen($_POST['telefono']) > 1  && strlen($_POST['direccion']) > 1 && strlen($_POST['email']) > 1 && strlen($_POST['usuario']) > 1 && strlen($_POST['password']) > 1){

  	$nombres=$_POST['nombres'];
		$apellidos=$_POST['apellidos'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
    $email=$_POST['email'];
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
    $estado= 'Activo';
    $fecha_reg=date('y/m/d H-i-s');

     $sql="SELECT * FROM tbl_usuarios WHERE usuario_usu='$usuario'"; 
    $result=mysqli_query($con, $sql);
    $filas=mysqli_num_rows($result);
  if($filas>0){
     echo "<script>alert('Este usuario ya esta registrado, intenta con otro nombre de usuario')</script>";
     echo "<script>window.open('form_crear_usuarios.php','_self')</script>";
   }else{

    $consulta = "INSERT INTO tbl_usuarios (nom_usu, ape_usu, tel_usu, dir_usu, cor_usu, usuario_usu, pass_usu, estado_usu,fechareg_usu) VALUES ('$nombres','$apellidos','$telefono','$direccion','$email','$usuario','$password','$estado','$fecha_reg')";

 $resulta = mysqli_query($con, $consulta);
      echo "<script>alert('Se registro correctamente')</script>";

      echo "<script>window.open('consultar_usuarios.php','_self')</script>";
    }

  }
}
?>