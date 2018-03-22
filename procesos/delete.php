<?php 
require('../modelo/metodosCRUD.php');

$id=$_POST['ide'];

$sql="DELETE FROM persona where id= '$id'";


$obj=new metodos();
echo $obj->delete($sql);

?>