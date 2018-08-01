<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

include("Class.system.php");


if(isset($_POST['cadastrar_usuario'])){
    
 $insert = new data_base_system;
		
	$insert->cadastrar_usuario($_POST['nome'],$_POST['email'],$_POST['login'],$_POST['senha']);
	
}
if(isset($_POST['usuario'])){
    
 $login_auth = new data_base_system;
		
	$login_auth->login($_POST['login'],$_POST['senha']);
	
}
?>