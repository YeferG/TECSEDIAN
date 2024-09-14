function validarBloqueo(){

console.log('Envio detenido');

var isChecked = document.getElementById('estado');

if (isChecked.checked) {
	alert('Se deshabilito el usuario correctamente');
}else{
	alert('seleccione un usuario');
	return false;
}

}