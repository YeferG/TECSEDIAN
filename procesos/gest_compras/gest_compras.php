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
	<title>Gestion de Compras</title>
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
	<h2>INSERTE COMPRA</h2><br>
	<form method="POST" action="gest_compras.php" >
		<label>Proveedor: </label>
		<select name="cliente">
			<option value="">Seleccione</option>
			<?php $sql=$con->query("SELECT * FROM tbl_proveedores");
				while ($fila = $sql->fetch_array()) {
					echo "<option value='" . $fila['id_provee']."'>".$fila['nom_provee']."</option>";
				}
			?>
		</select>
		<label>Producto: </label>
		<select name="producto">
			<option value="">Seleccione</option>
			<?php $sql=$con->query("SELECT * FROM tbl_productos");
				while ($fila = $sql->fetch_array()) {
					echo "<option value='" . $fila['id_produ']."'>".$fila['nom_produ']."</option>";
				}
			?>
			</select>
		<label>Cantidad: </label><input type="number" name="cantidad" >
		<input type="submit" name="registrar3" value="Guardar">
	</form>

	<?php 
		$sql = "SELECT precio_compra FROM tbl_productos";
		$query = mysqli_query($con,$sql); 
		$filas = mysqli_fetch_array($query);
		$precio1 = $filas['precio_compra'];
		if (isset($_POST['registrar3'])) {
			date_default_timezone_set('America/Bogota');
			$fecha = date("Y/m/d H:i:s");
			$cliente = $_POST['cliente'];
			$Producto = $_POST['producto'];
			$cantidad = $_POST['cantidad'];
			$precio = $cantidad * $precio1;
			$insertar = " INSERT INTO tbl_compras (proveedor_id, producto_id, fecha_com, cant_com, precio_com) VALUES( $cliente, $Producto, '$fecha', $cantidad, $precio )";
			$ejecutar = mysqli_query($con,$insertar);
			
			if (!$ejecutar) {
				echo "La tarea NO se Ejecuto Correctamente" .'<br>';
				printf("Error: %s\n", mysqli_error($con));
	  			die();
			}else{
				echo "La Compra se Registro Correctamete ";
			}
		}	
	?>
</div> 

<div id="busque">
	<h2 id="titulo_tabla">Tabla De Compras</h2>
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
			<th>Fecha</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Proveedor</th>
			<th>Producto</th>
			<th>Accion</th>
		</tr>
	</thead>
	<?php 
		$sql="SELECT * FROM tbl_compras
			JOIN tbl_proveedores ON tbl_compras.proveedor_id = tbl_proveedores.id_provee
			JOIN tbl_productos ON tbl_compras.producto_id = tbl_productos.id_produ ORDER BY fecha_com desc";
		$query=mysqli_query($con,$sql);
		$i=0;
		while ($fila=mysqli_fetch_array($query)) {
			$id = $fila['compra_id'];
			$fecha = $fila['fecha_com'];
			$cantidad = $fila['cant_com'];
			$precio = $fila['precio_com'];
			$proveedor = $fila['nom_provee'];
			$producto = $fila['nom_produ'];
			$i++;
	?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $fecha; ?></td>
		<td><?php echo $cantidad; ?></td>
		<td><?php echo '$' . $precio; ?></td>
		<td><?php echo $proveedor; ?></td>
		<td><?php echo $producto; ?></td>
		<td><a href="gest_compras.php?eliminar=<?php echo $id; ?>">¿Eliminar?</a></td>
	</tr>
	<?php } ?>
	<?php 
		include_once('delete_compras.php');
	?>
</table >

</section>

<a href="proveedor.php"><input type="button" class="btn2" value="Cancelar"></a>
<a href="producto.php"><input type="button" class="btn3" value="Registrar"></a>

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