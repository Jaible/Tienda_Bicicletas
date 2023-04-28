	<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$nombre = $_POST["nombre"];
		$precio = $_POST["precio"];
		$id = $_POST["id"];
        $query = "UPDATE bicicletas SET nombre = :nombre, precio = :precio WHERE id_bicicletas = :id";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':nombre', $nombre);
		oci_bind_by_name($stid, ':precio', $precio);
		oci_bind_by_name($stid, ':id', $id);
        oci_execute($stid);
    ?>