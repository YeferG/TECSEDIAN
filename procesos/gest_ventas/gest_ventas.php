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
	<title>Gestion de Ventas</title>
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
	<h2>INSERTE VENTA</h2><br>
	<form method="POST" action="gest_ventas.php" >
		<label>Cliente: </label>
		<select name="cliente">
			<option value="">Seleccione</option>
				<?php $sql=$con->query("SELECT * FROM tbl_clientes");
					while ($fila = $sql->fetch_array()) {
						echo "<option value='" . $fila['id_cli']."'>".$fila['nom_cli']."</option>";
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
		<input type="submit" name="registrar" value="Guardar">
	</form>

	<?php 
		$sql = "SELECT id_produ FROM tbl_productos";
		$query = mysqli_query($con,$sql); 
		$filas = mysqli_fetch_array($query);
		$precio_pro = $filas['id_produ'];
		if (isset($_POST['registrar'])) {
			date_default_timezone_set('America/Bogota');
			$fecha = date("Y/m/d H:i:s");
			$cliente = $_POST['cliente'];
			$Producto = $_POST['producto'];
			$cantidad = $_POST['cantidad'];
			$precio = $cantidad * $precio_pro;
			$insertar = " INSERT INTO tbl_ventas (cliente_id, producto_id, fecha_ven, cant_ven, precio_ven) VALUES( $cliente, $Producto, '$fecha', $cantidad, $precio)";
			$ejecutar = mysqli_query($con,$insertar);
	
			if (!$ejecutar) {
				echo " no se ejecuto correctamente" .'<br>';
				printf("Error: %s\n", mysqli_error($con));
				die();
			}else{
				echo "La Venta se Registro Correctamete ";
			}
		}	
	?>
</div> 

<div id="busque">
	<h2 id="titulo_tabla">Tabla De Ventas</h2>
    <form id="buscompra">
	    <input type ="text" name="busqueda" placeholder="&#128269; BUSCAR" class="bus">
        <input type ="submit" value="Buscar" class="busq">
    </form>
    <br>
</div>

<div id="agrupar"  style="width: 820px; height: 40%;">
<section id="contenido">

<table class="tablas">
	<thead>
		<tr>
			<th>Id</th>
			<th>Fecha</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Cliente</th>
			<th>Producto</th>
			<th>Accion</th>
		</tr>
	</thead>
	<?php 
		$sql="SELECT * FROM tbl_ventas 
			JOIN tbl_clientes ON tbl_ventas.cliente_id = tbl_clientes.id_cli
			JOIN tbl_productos ON tbl_ventas.producto_id = tbl_productos.id_produ ORDER BY fecha_ven desc";

		
		$query=mysqli_query($con,$sql);
		$i=0;
		while ($fila=mysqli_fetch_array($query)) {
			$id = $fila['venta_id'];
			$fecha = $fila['fecha_ven'];
			$cantidad = $fila['cant_ven'];
			$precio = $fila['precio_venta'];
			$cliente = $fila['nom_cli'];
			$producto = $fila['nom_produ'];
			$i++;
	?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $fecha; ?></td>
		<td><?php echo $cantidad; ?></td>
		<td><?php echo '$' . $precio; ?></td>
		<td><?php echo $cliente; ?></td>
		<td><?php echo $producto; ?></td>
		<td><a href="gest_ventas.php?eliminar=<?php echo $id; ?>">¿Eliminar?</a></td>
	</tr>
	<?php } ?>
	<?php 
		include_once('delete_ventas.php');
	?>	
</table >

</section>
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