<?php
$ip = $_POST['ip'];
$descripcion = $_POST['descripción'];

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$insertar = "INSERT INTO monitoreo VALUES(NUMBER,'$ip','$descripcion')";
$resultado = $mysql->query($insertar);

if($resultado){
    echo "<script> alert('Se guardo correctamente'); location.href='admin.php';</script>";
}
else{
    echo "<script> alert('No se guardo correctamente'); location.href='admin.php'; </script>";

}