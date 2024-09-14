<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="imagenes/logo1.ico">
	<title>Asignar roles</title>
	<link rel="stylesheet" type="text/css" href="css/for3.css">
	
</head>
<body>
<br>
	<div id="container">
 	<h2>Asigne los roles correspondinetes &#128084;</h2>
 		<table id="tab">
 	<?php
include_once('bd/coneccion.php');?>
                
 	                        <th> Id </th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Usuario</th>
							<th>Estado</th>
							<th>Fecha de registro</th>
							<th>Rol</th>
							
					<?php 
include_once('bd/coneccion.php');
    $consulta="SELECT * FROM tusuario";
	$ejecutar=mysqli_query($con,$consulta);
	$i=0;
	while ($fila=mysqli_fetch_array($ejecutar)) {
		$id=$fila['idUsu'];
		$nombres=$fila['nombresUsu'];
		$apellidos=$fila['apellidosUsu'];
		$usuario=$fila['usuarioUsu'];
		$estado = $fila['estadoUsu'];
		$fechaRegistro=$fila['fechaRegistroUsu'];
		$i++;
		?>
        <tr>
		<td><?php echo $id;?></td>
		<td><?php echo $nombres;?></td>
		<td><?php echo $apellidos;?></td>
		<td><?php echo $usuario;?></td>
		<td><?php echo $estado;?></td>
		<td><?php echo $fechaRegistro;?></td>
		<td><select class="bu">
							<option>Seleccione</option>
				     		<option>Super Usuario</option>
				     		<option>Administrador</option>
				     		<option>Vendedor</option>
				     		<option>Cajero</option>
				     	</select>
		</td>
	</tr>
<?php }
?>
		</table><br><br>
		<button class="btns"><a href="tabla_de_roles.php"> Cancelar</button></a>
		<a href="Gestion_de_usuarios.php">
		<input type="submit"  value="Asignar roles" onclick="men()" ></a>
		<script>
   function men(){
   	alert("Los roles seran asignados segun lo selecionado");
   }
</script>
		</div>
</body>				
</html>