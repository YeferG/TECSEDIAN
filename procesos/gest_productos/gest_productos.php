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
	<title>Gestion de Productos</title>
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

<div id= "menu3">
	<h2>INSERTAR PRODUCTOS</h2><br>
	<form method="post" action="gest_productos.php" id="forpro">
		<input type="submit" name="registrar" value="Guardar" id="gupro">

		<div class="conmenu">
			<label class="textlad">Descripcion: </label>
			<input type="text" name="descripcion" id="descripcion" required="" class="lad">
			<label class="textlad">Precio Compra: </label>
			<input type="number" name="pCompra" id="pCompra" required="" class="lad">
		</div>
		<div class="conmenu">
			<label class="textlad">Precio Venta: </label>
			<input type="number" name="pVenta" id="pVenta" required="" class="lad">
			<label class="textlad">Stock: </label>
			<input type="number" name="stock" id="stock" required="" class="lad">
		</div>
	</form>

	<?php 
		if (isset($_POST['registrar'])) {
			if (strlen($_POST['descripcion']) >=1) {
				$descripcion = $_POST['descripcion'];
				$pCompra = $_POST['pCompra'];
				$pVenta = $_POST['pVenta'];
				$stock = $_POST['stock'];
				$sql = "INSERT INTO tbl_productos(nom_produ,precio_compra,precio_venta,stock_produ) VALUES('$descripcion',$pCompra,$pVenta,$stock)";
				$query = mysqli_query($con,$sql);
			}
		}
	 	?>
</div>

<div id="busque">
	<h2 id="titulo_tabla">Productos Registrados</h2>
	<form id="buscompra">
        <input type ="text" name="busqueda" placeholder="&#128269; BUSCAR" class="bus">
        <input type ="submit" value="Buscar" class="busq">
    </form>
    <br>	
</div>

<div id="agrupar" style="width: 820px; height: 40%;">
<section id="contenido">

<table class="tablas">
	<thead>
		<tr >
			<th>Id</th>
			<th>Descripcion</th>
			<th>Precio Compra</th>
			<th>Precio Venta</th>
			<th>Stock</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<?php 
		$sql="SELECT * FROM tbl_productos";
		$query=mysqli_query($con,$sql);
		$i=0;
		while ($fila=mysqli_fetch_array($query)) {
			$id = $fila['id_produ'];
			$descripcion = $fila['nom_produ'];
			$pCompra = $fila['precio_compra'];
			$pVenta = $fila['precio_venta'];
			$stock = $fila['stock_produ'];
			$i++;
	?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $descripcion; ?></td>
		<td><?php echo '$' . $pCompra; ?></td>
		<td><?php echo '$' . $pVenta; ?></td>
		<td><?php echo $stock; ?></td>
		<td><a href="gest_productos.php?editar=<?php echo $id;?>">¿Editar?</a></td>
		<td><a href="gest_productos.php?eliminar=<?php echo $id; ?>">¿Eiminar?</a></td>
	</tr>
	<?php } ?>
</table >
	
</section>

</div>

<?php 
	if (isset($_GET['editar'])) {
	 	include_once('edit_productos.php');
	} 
		include_once('delete_productos.php');
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

