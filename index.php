<!--AUTOR: Arley Fellipe-->
<?php 
require("config/Class.system.php");

if(!isset($_SESSION)) session_start();

if(isset($_SESSION['UsuarioID'])){

	$consultar = new data_base_system;
	
	$l = $_SESSION['UsuarioID'];
	$s = $_SESSION['SenhaPASS'];
		
if(isset($_GET['logout'])){

	session_destroy();
	header("location: index.php");
	exit;
}
	
	
}
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	  <link rel="shortcut icon" href="https://mytestt2018.000webhostapp.com/img/favicon.ico" >

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
	 <script language="javascript">
		 
		 
function create_login(){
	  
	 var nome = document.getElementById('nome').value;
	 var email = document.getElementById('email').value;
	 var login = document.getElementById('user').value;
	 var senha = document.getElementById('senha2').value;
	 var senha2 = document.getElementById('senha3').value;
    
	 if(senha != senha2) {
		 
		 show_modal_status('ERRO, senhas não confere!');
		 
	 }else{
		 
		 
		 if(senha.length <6){
			 show_modal_status('ERRO, a senha deve conter no mínimo 6 caracteres!');
			 
		 }else{
		 
  var letraMaiscula = 0;
  var numero = 0;
  var caracterEspecial = 0;
  
  for (var i=0; i <= senha.length; i++) {
    var valorAscii = senha.charCodeAt(i);
    
    // de A até Z
    if (valorAscii >= 65 && valorAscii <= 90){
      letraMaiscula++;
	}
    
    // de 0 até 9
    if (valorAscii >= 48 && valorAscii <= 57){
      numero++;
	}
  }
  if((letraMaiscula >= 1) && (numero >= 2)){
			 
  
		 
		 
		$.ajax({
		type: "POST",
        url: "config/news.php",
		data: {"cadastrar_usuario":nome,"nome":nome,"email":email,"login":login,"senha":senha},
	}).done(function (return_data) {
        
			$.each(return_data.cadastro, function(key, value){
			
			 show_modal_status(value.msg);
				
			if(value.cpu==1){
							
				setTimeout("show_all_f('#login_1');",3000);
			}
				
				
			
        });
				   
		
    });
	
		}else{
			show_modal_status('ERRO, a senha deve conter pelo menos uma letra minúscula, uma letra maiúscula e números!');
			
		}
	 }
    
  }
}
	 
function ac_login(){
	  
	var nnome = document.getElementById('login5').value;
	var ssenha = document.getElementById('senha5').value;
	 	 	 
		$.ajax({
		type: "POST",
        url: "config/news.php",
		data: {"usuario":nnome,"login":nnome,"senha":ssenha},
	}).done(function (return_data) {
        
			$.each(return_data.login2, function(key, value){
			
			 show_modal_status(value.msg);
				
			if(value.cpu==1){
							
				setTimeout("location.reload();",3000);
			}
				
				
			
        });
				   
		
    });
	
		
}
	 
		 
	  </script>  
  </head>
  <body>
      <!--MENU-->
	  
	  <nav id="menu_sp" class="navbar navbar-expand-lg navbar-light bg-primary">
  <button class="navbar-toggler bg-button" type="button" data-toggle="collapse" data-target="#navbar_menu01" aria-controls="navbar_menu01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span> 
  </button>
		 <h4 class="px-2 c-white">MyTest</h4>
		  
  <div class="collapse navbar-collapse" id="navbar_menu01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		
		<?php if(!isset($_SESSION['UsuarioID'])){?>
      <li class="nav-item active">
        <a class="nav-link" href="#home" onClick="hide_menu();show_all_f('#home');">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#login" onClick="hide_menu();show_all_f('#login');">Login</a>
      </li>
		<li class="nav-item">
        <a class="nav-link" href="#create_account" onClick="hide_menu();show_all_f('#create_account');">Criar Conta</a>
      </li>
		<?php }?>
		<?php if(isset($_SESSION['UsuarioID'])){?>
      <li class="nav-item active">
        <a class="nav-link" href="#home" onClick="hide_menu();show_all_f('#home');">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#perfil" onClick="hide_menu();show_all_f('#perfil');">Meu Perfil</a>
      </li>
		<li class="nav-item">
        <a class="nav-link" href="?logout">Sair</a>
      </li>
		<?php }?>
		
    </ul>
  </div>
