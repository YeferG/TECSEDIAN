<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/bd/coneccion.php');
session_start();

$usuario2 = trim($_POST['usuario']);
$password2 = trim($_POST['password']);
$consulta = "SELECT * FROM tbl_usuarios WHERE usuario_usu='$usuario2' AND pass_usu='$password2'"; 
$resultado = mysqli_query($con, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas > 0) {
    $_SESSION['usuario'] = $usuario2;
    $est = $resultado->fetch_assoc();
    $_SESSION['estadoUsu'] = $est['estadoUsu'];
    header("location: /pag_inicio.php");
} else {
    echo "<script>alert('Los datos no corresponden, intentelo nuevamente')</script>";
    echo "<script>window.open('/index.php','_self')</script>";
}
?>