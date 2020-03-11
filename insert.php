<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];

		if(!empty($name) && !empty($phone) && !empty($email) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO users(name,phone,email) VALUES(:name,:phone,:email)');
				$consulta_insert->execute(array(
					':name' =>$name,
					':phone' =>$phone,
					':email' =>$email
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es" class="h-100">
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Cliente</title>
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fontawesome css -->
        <link href="fontawesome/css/all.css" rel="stylesheet">
    </head>
    <body class="h-100 d-flex justify-content-center align-items-center">
        <div class="contenedor">
            <form action="" method="post">
                <h1 class="text-success">CREAR</h1>
                <div class="form-group align-items-center">
                    <input type="text" name="name" placeholder="Nombre" class="input__text align-items-center">
                </div>
                <div class="form-group">
                    <input type="number" name="phone" placeholder="Teléfono" class="input__text">
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Correo electrónico" class="input__text">
                </div>
                <div class="btn-group">
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                    <input type="submit" name="guardar" value="Guardar" class="btn btn-success">
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>
