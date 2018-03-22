<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php require("scripts.php");  ?>
</head>
<body>
  <div class="container">

    <div class="card text-left">
      <div class="card-header">
        Featured
      </div>
      <div class="card-body">
        <div class="btn btn-primary" data-toggle="modal" data-target="#modalagregar">Agregar <span class="fa fa-plus-circle"></span></div>
        <div id="tabla"></div>
      </div>
      <div class="card-footer text-muted">
        Derechos reservados de autor Maykel Trejo
      </div>
    </div>
  </div>



  <!-- Modal agregar -->
  <div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formInsert">
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
            <label>Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control">
            <label>Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
            <label>Sexo</label>
            <select id="sexo" name="sexo" class="form-control">
               <option value="" >-SELECCIONE-</option>
               <option value="F">FEMENINO</option>
               <option value="M">MASCULINO</option>
            </select>
            <label>Correo</label>
            <input type="text" name="correo" id="correo" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button id="btnAgregar" type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal update -->
  <div class="modal fade" id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <form id="formUpdate">
            <input type="text" hidden="" name="idU" id="idU" class="form-control">
            <label>Nombre</label>
            <input type="text" name="nombreU" id="nombreU" class="form-control">
            <label>Apellido</label>
            <input type="text" name="apellidoU" id="apellidoU" class="form-control">
            <label>Telefono</label>
            <input type="text" name="telefonoU" id="telefonoU" class="form-control">
            <label>Sexo</label>
            <select id="sexoU" name="sexoU" class="form-control">
               <option value="" >-SELECCIONE-</option>
               <option value="F">FEMENINO</option>
               <option value="M">MASCULINO</option>
            </select>
            <label>Correo</label>
            <input type="text" name="correoU" id="correoU" class="form-control">
          </form>
          
        </div>
        <div class="modal-footer">
          <button id="btnUpdate" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('vistas/tabla.php');
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregar').click(function(){

			if($('#nombre').val()!=""){
				if($('#apellido').val()!=""){
					if($('#telefono').val()!=""){
						if($('#sexo').val()!=""){
							if($('#correo').val()!=""){

								datos=$('#formInsert').serialize();
								$.ajax({
									type:"POST",
									data:datos,
									url:"procesos/agregar.php",
									success:function(r){
										if (r==1) {
											$('#tabla').load('vistas/tabla.php');
											alertify.success("Agregado con exito");
										}else{
											alertify.error("Error en el servidor");
										}
										$('#formInsert')[0].reset();
									}
								});

							}else alertify.error("Llene todos los campos");     
						}else alertify.error("Llene todos los campos");
					}else alertify.error("Llene todos los campos");
				}else alertify.error("Llene todos los campos");
			}else alertify.error("Llene todos los campos");
		});
	});

	$(document).ready(function(){
		$('#btnUpdate').click(function(){

			if($('#nombreU').val()!=""){
				if($('#apellidoU').val()!=""){
					if($('#telefonoU').val()!=""){
						if($('#sexoU').val()!=""){
							if($('#correoU').val()!=""){

								datos=$('#formUpdate').serialize();
								$.ajax({
									type:"POST",
									data:datos,
									url:"procesos/update.php",
									success:function(r){
										if (r==1) {
											$('#tabla').load('vistas/tabla.php');
											alertify.success("Actualizado con exito");
										}else{
											alertify.error("Error en el servidor");
										}
										$('#formUpdate')[0].reset();
									}
								});

							}else alertify.error("Llene todos los campos");     
						}else alertify.error("Llene todos los campos");
					}else alertify.error("Llene todos los campos");
				}else alertify.error("Llene todos los campos");
			}else alertify.error("Llene todos los campos");
		});
	});
</script>


<script type="text/javascript">
  function agregarForm(cadena){

   var d=cadena.split('||');

    $('#idU').val(d[0]);
    $('#nombreU').val(d[1]);
    $('#apellidoU').val(d[2]);
    $('#telefonoU').val(d[3]);
    $('#sexoU').val(d[4]);
    $('#correoU').val(d[5]);

  }

  function deleteFunction(id){
  	alertify.confirm('Eliminar datos', '¿ Esta seguro que desea eliminar?', function(){ 		
  		$.ajax({
  			type:"POST",
  			data:"ide="+id,
  			url:"procesos/delete.php",
  			success:function(r){
  				if (r==1) {
  					$('#tabla').load('vistas/tabla.php');
  					alertify.success("Eliminado con exito");
  				}else{
  					alertify.error("Error en el servidor");
  				}
  				$('#formInsert')[0].reset();
  			}
  		}); }
  		, function(){ alertify.error('Cancelo')});
  }
</script>

