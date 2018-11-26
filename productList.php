<?php session_start(); ?>

<?php 
if(!isset($_SESSION['admin']) && !isset($_SESSION['asistente'])) // Si no existe la session, lo reenviara a la pagina de inicio
  header("Location: login.php"); // De esta manera evitamos que usuarios 
                                 // no autorizados visualizen la información
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Texto Claves</title>
	<link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/theme.css" type="text/css">
	<script src="js/jquery-3.2.1.js"></script>
</head>
<body>

  <div style="position: ;padding: 10px;font-weight: bold;width: auto;background: black;">
    <a href="javascript:history.back(-1);" style="color:white;"><< Volver Atras</a>    
    &nbsp;&nbsp;
    <a href="close_session.php" style="color:red;">Cerrar Sessión</a>
  </div>

	<div class="p-2 text-center bg-primary text-white">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <h1 style="color:yellow;">Privilegio <b>"<?=$_SESSION['user']['ac_privilege']?>"</b></h1>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 py-2">
					<h4>Lista de Productos de Prueba</h4>
					<ul id="productList" style="line-height:200%" class="list-group"></ul>
				</div>
			</div>
		</div>
	</div>

	<script src="data.js"></script>
	<script>
		var options;
		// console.log(dataTest);
		$(document).ready(function() {
			
			$("#productList").html("");

			for( i in dataTest ){
				options ="<span class='badge badge-pill'>";

				//Asistentes y administradores tienen acceso a esta función
				<?if(isset($_SESSION['asistente']) || isset($_SESSION['admin']) ): ?>
					options+="<button type='button' class='btn btn-primary btn-sm'>Ver</button>";
				<?endif?>
				
				// Solo los administradores tienen acceso a estas funciones
				<?if(isset($_SESSION['admin'])): ?>
					options+="&nbsp;<button type='button' class='btn btn-warning btn-sm'>E</button>";
					options+="&nbsp;<button type='button' class='btn btn-danger btn-sm'>X</button>";
				<? endif ?>
			
				options+="</span>";

				liContent = dataTest[i]+" "+options;
				$("#productList").append(
					"<li class='list-group-item d-flex justify-content-between'> "+liContent+" </li>"
				);
			}
		});
	</script>
</body>
</html>