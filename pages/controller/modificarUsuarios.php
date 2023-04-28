<?php
    include_once("../conexionDB.php");
    $conn = abrirConexion();
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];
    $query = "UPDATE USUARIO SET nombre=:nombre, apellido=:apellido, usuario=:usuario, contra=:contra WHERE ID_USUARIO=:id_usuario";
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':nombre', $nombre);
    oci_bind_by_name($stid, ':apellido', $apellido);
    oci_bind_by_name($stid, ':usuario', $usuario);
    oci_bind_by_name($stid, ':contra', $contra);
    oci_bind_by_name($stid, ':id_usuario', $id);
    oci_execute($stid);
?>