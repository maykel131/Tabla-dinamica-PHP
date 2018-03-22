<?php
 require ('../modelo/metodosCRUD.php');

 $obj=new metodos();

 $sql="SELECT * FROM persona";
 
 $resul= $obj->mostrar($sql);

 ?>



<div>
	<table id="tabla1" class="table table-hover" >
		<thead style="background-color: black;color: white; font-weight: bold;">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Telefono</td>
				<td>Sexo</td>
				<td>Correo</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: black;color: white; font-weight: bold;">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Telefono</td>
				<td>Sexo</td>
				<td>Correo</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody>
		   <?php while($fila = mysqli_fetch_array($resul) ){ 
              $cadena= $fila['id']."||"
                      .$fila['nombre']."||"
                      .$fila['apellido']."||"
                      .$fila['telefono']."||"
                      .$fila['sexo']."||"
                      .$fila['correo'];

		   	?>
			<tr>
				<td><?php echo $fila['id']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
				<td><?php echo $fila['apellido']; ?></td>
				<td><?php echo $fila['telefono']; ?></td>
				<td><?php echo $fila['sexo']; ?></td>
				<td><?php echo $fila['correo']; ?></td>
				<td><div class="btn btn-warning" data-toggle="modal" data-target="#modalupdate"  
					onclick="agregarForm('<?php echo  $cadena ?>')">
					 <span class="fa fa-pencil"></span>
				    </div>
			    </td>
				<td><div onclick="deleteFunction('<?php echo $fila['id']; ?>')" class="btn btn-danger"><span class="fa fa-trash"></span></div></td>
			</tr>
			<?php 
              }
			 ?>
		</tbody>
	</table>
	
</div>
<script type="text/javascript">
	$(document).ready( function (){
   	 $('#tabla1').DataTable();
	});
</script>