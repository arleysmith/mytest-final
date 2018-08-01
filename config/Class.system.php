<?php
require_once("phpmailer/class.phpmailer.php");
//date_default_timezone_set("America/Sao_Paulo");

class data_base_system{
	

	function consultar_dados_usuario($login,$senha,$coluna){
		$pdo = new PDO('mysql:host=localhost;dbname=admnetpl_bd_technological', 'admnetpl_tech', 'mDfvq(5cLusoEA33B8');
		
		$consultar_login = "SELECT * FROM usuarios_mytest WHERE id ='".$login."' AND senha ='".$senha."'";
    $resultado_login = $pdo->query($consultar_login);
					
		
	
	$row = $resultado_login->fetch(PDO::FETCH_OBJ);
			
	
	
	
	
if($row >=1){
	
	$consultar_login = "SELECT * FROM usuarios_mytest WHERE id ='".$login."' AND senha ='".$senha."'";
    $resultado_login = $pdo->query($consultar_login);
					
	
	$row = $resultado_login->fetch(PDO::FETCH_OBJ);
	echo $row->$coluna;
}
		
	}
	
	function ative_usuario($codigo,$email){
		$pdo = new PDO('mysql:host=localhost;dbname=admnetpl_bd_technological', 'admnetpl_tech', 'mDfvq(5cLusoEA33B8');
		
		$consultar_login = "SELECT * FROM usuarios_mytest WHERE email ='".$email."' AND codigo ='".$codigo."'";
    $resultado_login = $pdo->query($consultar_login);
		
		 $row = $resultado_login->fetch(PDO::FETCH_OBJ);
			
	
	
	
	
if($row >=1){
	
	$ativar_conta = "UPDATE usuarios_mytest SET status ='1' WHERE email ='".$email."' AND codigo ='".$codigo."'";
    $resultado_ativar_conta = $pdo->query($ativar_conta);
	
	$new_codigo=hash("md5",date('d-m-Y H:i:s'));
	
	$ativar_conta2 = "UPDATE usuarios_mytest SET codigo ='".$new_codigo."' WHERE email ='".$email."' AND codigo ='".$codigo."'";
    $resultado_ativar_conta2 = $pdo->query($ativar_conta2);
	
	echo '<p style="color:green;">CONTA ATIVADA COM SUCESSO!</p>';
	
}else{
	echo '<p style="color:red;">LINK INVÁLIDO!</p>';
	
}
		
	}
	
	
	function login($login,$senha){
		$pdo = new PDO('mysql:host=localhost;dbname=admnetpl_bd_technological', 'admnetpl_tech', 'mDfvq(5cLusoEA33B8');
		
		$senha_crypt=hash("md5",$senha);
		
		
		 $consultar_login = "SELECT * FROM usuarios_mytest WHERE email ='".$login."' AND senha ='".$senha_crypt."'";
    $resultado_login = $pdo->query($consultar_login);
	
		 $row = $resultado_login->fetch(PDO::FETCH_OBJ);
			
	
	
	
	
if($row >=1){
	
 $consultar_login = "SELECT * FROM usuarios_mytest WHERE email ='".$login."' AND senha ='".$senha_crypt."'";
    $resultado_login = $pdo->query($consultar_login);
	
	$row = $resultado_login->fetch(PDO::FETCH_OBJ);
           
	if($row->status==0){
		echo '{"login2":[{"msg":"ERRO, sua conta está inativa, acesse seu email para ativar sua conta!","cpu":"2"}]}';
		
	}else{
	
	if(!isset($_SESSION)) session_start();
	$_SESSION['UsuarioID'] = $row->id;
	$_SESSION['SenhaPASS'] = $row->senha;

        echo '{"login2":[{"msg":"Login Efetuado com sucesso!","cpu":"1"}]}';}	         
}else{	
	
	$consultar_login = "SELECT * FROM usuarios_mytest WHERE login ='".$login."' AND senha ='".$senha_crypt."'";
    $resultado_login = $pdo->query($consultar_login);
	 $row = $resultado_login->fetch(PDO::FETCH_OBJ);
			
	
	
	
	
if($row >=1){
	
	     $consultar_login = "SELECT * FROM usuarios_mytest WHERE login ='".$login."' AND senha ='".$senha_crypt."'";
    $resultado_login = $pdo->query($consultar_login);
	$row = $resultado_login->fetch(PDO::FETCH_OBJ);
	
	if($row->status==0){
		echo '{"login2":[{"msg":"ERRO, sua conta está inativa, acesse seu email para ativar sua conta!","cpu":"2"}]}';
		
	}else{
	
	if(!isset($_SESSION)) session_start();
	$_SESSION['UsuarioID'] = $row->id;
	$_SESSION['SenhaPASS'] = $row->senha;
 
	echo '{"login2":[{"msg":"Login Efetuado com sucesso!","cpu":"1"}]}';
		
		
	}
                 
}else{	
echo '{"login2":[{"msg":"ERRO, Usuário ou senha incorreta!","cpu":"2"}]}';


}
		
	}

	}
	
function cadastrar_usuario($nome,$email,$login,$senha){
	
	

	
	function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}
	
	
	function validaemail($email){
	//verifica se e-mail esta no formato correto de escrita
	if (!ereg('^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})',$email)){
		$mensagem=0;
		return $mensagem;
    }
    else{
		//Valida o dominio
		$dominio=explode('@',$email);
		if(!checkdnsrr($dominio[1],'A')){
			$mensagem=0;
			return $mensagem;
		}
		else{return true;} // Retorno true para indicar que o e-mail é valido
	}
}
	
	
	$pdo = new PDO('mysql:host=localhost;dbname=admnetpl_bd_technological', 'admnetpl_tech', 'mDfvq(5cLusoEA33B8');
				
$senha_crypt=hash("md5",$senha);
$codigo=hash("md5",date('d-m-Y H:i:s'));
	
	 
   exec("SET CHARACTER SET utf8");      
	
