<?php
	session_start();
	$VAR = $_SESSION['usuario'];
	if($VAR == null || $VAR = ""){
 		echo "TIENE QUE INICIAR COMO USUARIO EN EL INICIO";
		die();
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editar Usuario</title>
	<meta charset="utf-8">

	<link rel="icon" href="/imagenes/logo1.ico">
	<link rel="stylesheet" type="text/css" href="/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="/css/estilos_menu.css">
	<link rel="stylesheet" type="text/css" href="/css/estilos_tablas.css">
	<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');?>
</head>

<body id="cuerpo">
<header id="cabecera">
	<img src="/imagenes/Logo.png">
	<div id="navegar">
		<nav id="menu">
			<h2 id="nom">Bienvenido: <?php echo  $_SESSION['usuario']?><a href="/procesos/gest_cuenta/cerrar_sesion.php"><button class="tn">CERRAR SESION</button></a></h2><br>
			<ul class="nav">
				<li><a style="width:102px;" href="" >Inventario</a>
					<ul>
						<li><a href="\procesos\gest_ventas\gest_ventas.php">Ventas</a></li>
						<li><a href="\procesos\gest_compras\gest_compras.php">Compras</a></li>
						<li><a href="\procesos\gest_productos\gest_productos.php">Productos</a></li>
						<li><a href="\procesos\gest_proveedores\gest_proveedores.php">Provedores</a></li>
						<li><a href="\procesos\gest_clientes\gest_clientes.php">Clientes</a></li>
					</ul>
				</li>
				<li><a style="width:155px;" href="" >Reportes</a>
					<ul>
						<li><a href="/libreri/pdf.php">Reporte usuarios</a></li>
						<li><a href="/libreri/pdf2.php">Reporte ventas</a></li>
						<li><a href="/libreri/pdf3.php">Reporte compras</a></li>
						<li><a href="/libreri/pdf4.php">Reporte producto</a></li>
					</ul>
				</li>
				<li><a href="">Gestion de usuarios</a>
					<ul>
						<li><a style="width:180px;" href="\procesos\gest_usuarios\consultar_usuarios.php">Consultar usuarios</a></li>
						<li><a href="\procesos\gest_usuarios\crear_usuarios.php">Crear usuario</a></li>
						<li><a href="\procesos\gest_usuarios\form_bloquear_usuarios.php">Bloquear usuario</a></li>
					</ul>
				</li>
			</ul>	
		</nav>
	</div>
</header>







<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');
if (isset($_GET['editar'])){
	$editar_id=$_GET['editar'];
	$sql="SELECT * FROM tusuario WHERE idUsu='$editar_id'";
	$query=mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($query);

		$nombres=$fila['nombresUsu'];
		$apellidos=$fila['apellidosUsu'];
		$telefono=$fila['telefonoUsu'];
		$direccion=$fila['direccionUsu'];
		$email=$fila['correoUsu'];
		$usuario=$fila['usuarioUsu'];
		$password=$fila['passwordUsu'];
	}
?>

<br>

	<div id="container" style="	margin:auto;
	text-align: center;

	margin-top:0px; ">
 	    
 	
 	    
 	<form class="formularios_gestion_usuarios" id="formulario_edit" method="POST" action="" accept-charset="utf-8">
 		
 		<h2> Actualiza tus datos &#128736;</h2> <br>

	    <label for="editNombres">Nombres:</label>
	    <input type="text" name="nombresEdit" id="editNombres" value="<?php echo $nombres;?>"/>

	    <label for="editApellidos">Apellidos:</label>
	    <input type="text" name="apellidosEdit" id="editApellidos" value="<?php echo $apellidos;?>"/><br>

	    <label for="editTelefono">Telefono:</label>
	    <input type="text" name="telefonoEdit" id="editTelefono" value="<?php echo $telefono;?>"/>

	    <label for="editDireccion">Direccion:</label>
	    <input type="text" name="direccionEdit" id="editDireccion" value="<?php echo $direccion;?>"/><br>

	    <label for="editEmail">Correo:</label> 
	    <input type="text" name="emailEdit" id="editEmail" value="<?php echo $email;?>" style="width: 495px;"/><br>

	    <label for="editUsuario">Usuario:</label>
	    <input type="text" name="usaurioEdit" id="editUsuario"  value="<?php echo $usuario; ?>" />

	    <label for="editPassword">Contraseña:</label>
	    <input type="text" name="passwordEdit"  id="editPassword" value="<?php echo $password;?>"/><br>

        <a href="consultar_usuarios.php"><input type="button" class="btns" value="Cancelar"></a>
        <button class="btns" type="submit" name="editUser" id="userEdit" onclick="return validar2()">Actualizar</button>

	</form>

	</div>

<?php 
if (isset($_POST['editUser'])) {

        $edit_nombres=$_POST['nombresEdit'];
		$edit_apellidos=$_POST['apellidosEdit'];
		$edit_telefono=$_POST['telefonoEdit'];
		$edit_direccion=$_POST['direccionEdit'];
		$edit_email=$_POST['emailEdit'];
		$edit_usuario=$_POST['usaurioEdit'];
		$edit_password=$_POST['passwordEdit'];

		$sql="UPDATE tusuario SET nombresUsu='$edit_nombres', apellidosUsu='$edit_apellidos', telefonoUsu='$edit_telefono', direccionUsu='$edit_direccion', correoUsu='$edit_email', usuarioUsu='$edit_usuario', passwordUsu='$edit_password' WHERE idUsu='$editar_id'";

		$query = mysqli_query($con,$sql);
		echo "<br>";

			if ($query) {
			echo "<script>alert('Datos actualizados correctamente')</script>";

			echo "<script>window.open('consultar_usuarios.php','_self')</script>";
			}
}
?>
 	<script src="js/validacion_formulario2.js"></script>

<footer>
	<small>Contactanos</small><br>
	<small>Linea telefonica  10034822203 Bogota-colombia.</small><br>
	<small>correo tecsedian.soft@gmail.com</small><br>
	<small>WhatsApp +57 3102692032 o +57 3042050035.</small>
</footer>
</body>
</html>