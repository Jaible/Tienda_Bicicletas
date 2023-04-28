<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$id = $_GET["id"];
        $query = "DELETE FROM USUARIO WHERE ID_USUARIO = :id";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':id', $id);
        oci_execute($stid);

        header("Location: ../usuarios.php");
?>