<?php 
require('../modelo/metodosCRUD.php');

$n=$_POST['nombre'];
$a=$_POST['apellido'];
$t=$_POST['telefono'];
$s=$_POST['sexo'];
$c=$_POST['correo'];

$sql="INSERT INTO persona(nombre,apellido,telefono,sexo,correo) values ('$n','$n','$t','$s','$c') ";

$obj=new metodos();
echo $obj->insertar($sql);

?>