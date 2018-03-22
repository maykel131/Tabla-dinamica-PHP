<?php 
 class metodos{
	private $servidor="localhost";
    private $usuario="root";
    private $password="";
    private $bd="cadastrar";
  

   
	
 public function conectionMetodo(){
      $con = mysqli_connect($this->servidor,
      	                    $this->usuario,
      	                    $this->password,
      	                    $this->bd);

     return $con;
}

	
 public function insertar($sql){
   
 	
 	$resul=mysqli_query($this->conectionMetodo(),$sql);
    
 	return $resul;
 }

 public function delete($sql){
    	
 	$resul=mysqli_query($this->conectionMetodo(),$sql);

 	return $resul;
 }

 public function modificar($sql){ 
 	
 	$resul=mysqli_query($this->conectionMetodo(),$sql);

 	return $resul;
 }

 public function mostrar($sql){
   
 	$resul=mysqli_query($this->conectionMetodo(),$sql);
 	mysqli_close($this->conectionMetodo());

  return $resul;
 }



}


 


?>
