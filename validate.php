<?php 
//Script para conexión con base de datos en Mysql
include("db_controller/mysql_script.php");
$obj = (object)$_REQUEST;

//validación de acceso en DB
$r = query("SELECT * FROM account WHERE ac_email='$obj->email' AND ac_password='$obj->password'");

if( count($r)>0 ){

  session_start();
  $_SESSION['user'] = $r[0]; //Pasamos todos los datos del usuario en la variable de sessión user
                             // Esto permitira tener los datos del usuario en cualquier pagina que tenga 
                             // la sessión iniciada (Esto solo lo almacenara hasta que la sessión sea destruida)
  //Establecer Privilegios de usuario para tener un control sobre la información a mostrar
  switch ($_SESSION['user']['ac_privilege']) {
  	case 'admin':
  		$link = "adminAccount.php";
  		$_SESSION['admin'] = true; 
  		break;
  	case 'asistente':
  		$link = "asistenteAccount.php";
	    $_SESSION['asistente'] = true; 
  		break;
  }
  //Reenviamos a la cuenta del Usuario logeado correctamente
  echo json_encode([
	"success"=>1  //permitido
	,"message"=>"Acceso Correcto"
	,"link"=>$link
  ]);


}else{
  //Si uno de los campos no coincide, el acceso es denegado y retornado al inicio
  echo json_encode([
	"success"=>0  //permitido
	,"message"=>"Acceso Incorrecto"
  ]);
}
?>