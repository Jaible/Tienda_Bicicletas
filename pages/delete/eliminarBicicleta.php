<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$nombre = $_GET["id"];
        $query = "DELETE FROM BICICLETAS WHERE ID_BICICLETAS = :id";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':id', $id);
        oci_execute($stid);

        header("Location: ../bicicletas.php");
?>