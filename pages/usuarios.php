<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <?php 
        require_once("../components/navbar.html");
        include_once("conexionDB.php");
        $conn = abrirConexion();
        $query = 'SELECT id_usuario, nombre, apellido, usuario, contrasena FROM USUARIO';
        $stid = oci_parse($conn, $query);
        oci_execute($stid)
    ?>

    <div class="container my-5">
        <h1>Registro de Usuarios</h1>
        <a href="./insert/agregar_usuario.php" class="btn btn-primary m-2">Agregar usuario</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (($row = oci_fetch_assoc($stid)) != false){
                ?>
                    <tr>
                        <td><?php echo $row['ID_USUARIO'] ?></td>
                        <td><?php echo $row['NOMBRE'] ?></td>
                        <td><?php echo $row['APELLIDO'] ?></td>
                        <td><?php echo $row['USUARIO'] ?></td>
                        <td><?php echo $row['CONTRASENA'] ?></td>
                        <td>
                            <div class="flex flex-column">
                                <a href="./update/modificar_usuario.php?id=<?php echo $row['ID_USUARIO'] ?>" class="btn btn-primary">Modificar</a>
                                <a href="" class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>