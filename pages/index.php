<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <?php 
      require_once("../components/navbar.html");
      require_once("../components/tarjetas.php");
    ?>

    <div class="container my-5">
      <h1 class="p-2">Bienvenido a Bikes Store</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
          tarjetaTabla("Bicicletas", "tabla1.jpg", "./bicicletas.php");
          tarjetaTabla("Usuarios", "tabla2.png", "./usuarios.php");
          tarjetaTabla("Categorias", "tabla3.png", "./categorias.php");
          tarjetaTabla("Proveedores", "tabla4.jpeg", "./proveedores.php");
          tarjetaTabla("Productos", "tabla5.jpg", "./productos.php");
          tarjetaTabla("Facturas", "tabla6.jpg", "./facturas.php");
          tarjetaTabla("Mantenimientos", "tabla7.jpg", "./mantenimientos.php");
        ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>