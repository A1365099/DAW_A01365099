<?php

    $name = "";
    $age= "";
    $mail = "";
    $jugador = "";
    $preguntas="";
    $vacios=3;
         //  echo $vacios;
     function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        
        if (empty($_POST["name"])) {
             $nameErr = "Se requiere llenar el campo";
        }  
        else{
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Solo se permiten letras y especios"; 
            }
            else{
                $vacios--;
            }
        } 
       
         if (empty($_POST["mail"])) {
             $mailErr = "Se requiere llenar el campo";
        }  
        else{
            	$mail = test_input($_POST["mail"]);
                $vacios--;
           
        } 
        if (empty($_POST["age"])) {
             $ageErr = "Se requiere llenar el campo";
        }  
        else{
            $age = test_input($_POST["age"]);
 
                $vacios--;
            

        }
         if (empty($_POST["jugador"])) {
             $jugErr = "Seleccione un Jugador";
        }  
        else{
            $jugador = test_input($_POST["jugador"]);
            if(isset($jugador)){
                $vacios--;
            }
        } 
 
        include("lab10.html");
        //
        if($vacios==0){
            echo '<p>'.$name.', con edad de: '.$age.' se ha realizado tu voto correctamente a: '.$jugador.', tu voto será envíado a: '.$mail.'.</p>';
            include("preguntas.html");
        }
    }
    
    
    else {
         include("lab10.html");
    }
    
 

?>