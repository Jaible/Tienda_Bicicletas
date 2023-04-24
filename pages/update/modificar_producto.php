<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/modifica_articulo.css">
</head>
<body>
    <?php 
      require_once("../../components/navbar.html");
    ?>

    <div class="container my-5">
        <h1>Modificar producto</h1>
            <br>
            <form method="post" enctype="multipart/form-data">

                <div class="form-element mb-3">
                    <label for="nombre" class="form-label">Portada</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>

                <div class="form-element mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" placeholder="Digite el nombre"
                        id="nombre" class="form-control">
                </div>

                <div class="form-element mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" name="precio" placeholder="Digite el precio"
                        id="precio" class="form-control">
                </div>

                <div class="text-end">
                    <button type="button" id="btnAgregar" name="btnAgregar" class="btn btn-primary">Modificar producto</button>
                </div>
            </form>
  
         </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>