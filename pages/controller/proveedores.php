<?php
        include_once("../conexionDB.php");
        $conn = abrirConexion();
		$nombre = $_POST["nombre"];
		
        $query = "INSERT INTO proveedores (nombre) VALUES (:nombre)";
        $stid = oci_parse($conn, $query);
		oci_bind_by_name($stid, ':nombre', $nombre);
        oci_execute($stid);
    ?>
	
	
