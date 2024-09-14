function validar(){
	console.log('Envio detenido');

	var Nombres = document.getElementById('nombres').value;
	var Apellidos = document.getElementById('apellidos').value;
	var Telefono = document.getElementById('telefono').value;
	var Direccion = document.getElementById('direccion').value;
	var Correo = document.getElementById('email').value;
	var Usuario = document.getElementById('usuario').value;
	var Password = document.getElementById('password').value;
	var Password2 = document.getElementById('password2').value;

	if (Nombres === " " || Nombres == 0){
		alert('Digite sus Nombres por favor');
		return false;
	}else if(Nombres.length > 30){
		alert('Los Nombres superan la longitud de 30 digitos');
		return false;
	}else if(!isNaN(Nombres)){
		alert('Los digitos no corresponden al tipo de campo');
		return false;
	}else if(Apellidos === ' ' || Apellidos == 0){
		alert('Digite sus Apellidos');
		return false;
	}else if(Apellidos.length > 30){
		alert('Los Apellidos superan la longitud de 30 digitos');
		return false;
	}else if(!isNaN(Apellidos)){
		alert('Los digitos no corresponden al tipo de campo');
		return false;

	}else if(Telefono === ' ' || Telefono == 0){
		alert('Digite su telefono');
		return false;
	}else if(isNaN(Telefono)){
		alert('el campo no corresponde a un numero de telefono');
		return false;
	}else if(Telefono.length > 20){
		alert('el campo supera la longitud de 20 caracteres');
		return false;
	}else if(!(/^\d{10}$/.test(Telefono))){
		alert('El numero de telefono debe ser de 10 digitos');
		return false;
	}else if ( Direccion === ' ' || Direccion == 0 ) {
		alert('Digite una direccion');
		return false;
	}else if (Direccion.length > 50) {
		alert('La direccion supera la longitud de 50 digitos');
		return false;
	}else if (Correo === ' ' || Correo == 0) {
		alert('Escriba un correo');
		return false;
	}else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)+$/.test(Correo))){
		alert('La dirección de correo electrónico no es valida.');
		return false;
	}else if (Correo.length > 45) {
		alert('La direcion de correo electronico supera la longitud de 45 digitos');
		return false;
	}else if (Usuario === " " || Usuario == 0) {
		alert('Digite un nombre de usuario');
		return false;
	}else if(Usuario.length >15){
		alert('El usuario supera la longitud de 15 digitos');
		return false;
	}else if (Password === " " || Password == 0) {
		alert('Digite una contraseña');
		return false;
	}else if (Password.length > 15) {
		alert('La contraseña supera la longitud de 15 digitos');
		return false;
	}else if (Password.length < 4) {
		alert('La contraseña tiene que ser mas larga.');
		return false;
	}else if (Password !== Password2) {
		alert('La contraseña No Concuerda');
		return false;
	}
}