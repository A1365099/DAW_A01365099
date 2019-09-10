<!DOCTYPE html>
<html>
<head>
	<title>Lab 9</title>
</head>
<body>
	<h1>Laboratorio 9</h1>
  <h2>Ejercicios:</h2>
	<?php
		echo "<strong>Laboratorio 9</strong><br>";
    $arr = array("143","21","8","23","64","45","14","34");
    $size = count($arr);
    $arr2 = array("34","46","12","58","48","84","93","14","31","72","18","86","30","22","48","55","10");
    $size2 = count($arr2);
    $n = 7;
    //echo "num: $size";

    function prom($arra, $siz){
      $pro = 0;
      for($i = 0; $i < $siz; $i++){
        $pro += $arra[$i];
      }
      $pro = $pro/$siz;
      echo "<br>el promedio es: $pro";
    }

    function mediana($arra, $siz){
      sort($arra);
      $med = floor($siz/2);
      //echo "<br>med: $med";
    /*  for($x = 0; $x < $siz; $x++) {
          echo "<br>";
      echo $arra[$x];*/
    echo "<br>La mediana del array es: $arra[$med]<br><br>";
   
    }

    function tabla($arra, $siz){
       $pro = 0;
       $table = '';
       echo "El array es: ";
      for($i= 0; $i < $siz; $i++) {
        echo $arra[$i];
        echo ", ";
      }
      echo "<br>";
      for($i = 0; $i < $siz; $i++){
        $pro += $arra[$i];
      }
       $pro = $pro/$siz;

      sort($arra);
      $med = floor($siz/2);

      echo "<table border=1px>";
     
      echo "<tr><td>Promedio : $pro</td></tr>";
      echo "<tr><td>Mediana : $arra[$med]</td></tr>";
      echo "<tr><td>Array ordenado de menor a mayor: ";
      for($i= 0; $i < $siz; $i++) {
        echo $arra[$i];
        echo ", ";
      }
      echo "</td></tr>";
      rsort($arra);
      echo "<tr><td>Array ordenado de mayor a menor: ";
      for($i= 0; $i < $siz; $i++) {
        echo $arra[$i];
        echo ", ";
      }
      echo "</td></tr>";
      echo "</table>";
    }

    function cuads($ns){
       echo "<table border=1px>";
       echo "<tr><th>Numero</th><th>Cuadrados</th><th>Cubos</th></tr>";
       for($i = 0; $i <= $ns; $i++){
        $cuad = $i * $i;
        $cub = $cuad * $i;
        echo "<tr><th>$i</th><th>$cuad</th><th>$cub</th></tr>";
       }
       echo "</table>";
    }
    

    prom($arr, $size);
    mediana($arr, $size);
    tabla($arr2, $size2);
    cuads($n);
	?><br><br>
  <h2>Preguntas:</h2><br>
  <p>
    ¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.<br>
    Muestra la información del estado actual de php, como por ejemplo: opciones de compilación, extensiones de php, versión de php, información del servidor, etc.<br>
    INFO_VARIABLES: Muestra información de las variables predefinidas.<br>
    INFO_GENERAL: Información general como servidor web, sistema, etc.<br>
    INFO_ENVIRONMENT: 	Información de las variables de entorno.<br><br>
    ¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?<br><br>

    ¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.<br>
    Se envian Requests al servidor mediante el protocolo HTTP y el servidor regresa una Response.
  </p>
</body>
</html>