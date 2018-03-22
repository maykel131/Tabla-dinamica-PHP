<?php 
require('../modelo/metodosCRUD.php');

$ide=$_POST['idU'];
$n=$_POST['nombreU'];
$a=$_POST['apellidoU'];
$t=$_POST['telefonoU'];
$s=$_POST['sexoU'];
$c=$_POST['correoU'];

$sql="UPDATE persona set nombre='$n', 
					   apellido='$a',  
					   telefono='$t', 
					      sexo='$s',
					   correo='$c'  where id =$ide ";

$obj=new metodos();
echo $obj->modificar($sql);

?>
