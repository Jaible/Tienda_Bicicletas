	<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$nombre = $_POST["nombre"];
		$precio = $_POST["precio"];
        $query = "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':nombre', $nombre);
		oci_bind_by_name($stid, ':precio', $precio);
        oci_execute($stid);
    ?>
	