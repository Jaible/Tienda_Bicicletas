<?php 

	function abrirConexion(){

		$USERNAME = "AdminCiclo";
		$PASSWORD = "ADM123";
		$DATABASE = "localhost:1521/xepdb1";

		return $conn = oci_connect($USERNAME,$PASSWORD,$DATABASE);		

	} //Abrir conexion.

	function cerrarConexion($conexion){

		oci_close($conexion);

	} //Cerrar Conexion.