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
	<title>Bloquear Usuarios</title>
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
	<h2> Des/Activa los usuarios &#128273;</h2>
</div>

<br>

<div  id="agrupar"  style="width: 820px; height: 40%;">
<section id="contenido">

<table class="tablas">
	<thead>
		<th>Id</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Rol</th>
		<th>Usuario</th>
		<th>Estado</th>
		<th>Bloquear</th>
	</thead>
	  <form action="estado_usuarios.php" method="POST">
	<?php 
		include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');
		$consulta="SELECT * FROM tusuario";
		$ejecutar=mysqli_query($con,$consulta);
		$i=0;
			while ($fila=mysqli_fetch_array($ejecutar)) {
				$id=$fila['idUsu'];
				$nombres=$fila['nombresUsu'];
				$apellidos=$fila['apellidosUsu'];
				$rol=$fila['rolUsu'];
				$usuario=$fila['usuarioUsu'];
				$estado = $fila['estadoUsu'];
				$i++;
	?>
	
  
	<tr>
		<td><?php echo $id;?></td>
		<td><?php echo $nombres;?></td>
		<td><?php echo $apellidos;?></td>
		<td><?php echo $rol;?></td>
		<td><?php echo $usuario;?></td>
		<td><?php echo $estado;?></td>
		<td><?php
		if ($rol==1) {
		 echo 'Sup. Usuario';
		}else if ($estado =='Activo')
		{?>    
              <input type="checkbox" name="si<?=$fila["idUsu"]; ?>">
              <input type="hidden" value="<?= $fila["idUsu"]; ?>" name="no[]">        
        <?php 
        }?>
        <?php
	    if ($estado =='Bloqueado')
		{?> 
              <input type="checkbox" checked name="si<?=$fila["idUsu"]; ?>">
              <input type="hidden" value="<?= $fila["idUsu"]; ?>" name="no[]">
        <?php 
        }?>


         </td>
	
	
	</tr>
	
	<?php }
	?>
</table>

<script src="js/validacion_form_bloq_user.js"></script>

</section>
 <button type="submit" class="btn3">Enviar</button>
</form>
<a href="consultar_usuarios.php"><input type="button" class="btn2" value="Cancelar"></a>

</div>


 
<footer id="pie">
	<small>Contactanos</small><br>
	<small>Linea telefonica  10034822203 Bogota-colombia.</small><br>
	<small>correo tecsedian.soft@gmail.com</small><br>
	<small>WhatsApp +57 3102692032 o +57 3042050035.</small>
</footer>
</body>				
</html>