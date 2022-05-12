<?php
$correo =$_POST['correo'];
$contrasena = $_POST['contrasena'];
session_start();
$_SESSION['usuario']=$correo;

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}

$mysql->set_charset("utf8");
$consulta="SELECT USER, PASSWORD FROM usuarios where USER ='$correo' and PASSWORD='$contrasena'";
$resultado = $mysql->query($consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    if($correo == "godinezlunac@gmail.com" && $contrasena == "Carlos3210."){
        echo "<script> alert('Se inicio correctamente la sesión');
            location.href='inicio.php';
                </script>";
    }
    else{
        echo "<script> alert('Se incio correctamente al modo administrador');
            location.href='admin.php';
                </script>";
    }
}else{
    echo "<script> alert('Contrasena o Email incorrectos');
            location.href='Bienvenida.php';
                </script>";
}
mysqli_free_result($resultado);
mysqli_close($mysql);