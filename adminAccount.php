<?php 
session_start(); 
if(!isset($_SESSION['admin'])) // Si no existe la session, lo reenviara a la pagina de inicio
  header("Location: login.php"); // De esta manera evitamos que usuarios 
                                 // no autorizados visualizen la información
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cuenta principal</title>
	<link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/theme.css" type="text/css">
</head>
<body>
  <div style="position: absolute;padding: 10px;font-weight: bold;">
    <a href="close_session.php" style="color:red;">Cerrar Sessión</a>
    &nbsp;&nbsp;
    <a href="productList.php" style="color:blue;">>>Lista de Productos<<</a>    
  </div>
	<br><br>
  <div class="p-5 text-center bg-secondary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mb-4">Bienvenido a su cuenta "<?=$_SESSION['user']['ac_nombres']?>"</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <img src="img/admin.png" alt="" style="max-width: 100%;margin:auto;">
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.2.1.js"></script>
  <script src="lib/bootstrap-4.0.0_lite/js/popper.min.js"></script>
  <script src="lib/bootstrap-4.0.0_lite/js/bootstrap.min.js"></script>
</body>
</html>
