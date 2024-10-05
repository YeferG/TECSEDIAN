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

		<link rel="stylesheet" type="text/css" href="css/es_menu_emergente.css">

		<link rel="stylesheet" type="text/css" href="css/es_footer.css">

	</head>

<body class="cont" id="cuerpo">

<header id="cabecera">
    <img src="/imagenes/Logo.png" alt="Logo de la empresa">
    <div id="navegacion">
        <nav id="menu">
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
        </nav>
    </div>
    <div id="nombre-usuario">
        <h2>Bienvenido: <?php echo $_SESSION['usuario']; ?></h2>
        <a href="/procesos/gest_cuenta/cerrar_sesion.php">
            <button class="btn-cerrar-sesion">CERRAR SESION</button>
        </a>
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
    <small>Contáctanos</small>
    <small>Línea telefónica: 123456789</small>
    <small>Correo: <a href="mailto:ejemplo@mail.com">ejemplo@mail.com</a></small>
    <small>WhatsApp: <a href="https://wa.me/573022953980" target="_blank">+57 3022953980</a></small>
    <small>Fusagasugá - Colombia</small>
    

</footer>

<!-- Link para FontAwesome (opcional si incluyes iconos) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>