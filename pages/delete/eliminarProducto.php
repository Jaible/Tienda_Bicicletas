<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$id = $_GET["id"];
        $query = "DELETE FROM PRODUCTOS WHERE ID_PRODUCTO = :id";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':id', $id);
        oci_execute($stid);

        header("Location: ../productos.php");
?>