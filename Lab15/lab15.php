<?php
	require_once "util.php";

	include("lab15.html");

	function insert_clientes(){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$time = $_POST['time'];
		$menu =$_POST['menu'];


		if (strlen($id) > 0 && strlen($name) > 0 &&  strlen($time) > 0 && strlen($menu) > 0) {
			# code...
			if (is_numeric($id)) {
				# code...
				if (insertClient($id, $name, $time, $menu)) {
					# code...
					echo "Datos insertados a la tabla correctamente";
				}else{
					echo "Error: Datos no insertados";
				}
			}else{
				echo "ID debe ser numerico";
			}
		}else{
			echo "No debe haber datos vacios";
		}
	}

	if (isset($_POST['insertar'])) {
		# code...
		insert_clientes();
	}
?>