</nav>
	<div style="padding-top: 30px;"></div>
	  <!--FIM MENU-->
	  
	  <!--corpo-->
	  
	  
	  <!--corpo home-->
	  
	  <?php if(!isset($_SESSION['UsuarioID'])){?>
	  
<div class="collapse show" id="home">
  <div class="card card-body">
    
	  
	  <div style="padding-top: 10px;"></div>
	  <center>
	  <h1>Bem-Vindo a</h1>
		 <div style="max-width: 600px;">
		  
			 <img src="img/mytest_logo.png" width="200px" height="100px">
		  
		  <div class="shadow-lg p-3 mb-5 bg-white rounded">
		<p>ACESSE SUA CONTA E SAIBA AS NOVIDADES!
		  <p>
		 <a class="nav-link" href="#login" onClick="show_all_f('#login');"> <button type="button" style="width: 200px;" class="btn btn-success">ENTRAR</button></a>
			  
			  <h4>OU</h4>
			  
			 <a class="nav-link" href="#create_account" onClick="show_all_f('#create_account');"> <button type="button" style="width: 200px;" class="btn btn-info">CRIAR UMA CONTA</button>
			  </a>
		  </div>
		  </div> 
		 
	  </center>
	  
	  
	  
  </div>
	  </div>
	  <?php }?>
	  
	  <?php if(isset($_SESSION['UsuarioID'])){?>
	  
<div class="collapse show" id="home">
  <div class="card card-body">
    
	  
	  <div style="padding-top: 10px;"></div>
	  <center>
	  <h1>Bem-Vindo <?php echo $consultar->consultar_dados_usuario($l,$s,"login");?></h1>
		 <div style="max-width: 600px;">
		  
			 <img src="img/mytest_logo.png" width="200px" height="100px">
		  
		  <div class="shadow-lg p-3 mb-5 bg-white rounded">
		<p>Nome: <?php echo $consultar->consultar_dados_usuario($l,$s,"nome");?>
		  <p>
		 <a class="nav-link" href="#perfil" onClick="show_all_f('#perfil');"> <button type="button" style="width: 200px;" class="btn btn-success">MEU PERFIL</button></a>
			  
			  <a class="nav-link" href="?logout"> <button type="button" style="width: 200px;" class="btn btn-danger">SAIR</button></a>
		  </div>
		  </div> 
		 
	  </center>
	  
	  
	  
  </div>
	  </div>
	  <?php }?>
	  <!--fim corpo home -->
	  
	  <!--corpo perfil-->
	  
	  
	  
	  <?php if(isset($_SESSION['UsuarioID'])){?>
	  
<div class="collapse" id="perfil">
  <div class="card card-body">
    
	  
	  <div style="padding-top: 10px;"></div>
	  <center>
	  <h1>Meu perfil na MyTest</h1>
		 <div style="max-width: 600px;">
		  
			 <img src="<?php echo $consultar->consultar_dados_usuario($l,$s,"foto_perfil");?>" width="80px" height="80px" class="rounded-circle">
		  
		  <div class="shadow-lg p-3 mb-5 bg-white rounded">
		<p>Nome: <?php echo $consultar->consultar_dados_usuario($l,$s,"nome");?>
		  <p>
			  <p>Login: <?php echo $consultar->consultar_dados_usuario($l,$s,"login");?>
		  <p>
		 	  <p>Conta Ativada!</p>
			  <a class="nav-link" href="?logout"> <button type="button" style="width: 200px;" class="btn btn-danger">SAIR</button></a>
		  </div>
		  </div> 
		 
	  </center>
	  
	  
	  
  </div>
	  </div>
	  <?php }?>
	  <!--fim corpo home -->
	  
	  
	  <!--corpo login-->
	   <form action="JAVASCRIPT:ac_login();" method="post">
	 
	<div class="collapse" id="login">
  <div class="card card-body">
	  
    
	  <div style="padding-top: 10px;"></div>
	  <center>
	  <h4>ENTRE COM SEU LOGIN E SENHA!</h4>
		 <div style="max-width: 600px;">
		  
			 <img src="img/mytest_logo.png" width="200px" height="100px">
		  
		  <div class="shadow-lg p-3 mb-5 bg-white rounded">
			  
			  
		<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-address-card"></i></span>
  </div>
  <input type="text" placeholder="Email ou Login.." class="form-control" id="login5" required>
