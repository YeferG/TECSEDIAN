<?php
	session_start();
	$VAR = $_SESSION['usuario'];
	if($VAR == null || $VAR = ""){
 		echo "TIENE QUE INICIAR COMO USUARIO EN EL INICIO";
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gestion de Clientes</title>
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

<div id= "menu2">
	<h2>INGRESAR CLIENTES</h2><br>
	<form method="post" action="gest_clientes.php">
		<label>Nombre: </label><input type="text" name="clientes" id="clientes" required="" >
		<label>Telefono: </label><input type="text" name="telefono" id="telefono" required="">
		<label>Direccion: </label><input type="text" name="direccion" id="direccion">
		<input type="submit" name="registrar2" value="Guardar">
	</form>

	<?php 
	if (isset($_POST['registrar2'])) {
		if (strlen($_POST['clientes']) >=1) {
		$clientes = $_POST['clientes'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];    
		$sql = "INSERT INTO tclientes(nombreCli,telefonoCli,direccionCli) VALUES('$clientes','$telefono','$direccion')";
		$query = mysqli_query($con,$sql);
		}
	}
	?>
</div>

<div id="busque">
	<h2 id="titulo_tabla">Clientes</h2>
	<form id="buscompra">
        <input type ="text" name="busqueda" placeholder="&#128269; BUSCAR" class="bus">
        <input type ="submit" value="Buscar" class="busq">
    </form>
	<br>	
</div>

<div id="agrupar" style="width: 820px; height: 40%;">
<section id="contenido">

<table class="tablas">
	<thead class="stic">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Direccion</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead> 
	<?php 
		$sql="SELECT * FROM tclientes";
		$query=mysqli_query($con,$sql);
		$i=0;
		while ($fila=mysqli_fetch_array($query)) {
			$id = $fila['idCli'];
			$nombre = $fila['nombreCli'];
			$telefono = $fila['telefonoCli'];
			$direccion = $fila['direccionCli'];
			$i++;
	?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $nombre; ?></td>
		<td><?php echo $telefono; ?></td>
		<td><?php echo $direccion; ?></td>
		<td><a href="gest_clientes.php?editar=<?php echo $id;?>">¿Editar?</a></td>
		<td><a href="gest_clientes.php?eliminar=<?php echo $id; ?>">¿Eliminar?</a></td>
	</tr>
	<?php } ?>
</table>

</section>
</div>

<?php
	if (isset($_GET['editar'])) {
		include_once('edit_clientes.php');
	} 
	include_once'delete_clientes.php';
?>

<footer id="pie">
	<small>Contactanos</small><br>
	<small>Linea telefonica  10034822203 Bogota-colombia.</small><br>
	<small>correo tecsedian.soft@gmail.com</small><br>
	<small>WhatsApp +57 3102692032 o +57 3042050035.</small>
</footer>
</body>
</html>