<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="imagenes/Isotipo.ico">
	<title>Inicio de usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/es_login.css">
</head>

<div id="todo">
	<form action="procesos/gest_cuenta/validar_inicio_sesion.php" method="post">
		<div style="background-color:#CDCDCD; border-radius: 8px 8px 0px 0px; "> 
			<img src="imagenes/Isologo_Inicio.jpg">
			<p>Armamos Tu Software Ideal</p>
		</div>
		<h1>Ingreso de usuarios</h1>
			<input type="text" name="usuario" placeholder="&#128272; Usuario" id="usuario"><br>
			<input type="password" name="password" placeholder="&#128272; Contraseña" id="password" ><br>
			<input type="submit" name="Iniciar" value="Iniciar" onclick="return validarSesion()"><br>
		</form>
	</div>

<script type="text/javascript" src="js/validacon_inicio_sesion.js"></script>
</html>