</div>
			
			  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fab fa-expeditedssl"></i></span>
  </div>
  <input type="password" placeholder="Sua senha.." class="form-control" id="senha5" required>
			  </div>
			  
			  
		 <input type="submit" style="width: 200px;" class="btn btn-success" value="ENTRAR">			  
			  
		 
		  </div>
		  </div> 
		  
	  </center>
	  
	  
	  
  </div>
	
</div>
	  </form>
	  <!--fim corpo login-->
	  
	  <!--corpo cadastro efetuado-->
	  
	<div class="collapse" id="login_1">
  <div class="card card-body">
	  
    
	  <div style="padding-top: 10px;"></div>
	  <center>
	  <h4>SUA CONTA FOI EFETUADA COM SUCESSO!</h4>
		 <div style="max-width: 600px;">
		  
			 <img src="img/mytest_logo.png" width="200px" height="100px">
		  
		  <div class="shadow-lg p-3 mb-5 bg-white rounded">
			  
			  
		<h4>ACESSE SEU EMAIL PARA ATIVAR SUA CONTA!</h4>
			  
		 
		  </div>
		  </div> 
		  
	  </center>
	  
	  
	  
  </div>
	
</div>
	  <!--fim corpo cadastro efetuado-->
	  
	  <!--corpo criar conta-->
	  <form action="JAVASCRIPT:create_login();" method="post">
	  
	<div class="collapse" id="create_account">
  <div class="card card-body">
	  
    
	  <div style="padding-top: 10px;"></div>
	  <center>
	  <h4>CRIE SUA CONTA AGORA!</h4>
		 <div style="max-width: 600px;">
		  
			 <img src="img/mytest_logo.png" width="200px" height="100px">
		  
		  <div class="shadow-lg p-3 mb-5 bg-white rounded">
			  
			  
		<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm" required>Nome Completo</span>
  </div>
  <input type="text" class="form-control" id="nome" required>
</div>
			 
			  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Seu email</span>
  </div>
  <input type="email" class="form-control" id="email" required>
</div>
			  
			  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Nome de usuário</span>
  </div>
  <input type="text" class="form-control" id="user" required>
</div>
			  
			  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Crie uma senha</span>
  </div>
  <input type="password" class="form-control" id="senha2" required>
</div>
			
			  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Confirme a senha</span>
  </div>
  <input type="password" class="form-control" id="senha3" required>
</div>
			  
			  <!--pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"-->
			  
		 <input type="submit" style="width: 200px;" class="btn btn-success" value="CADASTRAR">			  
			  
		 
		  </div>
		  </div> 
		  
	  </center>
	  
	  
	  
  </div>
	
</div>
		  
	  </form>
	  <!--fim corpo criar conta-->
	  
	  <center><p>© 2018 MyTest</p></center>
	  <!--fim corpo-->
	  
	  
	  <!--corpo modal status-->

	  <!-- Modal -->
<div class="modal fade" id="Modal_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
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