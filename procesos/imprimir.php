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
	<link rel="icon" href="../imagenes/logo1.ico">
	<title>formulario para imprimir</title>
	<!-- <link rel="stylesheet" type="text/css" href="../css/for2.css"> -->

	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos_menu.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos_tablas.css">
</head>

<body>
<header id="cabecera">
	<img src="../imagenes/Logo.png">
	<div id="navegar">
		<nav id="menu">
			<h2 id="nom">Bienvenido: <?php echo  $_SESSION['usuario']?><a href="procesos/cerrar.php"><button class="tn">CERRAR SESION</button></a></h2><br>
			<ul class="nav">
				<li><a href="" >Inicio</a></li>
				<li><a style="width:102px;" href="" >Inventario</a>
					<ul>
						<li><a href="../ventas.php">Ventas</a></li>
						<li><a href="../compras.php">Compras</a></li>
						<li><a href="../producto.php">Productos</a></li>
						<li><a href="../proveedor.php">Provedores</a></li>
						<li><a href="../cliente.php">Clientes</a></li>
					</ul>
				</li>
				<li><a style="width:155px;" href="" >Reportes</a>
					<ul>
						<li><a href="../libreri/pdf.php">Reporte usuarios</a></li>
						<li><a href="../libreri/pdf2.php">Reporte ventas</a></li>
						<li><a href="../libreri/pdf3.php">Reporte compras</a></li>
						<li><a href="../libreri/pdf4.php">Reporte producto</a></li>
					</ul>
				</li>
				<li><a href="">Gestion de usuarios</a>
					<ul>
						<li><a style="width:180px;" href="../Gestion_de_usuarios.php">Consultar usuarios</a></li>
						<li><a href="../form_crear_usuarios.php">Crear usuario</a></li>
						<li><a href="../form_bloquear_usuario.php">Bloquear usuario</a></li>
						<li><a href="../form_crear_rol.php">Crear rol</a></li>
						<li><a href="../procesos/imprimir.php">Generar reporte</a></li>
					</ul>
				</li>
			</ul>	
		</nav>
	</div>
</header>

<div id= "menuimpr">
	<h2 id="titu1impr">Seleccione los datos para imprimir &#128424;</h2><br>
	<div id="conformimpr"> 
		<h3 id="titulo_tabla">Seleccione el tipo busqueda: </h3>
		<form id="buscompra">
			<select class="bu">
				<option>Nombres</option>
				<option>Apellidos</option>
				<option>Id</option>
				<option>Estado</option>
				<option>Usuario</option>
				<option>Rol</option>
				<option>Fecha</option>
			</select>
			<input type ="text" name="busqueda" placeholder="&#128269; BUSCAR" class="bus">
			<input type ="submit" value="Buscar" class="busq">
		</form>
	</div>
</div>
<br>

<div id="agrupar">
<section id="contenido">

<?php	include_once('../bd/coneccion.php');?>	
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
		</tr>
	</thead>
	<?php 
		include_once('../bd/coneccion.php');
			$consulta="SELECT * FROM tusuario";
			$ejecutar=mysqli_query($con,$consulta);
			$i=0;
			while ($fila=mysqli_fetch_array($ejecutar)) {
				$id=$fila['idUsu'];
				$nombres=$fila['nombresUsu'];
				$apellidos=$fila['apellidosUsu'];
				$telefono=$fila['telefonoUsu'];
				$direccion=$fila['direccionUsu'];
				$correo=$fila['correoUsu'];
				$rol=$fila['rolUsu'];
				$usuario=$fila['usuarioUsu'];
				
				$estado = $fila['estadoUsu'];
				$fechaRegistro=$fila['fechaRegistroUsu'];
				$i++;
	?>
    <tr>
		<td><?php echo $id;?></td>
		<td><?php echo $nombres;?></td>
		<td><?php echo $apellidos;?></td>
		<td><?php echo $telefono;?></td>
		<td><?php echo $direccion;?></td>
		<td><?php echo $correo;?></td>
		<td><?php echo $rol;?></td>
		<td><?php echo $usuario;?></td>
		<td><?php echo $estado;?></td>
		<td><?php echo $fechaRegistro;?></td>
	</tr>
	<?php }	?>
</table>

</section>
<br>



<script>
	function men(){
		alert("Los datos seran mostrados en los archivos selecionados");
	}
</script>
<div id="generar">
	<a href="../Gestion_de_usuarios.php"><button class="busq" style="border-radius: 3px 0px 0px 3px; border:1px solid black;">Cancelar</button></a>
	<td><font color="black">EXEL<input type="checkbox" name="estado" ></td>
	<td><font color="black">PDF<input type="checkbox" name="estado1" ></td>
	<a href="../Gestion_de_usuarios.php"> <button class="busq" style="border-radius: 0px 3px 3px 0px; width: 115px; border:1px solid black;" type="submit" onclick="men()" >Generar archivo</button></a>
</div>
</div>

<footer>
	<small>Contactanos</small><br>
	<small>Linea telefonica  10034822203 Bogota-colombia.</small><br>
	<small>correo tecsedian.soft@gmail.com</small><br>
	<small>WhatsApp +57 3102692032 o +57 3042050035.</small>
</footer>
</body>				
</html>