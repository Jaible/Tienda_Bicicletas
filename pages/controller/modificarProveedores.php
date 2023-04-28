<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$nombre = $_POST["nombre"];
		$precio = $_POST["precio"];
		$id = $_POST["id"];
        $query = "UPDATE proveedores SET nombre = :nombre WHERE id_proveedor = :id";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':nombre', $nombre);
		oci_bind_by_name($stid, ':id', $id);
        oci_execute($stid);
    ?>