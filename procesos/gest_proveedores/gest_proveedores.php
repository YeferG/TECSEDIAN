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
	<title>Gestion de Proveedores</title>
	<link rel="icon" href="/imagenes/logo1.ico">
	<link rel="stylesheet" type="text/css" href="/css/es_menu_emergente.css">
	<link rel="stylesheet" type="text/css" href="/css/es_footer.css">
	<link rel="stylesheet" type="text/css" href="/css/es_tablas.css">
	<link rel="stylesheet" type="text/css" href="/css/es_form_emer_prov.css">
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


<!-- Botón para abrir el formulario modal -->
<button id="open-modal-btn">Agregar Proveedores</button>

<!-- Overlay para la ventana modal -->
<div id="modal-overlay"></div>

<!-- Formulario dentro de la ventana modal -->
<div id="form_agregar_proveedor">
    <h2>INGRESAR PROVEEDORES</h2>
    <form method="post" action="gest_proveedores.php">
        <!-- Línea 1: Nombre y Teléfono -->
        <div class="conmenu">
            <label for="proveedor" class="textlad">Nombre: </label>
            <input type="text" name="proveedor" id="proveedor" required="" class="lad">
        </div>
        <div class="conmenu">
            <label for="telefono" class="textlad">Teléfono: </label>
            <input type="text" name="telefono" id="telefono" required="" class="lad">
        </div>

        <!-- Línea 2: Dirección -->
        <div class="conmenu">
            <label for="direccion" class="textlad">Dirección: </label>
            <input type="text" name="direccion" id="direccion" class="lad">
        </div>

        <!-- Línea 3: Correo (label y input en renglones diferentes) -->
        <div class="conmenu">
            <label for="correo" class="textlad">Correo: </label>
        </div>
        <div class="conmenu">
            <input type="text" name="correo" id="correo" class="lad">
        </div>

        <!-- Botón Guardar -->
        <input type="button" name="registrar4" value="Guardar" id="gupro" action="submit">
        <button id="close-modal-btn">Cerrar</button>
    </form>

    <?php 
    if (isset($_POST['registrar4'])) {
        if (strlen($_POST['proveedor']) >= 1) {
            $proveedor = $_POST['proveedor'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];
            $sql = "INSERT INTO tbl_proveedores(nom_provee, tel_provee, dir_provee, cor_provee) VALUES('$proveedor','$telefono','$direccion','$correo')";
            $query = mysqli_query($con,$sql);
        }
    }
    ?>
</div>


<script>
// Obtener elementos del DOM
const openModalBtn = document.getElementById('open-modal-btn');
const closeModalBtn = document.getElementById('close-modal-btn');
const modalOverlay = document.getElementById('modal-overlay');
const modal = document.getElementById('form_agregar_proveedor');

// Función para abrir el modal
openModalBtn.addEventListener('click', function() {
    modal.style.display = 'block';
    modalOverlay.style.display = 'block';
});

// Función para cerrar el modal
closeModalBtn.addEventListener('click', function() {
    modal.style.display = 'none';
    modalOverlay.style.display = 'none';
});

// Cerrar modal cuando se hace clic fuera del formulario
modalOverlay.addEventListener('click', function() {
    modal.style.display = 'none';
    modalOverlay.style.display = 'none';
});
</script>


<div id="busque">
	<h2 id="titulo_tabla">Tabla Proveedores</h2>
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
        		<tr>
        			<th>Id</th>
        			<th>Nombre</th>
        			<th>Telefono</th>
        			<th>Direccion</th>
        			<th>Correo</th>
        			<th>Editar</th>
        			<th>Eliminar</th>
        		</tr>
        	</thead> 
        	<?php 
        		$sql="SELECT * FROM tbl_proveedores";
        		$query=mysqli_query($con,$sql);
        		$i=0;
        		while ($fila=mysqli_fetch_array($query)) {
        			$id = $fila['id_provee'];
        			$nombre = $fila['nom_provee'];
        			$telefono = $fila['tel_provee'];
        			$direccion = $fila['dir_provee'];
        			$correo = $fila['cor_provee'];
        			$i++;
        	?>
        	<tr>
        		<td><?php echo $id; ?></td>
        		<td><?php echo $nombre; ?></td>
        		<td><?php echo $telefono; ?></td>
        		<td><?php echo $direccion; ?></td>
        		<td><?php echo $correo; ?></td>
        		<td><a href="gest_proveedores.php?editar=<?php echo $id;?>">¿Editar?</a></td>
        		<td><a href="gest_proveedores.php?eliminar=<?php echo $id; ?>">¿Eliminar?</a></td>
        	</tr>
        	<?php } ?>
        </table>
    </section>
</div>
<?php
	if (isset($_GET['editar'])) {
		include_once('edit_proveedores.php');
	} 
	include_once'delete_proveedores.php';
?>


<footer>
    <small>Contáctanos</small>
    <small>Línea telefónica: 123456789</small>
    <small>Correo: <a href="mailto:ejemplo@mail.com">ejemplo@mail.com</a></small>
    <small>WhatsApp: <a href="https://wa.me/573022953980" target="_blank">+57 3022953980</a></small>
    <small>Fusagasugá - Colombia</small>
</footer>


</body>
</html>