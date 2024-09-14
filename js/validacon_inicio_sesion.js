function validarSesion(){

	console.log('Envio detenido');

	var usuario = document.getElementById('usuario').value;
	var password = document.getElementById('password').value;

	if (usuario === ' ' || usuario === null) {
		alert('complete el campo usuario');
		return false;

	}else if (password === ' ' || password === null) {
		alert('complete el campo contraseña');
		return false;
	}
}