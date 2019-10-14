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

	function insertClient($id, $name, $times, $menu){
		$conn = conectDB();

		$sql = "INSERT INTO clientes(IDCliente, Nombre, Tiempos, NombreMenu) VALUES (\"".$id. "\",\"". $name . "\",\"" . $times . "\",\"" . $menu . "\");";

		if(mysqli_query($conn, $sql)){
			echo "New record created succesfully";
			closeDb($conn);
			return true;
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			closeDb($conn);
			return false;
		}

		closeDb($conn);
	}
?>