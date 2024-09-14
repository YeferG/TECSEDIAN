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
	<title>Gestion de Compras</title>
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
	<h2>INSERTE COMPRA</h2><br>
	<form method="POST" action="gest_compras.php" >
		<label>Proveedor: </label>
		<select name="cliente">
			<option value="">Seleccione</option>
			<?php $sql=$con->query("SELECT * FROM tproveedores");
				while ($fila = $sql->fetch_array()) {
					echo "<option value='" . $fila['idProv']."'>".$fila['nombreProv']."</option>";
				}
			?>
		</select>
		<label>Producto: </label>
		<select name="producto">
			<option value="">Seleccione</option>
			<?php $sql=$con->query("SELECT * FROM Tproductos");
				while ($fila = $sql->fetch_array()) {
					echo "<option value='" . $fila['proId']."'>".$fila['proNombre']."</option>";
				}
			?>
			</select>
		<label>Cantidad: </label><input type="number" name="cantidad" >
		<input type="submit" name="registrar3" value="Guardar">
	</form>

	<?php 
		$sql = "SELECT proPreCom FROM tproductos";
		$query = mysqli_query($con,$sql); 
		$filas = mysqli_fetch_array($query);
		$precio1 = $filas['proPreCom'];
		if (isset($_POST['registrar3'])) {
			date_default_timezone_set('America/Bogota');
			$fecha = date("Y/m/d H:i:s");
			$cliente = $_POST['cliente'];
			$Producto = $_POST['producto'];
			$cantidad = $_POST['cantidad'];
			$precio = $cantidad * $precio1;
			$insertar = " INSERT INTO tcompras (idProv, proId, fechaCom, cantidadCom, preCom) VALUES( $cliente, $Producto, '$fecha', $cantidad, $precio )";
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
		$sql="SELECT * FROM Tcompras
			JOIN tproveedores ON Tcompras.idProv = tproveedores.idProv
			JOIN tproductos ON Tcompras.proId = tproductos.proId ORDER BY fechaCom desc";
		$query=mysqli_query($con,$sql);
		$i=0;
		while ($fila=mysqli_fetch_array($query)) {
			$id = $fila['idCom'];
			$fecha = $fila['fechaCom'];
			$cantidad = $fila['cantidadCom'];
			$precio = $fila['preCom'];
			$proveedor = $fila['nombreProv'];
			$producto = $fila['proNombre'];
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

<footer id="pie">
	<small>Contactanos</small><br>
	<small>Linea telefonica  10034822203 Bogota-colombia.</small><br>
	<small>correo tecsedian.soft@gmail.com</small><br>
	<small>WhatsApp +57 3102692032 o +57 3042050035.</small>
</footer>
</body>
</html>