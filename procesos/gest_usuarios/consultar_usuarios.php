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
	<title>Gestion de Usuarios</title>
	<meta charset="utf-8">

	<link rel="icon" href="/imagenes/logo1.ico">
	<link rel="stylesheet" type="text/css" href="/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="/css/estilos_menu.css">
	<link rel="stylesheet" type="text/css" href="/css/estilos_tablas.css">

	<link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
	<small>Contactanos</small><br>
	<small>Linea telefonica  10034822203 Bogota-colombia.</small><br>
	<small>correo tecsedian.soft@gmail.com</small><br>
	<small>WhatsApp +57 3102692032 o +57 3042050035.</small>
</footer>
</body>
</html>