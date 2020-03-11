<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM users');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

?>

<!DOCTYPE html>
<html lang="es" class="h-100">
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/estilo.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fontawesome css -->
        <link href="fontawesome/css/all.css" rel="stylesheet">
    </head>
    <body class="h-100 d-flex justify-content-center align-items-center">
        <div class="contenedor ">

            <a href="insert.php" class="btn float-right">
                <button type="button" id="new_button" class="btn btn-success">
                    Nuevo <i class="fas fa-user-plus"></i>
                </button>
            </a>

            <br/>

            <table class="table table-striped table-bordered bg-white  ">
                <tr>
                    <td class="text-lg-center">Nombre</td>
                    <td class="text-lg-center">Teléfono</td>
                    <td class="text-lg-center">Correo</td>
                    <td class="text-lg-center">Editar</td>
                    <td class="text-lg-center">Eliminar</td>
                </tr>
                <?php foreach($resultado as $fila):?>
                    <tr >
                        <td><?php echo $fila['name']; ?></td>
                        <td><?php echo $fila['phone']; ?></td>
                        <td><?php echo $fila['email']; ?></td>
                        <td class="text-lg-center">
                            <a href="update.php?id=<?php echo $fila['id']; ?>" >
                                <button type="button" class="btn btn-warning">
                                    <i class="fas fa-user-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td class="text-lg-center">
                            <a href="delete.php?id=<?php echo $fila['id']; ?>">
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-user-times"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>

            </table>
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