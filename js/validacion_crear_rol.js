function validarRol(){

	console.log('Envio detenido');

	var rol = document.getElementById('rol').value;
	var crear = document.getElementById('privCrear').checked;
	var editar = document.getElementById('privEditar').checked;
	var consultar = document.getElementById('privConsultar').checked;
	var eliminar = document.getElementById('privEliminar').checked;

	if (rol === ' ' || rol == 0) {
		alert('Escriba un nombre para el rol');
		return false;

	}else if (!isNaN(rol)) {
		alert('Los digitos no corresponden al tipo de campo');
		return false;

	}else if (rol.lenght > 15) {
		alert('El nombre del rol supera la longitud de 15 digitos');
		return false;

	}else if (!(crear || editar || consultar || eliminar)) {
		alert('seleccione un privilegio');
		return false;

	}else{
		alert('Rol creado');
	}
}