<?php
	function conectDB(){
		$servername = "mysql1008.mochahost.com";
    $username = "dawbdorg_1365099";
    $password = "1365099";
    $dbname = "dawbdorg_A01365099";

    /*$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "clase";*/

		$con = mysqli_connect($servername, $username, $password, $dbname);


		if (!$con) {
			die("Connection failed: " . mysqli_connect_error());
		}

		return $con;
	}


	function closeDb($mysql){
		mysqli_close($mysql);
	}



	function insertZombie($name){
		$conn = conectDB();

		$sql = "INSERT INTO Zombies(Nombre) VALUES (\"". $name . "\");";

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

	function insertHistorial($name, $state){
		$conn = conectDB();

		//$sql = "INSERT INTO historialestados(Nombre, IDEstado) SELECT Z.Nombre, E.IDEstado FROM Zombies_2 as Z, Estados as E WHERE \"" . $name . "\" = Z.Nombre AND \"" . $state . "\" = E.Nombre";
		$sql = "INSERT INTO HistorialEstados(Nombre, ENombre) VALUES (\"". $name . "\",\"" . $state . "\");";

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

	function getZombies(){

	}
	
?>
