<?php
$id = $_GET ['id'];
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$uni= $_POST['uni'];
$total = $_POST['total'];

require 'db.php';
$mysql = new mysqli(SERVER,USUARIO,PASWD,BD);
if ($mysql->connect_error){
    die("No me pude conectar; error: ".$mysql->connect_errno. "interpretacion: ".$mysql->connect_error);
}
$mysql->set_charset("utf8");

$actualizar = "UPDATE reportventas SET TIPO='$tipo',MARCA='$marca', UNIDAD_VEND='$uni'
                ,MONTO_TOTAL='$total' WHERE Id_Reportes ='$id'";

$resultado = $mysql->query($actualizar);

if($resultado){
    echo "<script> alert('Se actualizo correctamente'); location.href='inicio.php';</script>";
}
else{
    echo "<script> alert('No se actualizo correctamente'); location.href='inicio.php'; </script>";

}