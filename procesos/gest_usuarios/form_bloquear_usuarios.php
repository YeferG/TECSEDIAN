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
	<title>Bloquear Usuarios</title>
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
		$consulta="SELECT * FROM tbl_usuarios";
		$ejecutar=mysqli_query($con,$consulta);
		$i=0;
			while ($fila=mysqli_fetch_array($ejecutar)) {
				$id=$fila['id_usu'];
				$nombres=$fila['nom_usu'];
				$apellidos=$fila['ape_usu'];
				$rol=$fila['rol_usu'];
				$usuario=$fila['usuario_usu'];
				$estado = $fila['estado_usu'];
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
              <input type="checkbox" name="si<?=$fila["id_usu"]; ?>">
              <input type="hidden" value="<?= $fila["id_usu"]; ?>" name="no[]">        
        <?php 
        }?>
        <?php
	    if ($estado =='Bloqueado')
		{?> 
              <input type="checkbox" checked name="si<?=$fila["id_usu"]; ?>">
              <input type="hidden" value="<?= $fila["id_usu"]; ?>" name="no[]">
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


 
<footer>
    <small>Contáctanos</small>
    <small>Línea telefónica: 123456789</small>
    <small>Correo: <a href="mailto:ejemplo@mail.com">ejemplo@mail.com</a></small>
    <small>WhatsApp: <a href="https://wa.me/573022953980" target="_blank">+57 3022953980</a></small>
    <small>Fusagasugá - Colombia</small>
</footer>


</body>				
</html>