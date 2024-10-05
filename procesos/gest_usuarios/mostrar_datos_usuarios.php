<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');

	$consulta="SELECT * FROM tbl_usuarios";
	$ejecutar=mysqli_query($con,$consulta);
	$i=0;
	while ($fila=mysqli_fetch_array($ejecutar)) {

		$id=$fila['id_usu'];
		$nombres=$fila['nom_usu'];
		$apellidos=$fila['ape_usu'];
		$telefono=$fila['tel_usu'];
		$direccion=$fila['dir_usu'];
		$correo=$fila['cor_usu'];
		$rol=$fila['rol_usu'];
		$usuario=$fila['usuario_usu'];
		$estado = $fila['estado_usu'];
		$fecha_reg = $fila['fechareg_usu'];
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