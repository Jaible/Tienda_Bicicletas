<?php
    include_once("../conexionDB.php");
    $conn = abrirConexion();
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];
    $query = "INSERT INTO USUARIOS (nombre, apellido, usuario, contrasena) VALUES (:nombre, :apellido, :usuario, :contra)";
    $stid = oci_parse($conn, $query);
    oci_bind_by_name($stid, ':nombre', $nombre);
    oci_bind_by_name($stid, ':apellido', $apellido);
    oci_bind_by_name($stid, ':usuario', $usuario);
    oci_bind_by_name($stid, ':contra', $contra);
    oci_execute($stid);
?>