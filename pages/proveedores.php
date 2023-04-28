<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once("../components/navbar.html");
    include_once("conexionDB.php");
    $conn = abrirConexion();
    $query = 'SELECT id_proveedor, nombre FROM proveedores';
    $stid = oci_parse($conn, $query);
    oci_execute($stid);
    ?>
    <?php
    // función total_proveedores del paquete proveedores_pkg
    $stmt = oci_parse($conn, 'BEGIN :total_proveedores := proveedores_pkg.total_proveedores(); END;');
    oci_bind_by_name($stmt, ':total_proveedores', $total_proveedores, 32);
    oci_execute($stmt);
    ?>

    <div class="container my-5">
        <h1>Registro de Proveedores</h1>
        <a href="./insert/agregar_proveedor.php" class="btn btn-primary m-2">Agregar proveedor</a>
        
<!-- Total de proveedores -->
        <table>
            <thead>
                <tr>
                    <th>Total de Proveedores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total_proveedores; ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (($row = oci_fetch_assoc($stid)) != false) {
                ?>
                    <tr>

                        <td><?php echo $row['ID_PROVEEDOR'] ?></td>
                        <td><?php echo $row['NOMBRE'] ?></td>
                        <td>
                            <div class="flex flex-column">
                                <a href="./update/modificar_proveedor.php?id=<?php echo $row['ID_PROVEEDOR'] ?>" class="btn btn-primary">Modificar</a>
                                <a href="./delete/eliminarProveedor.php?id=<?php echo $row['ID_PROVEEDOR'] ?>" class="btn btn-danger">Eliminar</a>
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