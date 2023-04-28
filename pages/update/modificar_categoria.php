<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/modifica_articulo.css">
</head>
<body>
    <?php 
        require_once("../components/navbar.html");
        include_once("conexionDB.php");
        $conn = abrirConexion();
        $query = 'SELECT ID_CATEGORIA, DESCRIPCION FROM CATEGORIAS WHERE ID_CATEGORIA = :id';
        $stid = oci_parse($conn, $query);
        oci_bind_by_name($stid, ':id', $_GET["id"]);
        oci_execute($stid)
    ?>

    <div class="container my-5">
        <h1>Modificar categoria</h1>
            <br>
            <?php
            while (($row = oci_fetch_assoc($stid)) != false){
            ?>
            <form method="post" enctype="multipart/form-data" action="../controller/modificarCategorias.php">

                <div class="form-element mb-3">
                    <input type="hidden" id="id" name="id" value="<?php echo $_GET["id"] ?>">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" name="descripcion" placeholder="Digite la descripcion"
                        id="descripcion" class="form-control" value="<?php echo $row['DESCRIPCION'] ?>">
                </div>

                <div class="text-end">
                    <button type="submit" id="btnAgregar" name="btnAgregar" class="btn btn-primary">Modificar categoria</button>
                </div>
            </form>
            <?php
                }
            ?>
         </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>