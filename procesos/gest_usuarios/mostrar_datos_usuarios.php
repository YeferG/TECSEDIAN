<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');

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
		$fecha_reg = $fila['fechaRegistroUsu'];
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
		<td><?php echo $fecha_reg;?></td>
		<td class="edit"><a href="form_editar_usuarios.php?editar=<?php echo $id;?>">¿Editar?</a>
		</td>
	</tr>
	
	
<?php }
?>