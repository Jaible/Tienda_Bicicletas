<?php 

    include_once("../conexionDB.php");
    $conn = abrirConexion();
    $descripcion = $_POST["descripcion"];
    $descripcion = $_POST["id"];
    $query = "UPDATE CATEGORIAS SET descripcion = :descripcion WHERE id_categoria = :id_categoria";
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':descripcion', $descripcion);
    oci_bind_by_name($stid, ':id_categoria', $id);
    oci_execute($stid);

?>