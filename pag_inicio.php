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
<html>

	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="imagenes/logo1.ico">
		<title>Tecsedian</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_menu.css">
	</head>

<body class="cont" id="cuerpo">

<header id="cabecera">
	<img src="imagenes/Logo.png">
	<div id="navegar">
		<nav id="menu">
			<h2 id="nom">Bienvenido: <?php echo  $_SESSION['usuario']?><a href="/procesos/gest_cuenta/cerrar_sesion.php"><button class="tn">CERRAR SESION</button></a></h2><br>
			<ul class="nav">
				<li><a style="width:102px;" href="" >Inventario</a>
					<ul>
						<li><a href="procesos\gest_ventas\gest_ventas.php">Ventas</a></li>
						<li><a href="procesos\gest_compras\gest_compras.php">Compras</a></li>
						<li><a href="procesos\gest_productos\gest_productos.php">Productos</a></li>
						<li><a href="procesos\gest_proveedores\gest_proveedores.php">Provedores</a></li>
						<li><a href="procesos\gest_clientes\gest_clientes.php">Clientes</a></li>
					</ul>
				</li>
				<li><a style="width:155px;" href="" >Reportes</a>
					<ul>
						<li><a href="libreri/pdf.php">Reporte usuarios</a></li>
						<li><a href="libreri/pdf2.php">Reporte ventas</a></li>
						<li><a href="libreri/pdf3.php">Reporte compras</a></li>
						<li><a href="libreri/pdf4.php">Reporte producto</a></li>
					</ul>
				</li>
				<li><a href="">Gestion de usuarios</a>
					<ul>
						<li><a style="width:180px;" href="procesos\gest_usuarios\consultar_usuarios.php">Consultar usuarios</a></li>
						<li><a href="procesos\gest_usuarios\crear_usuarios.php">Crear usuario</a></li>
						<li><a href="procesos\gest_usuarios\form_bloquear_usuarios.php">Bloquear usuario</a></li>
					</ul>
				</li>
			</ul>	
		</nav>
	</div>
</header>

<div id="agrupar">

	<section class="bienvenida" >
		<div>
       		<h2 style="font:bold 40px verdana, sans-serif;">Bienvenidos al sistema de inventario</h2>
       		<span style="font:bold 60px verdana, sans-serif;">TECSEDIAN</span>
       </div>
	</section>


</div>
<footer>
	<small>Contactanos</small><br>
	<small>Linea telefonica  10034822203 Bogota-colombia.</small><br>
	<small>correo tecsedian.soft@gmail.com</small><br>
	<small>WhatsApp +57 3102692032 o +57 3042050035.</small>
</footer>
</body>
</html>