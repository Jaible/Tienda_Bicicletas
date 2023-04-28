<?php 

    include_once("../conexionDB.php");
    $conn = abrirConexion();
    $descripcion = $_POST["descripcion"];
    $query = "INSERT INTO CATEGORIAS (descripcion) VALUES (:descripcion)";
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':descripcion', $descripcion);
    oci_execute($stid);

?>