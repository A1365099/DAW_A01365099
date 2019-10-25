<?php
	require_once "util.php";
	include("agregarZombie.html");

	function insert_zombies(){
		

		$name =$_POST['name'];
		$state = $_POST['state'];
		


		if (strlen($name) > 0) {
			# code...
			if (insertZombie($name)) {
					# code...
					echo "Datos insertados a la tabla correctamente";
				}else{
					echo "Error: Datos no insertados";
				}
			if (insertHistorial($name, $state)) {
					# code...
					echo "Datos insertados a la tabla correctamente";
				}else{
					echo "Error: Datos no insertados";
				}
		}else{
			echo "No debe haber datos vacios";
		}
	}

	if (isset($_POST['add'])) {
		# code...
		insert_zombies();
	}

?>

