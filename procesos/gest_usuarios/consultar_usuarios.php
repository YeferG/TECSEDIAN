<?php
	session_start();
	$VAR = $_SESSION['usuario'];
	$est = $_SESSION['estadoUsu'];
	if($VAR == null || $VAR = ""){
		echo "TIENE QUE INICIAR COMO USUARIO EN EL INICIO";
		die();
	} 

	if($est == "Bloqueado"){
		echo "<script>alert('ESTE USUARIO SE ENCUENTRA BLOQUEADO, LO SENTIMOS')</script>";
		echo "<script>window.open('index.php','_self')</script>";
 		die();
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Gestion de Usuarios</title>
	<link rel="icon" href="/imagenes/logo1.ico">
	<link rel="stylesheet" type="text/css" href="/css/es_menu_emergente.css">
	<link rel="stylesheet" type="text/css" href="/css/es_footer.css">
	<link rel="stylesheet" type="text/css" href="/css/es_tablas.css">
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
	<div class="container-1">
	  	<input type ="search" name="search" id="search" placeholder="Nombres, Apellidos, Estado" >
        <span class="icon"><i class="fa fa-search"></i></span>
    </div><br><br>
	<section id="contenido" >
        <table class="tablas">
			<thead>
				<tr>
					<th> Id </th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Correo</th>
					<th>Rol</th>
					<th>Usuario</th>
					<th>Estado</th>
					<th>Fecha de registro</th>
					<th>Modificar</th>
				</tr>
			</thead>
			<tbody>
				<?php include_once('mostrar_datos_usuarios.php'); ?>
			</tbody>
		</table>
			<?php
				if (isset($_GET['editar'])) {
					include_once('form_editar_usuarios.php');
				}
			?>  
	</section>
</div>

<div id="agrupar">
	<div id="generar">
		<a href="libreri/GenerarBLOQUEADOS.php"><button class="busq" type="submit" onclick="generar()" style="width: 120px; float: right;">BLOQUEADOS</button></a>
		<a href="libreri/GenerarACTIVOS.php"><button class="busq" type="submit" onclick="generar()" style="width: 80px; float: right; margin-right: 10px;">ACTIVOS</button></a>
		<a href="libreri/GenerarTODOS.php"><button class="busq" type="submit" onclick="generar()" style="float: right; margin-right: 10px">TODOS</button></a>
		<label style="float: right; margin-right: 20px; margin-top: 5px;">GENERAR:</label>
	</div>
	<br><br>
</div>

<footer>
    <small>Contáctanos</small>
    <small>Línea telefónica: 123456789</small>
    <small>Correo: <a href="mailto:ejemplo@mail.com">ejemplo@mail.com</a></small>
    <small>WhatsApp: <a href="https://wa.me/573022953980" target="_blank">+57 3022953980</a></small>
    <small>Fusagasugá - Colombia</small>
</footer>
</body>
</html>