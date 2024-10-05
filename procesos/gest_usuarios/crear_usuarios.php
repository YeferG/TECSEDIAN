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
	<title>Registrar cliente</title>
	<meta charset="utf-8">
	<link rel="icon" href="/imagenes/logo1.ico">
	<link rel="stylesheet" type="text/css" href="/css/es_menu_emergente.css">
	<link rel="stylesheet" type="text/css" href="/css/es_footer.css">
	<link rel="stylesheet" type="text/css" href="/css/estilos_tablas.css">
	<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');?>
</head>

<body class="cont" id="cuerpo">
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
	
<div id="agrupar">
	<form class="formularios_gestion_usuarios" action="" method="POST" id="formulario_registro" accept-charset="utf-8">

		<h2 style="text-align: center;">Registrar Usuario</h2><br>

		<label for="nombres">Nombres:</label><input type="text" name="nombres" id="nombres" >

		<label for="apellidos">Apellidos:</label><input type="text" name="apellidos" id="apellidos" ><br>

		<label for="telefono">Telefono:</label><input type="text" name="telefono" id="telefono" >

		<label for="direccion">Direccion:</label><input type="text" name="direccion" id="direccion" ><br>

		<label for="email">Correo:</label><input type="email" name="email" id="email" >
				
		<label for="usuario">Usuario:</label><input type="text" name="usuario" id="usuario" ><br>

		

		<label for="password">Contraseña:</label><input type="password" name="password" id="password" >

		<label for="password">Confirmar:</label><input type="password" name="password2" id="password2" ><br>

		<label for="rol" style="float: left; margin-left: 104px;">Rol:</label><select style="float: left;" name="rol" id="rol">
			<option value="0">Seleccione rol</option>
			<option value="Administrador">Administrador</option>
			<option value="Auxiliar">Auxiliar</option>
		</select><br>

		<a href="Gestion_de_usuarios.php"><input type="button" class="btn2" value="Cancelar"></a>
        <a href="Gestion_de_usuarios.php"><input type="submit" class="btn3" name="registrar" id="btn" onclick="return validar();" value="Registrar"></a>

	</form>

	<?php 
		include_once('insertar_usuarios.php');
	?>

</div>	

<script src="js/validacion_formulario.js"></script>

<footer>
	<small>Contactanos</small><br>
	<small>Linea telefonica  123456789 Fusagasuga - Colombia.</small><br>
	<small>correo ejemplo@mail.com</small><br>
	<small>WhatsApp +57 3022953980.</small>
</body>
</html>