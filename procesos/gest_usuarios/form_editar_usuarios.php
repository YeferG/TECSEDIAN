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
	<meta charset="utf-8">
	<title>Editar Usuario</title>
	<link rel="icon" href="/imagenes/logo1.ico">
	<link rel="stylesheet" type="text/css" href="/css/es_menu_emergente.css">
	<link rel="stylesheet" type="text/css" href="/css/es_footer.css">
	<link rel="stylesheet" type="text/css" href="/css/es_form_editar_usu.css">
	<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');?>
</head>

<body id="cuerpo">
<header id="cabecera">
    <img src="/imagenes/Logo.png" alt="Logo de la empresa">
    <div id="navegacion">
        <nav id="menu">
            <br>
            <ul class="menu-principal">
                <li class="menu-item">
                    <a href="#">Inventario</a>
                    <ul class="submenu">
                        <li><a href="/procesos/gest_ventas/gest_ventas.php">Ventas</a></li>
                        <li><a href="/procesos/gest_compras/gest_compras.php">Compras</a></li>
                        <li><a href="/procesos/gest_productos/gest_productos.php">Productos</a></li>
                        <li><a href="/procesos/gest_proveedores/gest_proveedores.php">Proveedores</a></li>
                        <li><a href="/procesos/gest_clientes/gest_clientes.php">Clientes</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#">Reportes</a>
                    <ul class="submenu">
                        <li><a href="/libreri/pdf.php">Reporte usuarios</a></li>
                        <li><a href="/libreri/pdf2.php">Reporte ventas</a></li>
                        <li><a href="/libreri/pdf3.php">Reporte compras</a></li>
                        <li><a href="/libreri/pdf4.php">Reporte productos</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#">Gestión de usuarios</a>
                    <ul class="submenu">
                        <li><a href="/procesos/gest_usuarios/consultar_usuarios.php">Consultar usuarios</a></li>
                        <li><a href="/procesos/gest_usuarios/crear_usuarios.php">Crear usuario</a></li>
                        <li><a href="/procesos/gest_usuarios/form_bloquear_usuarios.php">Bloquear usuario</a></li>
                    </ul>
                </li>
            </ul>
            <h2 id="nombre-usuario">
                Bienvenido: <?php echo $_SESSION['usuario']; ?>
                <a href="/procesos/gest_cuenta/cerrar_sesion.php">
                    <button class="btn-cerrar-sesion">CERRAR SESION</button>
                </a>
            </h2>
        </nav>
    </div>
</header>







<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');
if (isset($_GET['editar'])){
	$editar_id=$_GET['editar'];
	$sql="SELECT * FROM tbl_usuarios WHERE id_usu='$editar_id'";
	$query=mysqli_query($con,$sql);
	$fila=mysqli_fetch_array($query);

		$nombres=$fila['nom_usu'];
		$apellidos=$fila['ape_usu'];
		$telefono=$fila['tel_usu'];
		$direccion=$fila['dir_usu'];
		$email=$fila['cor_usu'];
		$usuario=$fila['usuario_usu'];
		$password=$fila['pass_usu'];
	}
?>

<br>

	<div id="container">
    <form class="formularios_gestion_usuarios" id="formulario_edit" method="POST" action="" accept-charset="utf-8">
        <h2> Actualiza tus datos &#128736;</h2><br>

        <!-- Nombres y Apellidos -->
        <label for="editNombres">Nombres:</label>
        <input type="text" name="nombresEdit" id="editNombres" value="<?php echo $nombres;?>"/>

        <label for="editApellidos">Apellidos:</label>
        <input type="text" name="apellidosEdit" id="editApellidos" value="<?php echo $apellidos;?>"/><br>

        <!-- Teléfono y Dirección -->
        <label for="editTelefono">Teléfono:</label>
        <input type="text" name="telefonoEdit" id="editTelefono" value="<?php echo $telefono;?>"/>

        <label for="editDireccion">Dirección:</label>
        <input type="text" name="direccionEdit" id="editDireccion" value="<?php echo $direccion;?>"/><br>

        <!-- Correo en un solo renglón con cuadro de texto más grande -->
        <label for="editEmail">Correo:</label>
        <input type="text" name="emailEdit" id="editEmail" value="<?php echo $email;?>" /><br>

        <!-- Usuario y Contraseña -->
        <label for="editUsuario">Usuario:</label>
        <input type="text" name="usuarioEdit" id="editUsuario" value="<?php echo $usuario; ?>" />

        <label for="editPassword">Contraseña:</label>
        <input type="text" name="passwordEdit" id="editPassword" value="<?php echo $password;?>"/><br>

        <!-- Botones de Cancelar y Actualizar -->
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
		$edit_usuario=$_POST['usuarioEdit'];
		$edit_password=$_POST['passwordEdit'];

		$sql="UPDATE tbl_usuarios SET nom_usu='$edit_nombres', ape_usu='$edit_apellidos', tel_usu='$edit_telefono', dir_usu='$edit_direccion', cor_usu='$edit_email', usuario_usu='$edit_usuario', pass_usu='$edit_password' WHERE id_usu='$editar_id'";

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
    <small>Contáctanos</small>
    <small>Línea telefónica: 123456789</small>
    <small>Correo: <a href="mailto:ejemplo@mail.com">ejemplo@mail.com</a></small>
    <small>WhatsApp: <a href="https://wa.me/573022953980" target="_blank">+57 3022953980</a></small>
    <small>Fusagasugá - Colombia</small>
</footer>


</body>
</html>