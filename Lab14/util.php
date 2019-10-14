<?php
	function conectDB(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "clase";

		$con = mysqli_connect($servername, $username, $password, $dbname);

		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}

		return $con;
	}


	function closeDb($mysql){
		mysqli_close($mysql);
	}

	function getClients(){
		$conn = conectDB();

		$sql = "SELECT IDCliente, Nombre, Tiempos, NombreMenu FROM clientes";

		$result = mysqli_query($conn, $sql);

		closeDb($conn);

		return $result;
	}

	function getClientsByMenu($MenuName){
		$conn = conectDB();

		$sql = "SELECT IDCliente, Nombre, Tiempos FROM clientes WHERE NombreMenu LIKE '%".$MenuName."%'";

		$result = mysqli_query($conn, $sql);

		closeDb($conn);

		return $result;
	}

		function getClientsByTime($TimeName){
		$conn = conectDB();

		$sql = "SELECT IDCliente, Nombre, NombreMenu FROM clientes WHERE Tiempos LIKE '%".$TimeName."%'";

		$result = mysqli_query($conn, $sql);

		closeDb($conn);

		return $result;
	}
?>