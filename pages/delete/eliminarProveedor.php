<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$id = $_GET["id"];
        $query = "DELETE FROM PROVEEDORES WHERE ID_PROVEEDOR = :id";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':id', $id);
        oci_execute($stid);

        header("Location: ../proveedores.php");
?>