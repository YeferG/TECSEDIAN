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
	<meta charset="utf-8">
	<title>Gestion de Clientes</title>
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
		$sql = "INSERT INTO tbl_clientes(nom_cli,tel_cli,dir_cli) VALUES('$clientes','$telefono','$direccion')";
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
		$sql="SELECT * FROM tbl_clientes";
		$query=mysqli_query($con,$sql);
		$i=0;
		while ($fila=mysqli_fetch_array($query)) {
			$id = $fila['id_cli'];
			$nombre = $fila['nom_cli'];
			$telefono = $fila['tel_cli'];
			$direccion = $fila['dir_cli'];
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

<footer>
    <small>Contáctanos</small>
    <small>Línea telefónica: 123456789</small>
    <small>Correo: <a href="mailto:ejemplo@mail.com">ejemplo@mail.com</a></small>
    <small>WhatsApp: <a href="https://wa.me/573022953980" target="_blank">+57 3022953980</a></small>
    <small>Fusagasugá - Colombia</small>
</footer>
</body>
</html>