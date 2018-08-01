<!--AUTOR: Arley Fellipe-->
<?php 
require("config/Class.system.php");


	$consultar = new data_base_system;
	
	
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	  <link rel="shortcut icon" href="img/favicon.ico" >

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  
	  <link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<script language="javascript" src="js/interations.js"></script>
	  <script language="javascript"
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	  
	  <title>MyTest</title>
	 
  </head>
  <body>
    <script type="text/javascript">
  
	  </script>
	 
	  
	  <!--corpo-->
	  
	  
	  <!--corpo home-->
	  
	 
	  
		  <div class="collapse show" id="home">
  <div class="card card-body">
    
	  
	  <div style="padding-top: 10px;"></div>
	  <center>
	  <h1>VERIFICAÇÃO DE EMAIL!</h1>
		 <div style="max-width: 600px;">
		  
			 <img src="img/mytest_logo.png" width="200px" height="100px">
		  
		  <div class="shadow-lg p-3 mb-5 bg-white rounded">
		<p>
			 <?php 
	  
	  if(isset($_GET['code'])){
	  
	  if(isset($_GET['email'])){
		  
		  echo $consultar->ative_usuario($_GET['code'],$_GET['email']);
		  
	  }
	  }
			if(!isset($_GET['code'])){
	  
		 header("location: index?error=Link inválido!");
		  exit;
	  }
	  if(!isset($_GET['email'])){
	  header("location: index?error=Link inválido!");
		  exit;
	  
}
		  

	  ?>
		  <p>
		 <a class="nav-link" href="index.php"> <button type="button" style="width: 200px;" class="btn btn-success">OK</button></a>
			  
			  
			  
			
		  </div>
		  </div> 
		 
	  </center>
	  
	  
	  
  </div>
	  </div>
	  
	  
	  

	  
	 
	  
	  <center><p>© 2018 MyTest</p></center>
	  <!--fim corpo-->
	  
	  
	  <!--corpo modal status-->

	  <!-- Modal -->
<div class="modal fade" id="Modal_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="status_titulo">Alerta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="info_status" class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ok</button>
       </div>
    </div>
  </div>
</div>
	  
	  <!--fim corpo modal status -->
	  
	  
	  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>