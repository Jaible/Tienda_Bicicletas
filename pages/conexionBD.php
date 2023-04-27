<?php 

	function abrirConexion(){

		$USERNAME = "LenguajeProyecto";
		$PASSWORD = "123456";
		$DATABASE = "localhost/XE";

		return $conn = oci_connect($USERNAME,$PASSWORD,$DATABASE);		

	} //Abrir conexion.

	function cerrarConexion($conexion){

		oci_close($conexion);

	} //Cerrar Conexion.
