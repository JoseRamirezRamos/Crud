<?php

include_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $buscar_id = $con->prepare('SELECT * FROM users WHERE id=:id LIMIT 1');
    $buscar_id->execute(array(
        ':id' => $id
    ));
    $resultado = $buscar_id->fetch();
} else {
    header('Location: index.php');
}


if (isset($_POST['guardar'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = (int)$_GET['id'];

    if (!empty($name) && !empty($phone) && !empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script> alert('Correo no valido');</script>";
        } else {
            $consulta_update
                = $con->prepare(' UPDATE users SET name=:name, phone=:phone, email=:email WHERE id=:id;');
            $consulta_update->execute(array(
                ':name' => $name,
                ':phone' => $phone,
                ':email' => $email,
                ':id' => $id
            ));
            header('Location: index.php');
        }
    } else {
        echo "<script> alert('Los campos estan vacios');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="es" class="h-100">
    <head>
        <meta charset="UTF-8">
        <title>Editar Cliente</title>
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fontawesome css -->
        <link href="fontawesome/css/all.css" rel="stylesheet">
    </head>
    <body class="h-100 d-flex justify-content-center align-items-center">
        <div class="contenedor align-items-center">
            <form action="" method="post">
                <h1 class="text-warning">Actualizar</h1>
                <div class="form-group">
                    <input type="text" name="name" value="<?php if ($resultado) {
                        echo $resultado['name'];
                    } ?>" class="input__text">
                </div>
                <div class="form-group">
                    <input type="number" name="phone" value="<?php if ($resultado) {
                        echo $resultado['phone'];
                    } ?>" class="input__text">
                </div>
                <div class="form-group">
                    <input type="text" name="email" value="<?php if ($resultado) {
                        echo $resultado['email'];
                    } ?>" class="input__text">
                </div>
                <div class="btn-group">
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                    <input type="submit" name="guardar" value="Guardar"
                           class="btn btn-success">
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
