<?php
	require_once "util.php";
	include("_header.html");

	$result = getClients();
	$result2 = getClientsByMenu("Elite");
	$result3 = getClientsByTime("0COM0");

	if (mysqli_num_rows($result) > 0 ) {
		# code...
		echo "<h1>Lista de clientes</h1>";
		while ($row = mysqli_fetch_assoc($result)) {
			
			echo "<tr>";
			echo "<td>" . $row["IDCliente"] . "</td>";
			echo "<td>" . $row["Nombre"] . "</td>";
			echo "<td>" . $row["Tiempos"] . "</td>";
			echo "<td>" . $row["NombreMenu"] . "</td>";
			echo "</tr><br>";
		}
		
	}

	if (mysqli_num_rows($result2) > 0 ) {
		# code...
		echo "<h1>Clientes que pertenecen al menu Elite</h1>";
		while ($row = mysqli_fetch_assoc($result2)) {
			
			echo "<tr>";
			echo "<td>" . $row["IDCliente"] . "</td>";
			echo "<td>" . $row["Nombre"] . "</td>";
			echo "<td>" . $row["Tiempos"] . "</td>";
			echo "</tr><br>";
		}
		
	}

	if (mysqli_num_rows($result3) > 0 ) {
		# code...
		echo "<h1>Clientes que solo pertenecen al tiempo de comida</h1>";
		while ($row = mysqli_fetch_assoc($result3)) {
			
			echo "<tr>";
			echo "<td>" . $row["IDCliente"] . "</td>";
			echo "<td>" . $row["Nombre"] . "</td>";
			echo "<td>" . $row["NombreMenu"] . "</td>";
			echo "</tr><br>";
		}
		
	}

	include("_footer.html");

?>