	$v = validaemail($email);
	
if($v==0){
	
	echo '{"cadastro":[{"msg":"ERRO, email inválido!","cpu":"2"}]}';

}else{
	
	
	
	
	
 
    $consultar_email = "SELECT COUNT(email) FROM usuarios_mytest WHERE email ='".$email."' ";
    $resultado_email = $pdo->query($consultar_email);
	$num_rows = $resultado_email->fetchColumn();
	
	
	
	
if($num_rows ==1){
 
	echo '{"cadastro":[{"msg":"ERRO, este email já está sendo usado por outra pessoa!","cpu":"2"}]}';

                 
}else{	
	 
	 $consultar_login = "SELECT * FROM usuarios_mytest WHERE login ='".$login."' ";
    $resultado_login = $pdo->query($consultar_login);
	$num_rows = $resultado_login->fetchColumn();
	
if($num_rows ==1){
	
	echo '{"cadastro":[{"msg":"ERRO, este nome de usuário já está sendo usado por outra pessoa!","cpu":"3"}]}';

 
                 
}else{	
	
	$foto_perfil = get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() );
	
	 $sql = "INSERT INTO usuarios_mytest               values('','".$nome."','".$email."','".$foto_perfil."','".$login."','".$senha_crypt."','0','".$codigo."') "; 
	$resultado_insert = $pdo->query($sql);
           
	
		
if($resultado_insert){
			
$destino_email = $email;

$msg = 
'
<table width="300px">
<tr>
<td bgcolor="#000000" height="60px" align="center">
<div style="padding:3px;">
<img src="http://netplin.com/app/mytest/img/mytest_logo.png" width="70" height="50">
</div>
</td>
</tr>
<tr>
<td bgcolor="#ffffff" align="center">
<div align="justify" style="padding:3px;">
Olá '.$nome.', seu cadastro foi efetuado com sucesso, clique no link a seguir para ativar sua conta <a href="http://www.netplin.com/app/mytest/active.php?code='.$codigo.'&email='.$email.'">clique aqui</a>
</div>
</td>
</tr>
<tr>
<td bgcolor="#ffffff" align="center">
<div align="justify" style="padding:3px;">
caso o botão acima não funcione clique neste link ou copie e cole no seu navegador http://www.netplin.com/app/mytest/active.php?code='.$codigo.'&email='.$email.'
</div>
</td>
</tr>
<tr>
<td bgcolor="#737373" style="color:#FFFFFF;" align="center">
<div align="left" style="padding:3px;">
--<br />
Atenciosamente,<br />
Equipe MyTest<br />
</div>
</td>
</tr>
</table>
</div>
</td>
</tr>
</table>


';





// Inicia a classe PHPMailer
$mail = new PHPMailer();
// Define os dados do servidor e tipo de conexÃ£o
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem serÃ¡ SMTP
$mail->Host = "localhost"; // EndereÃ§o do servidor SMTP
$mail->SMTPAuth = false; // Usa autenticaÃ§Ã£o SMTP? (opcional)
$mail->Username = 'not-reply'; // UsuÃ¡rio do servidor SMTP
//$mail->Password = ''; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = 'not-reply@netplin.com'; // Seu e-mail
$mail->FromName = 'MyTest'; // Seu nome
// Define os destinatÃ¡rio(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=


$suser = explode('@',$destino_email);


$mail->AddAddress($destino_email, $suser[0]);

//$mail->AddAddress('ciclano@site.net');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // CÃ³pia Oculta
// Define os dados tÃ©cnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail serÃ¡ enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = 'Obrigado por se cadastrar na MyTest'; // Assunto da mensagem
$mail->Body = $msg;
$mail->AltBody = '
Seu cadastro foi efetuado com sucesso, acesse o link a seguir para ativar sua conta
http://www.netplin.com/app/mytest/active.php?code='.$codigo.'&email='.$email.'
';

$enviado = $mail->Send();
// Limpa os destinatÃ¡rios e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
// Exibe uma mensagem de resultado

	echo '{"cadastro":[{"msg":"Cadastro efetuado com sucesso!","cpu":"1"}]}';
		
			
}else{
	echo '{"cadastro":[{"msg":"ERRO, tente novamente mais tarde!","cpu":"4"}]}';
			
}
}

}
	
	
	
	
	

}
	
}
	

	
    
	

	

	
        
        }
?>
