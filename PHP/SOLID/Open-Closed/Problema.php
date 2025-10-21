<?php 

/* 
    Principio de abierto/cerrado -> Las partes de nuestra aplicacion tienen que estar abiertas para extension y cerradas para modificacion
*/

    class ConductorAutomovil{

        function acelerar(RollRoyce $auto){
            $auto->aumentarVelocidad();
        }
    }

   
    class RollRoyce{

        function aumentarVelocidad(){
            echo "Estoy acelerando brum brum";
        }
    }

    class Mercedes{
        function aumentarVelocidad(){
            echo "Estoy acelerando brum brum pero mas fuerte";
        }
    }

    $vehiculoHumilde = new RollRoyce();
    $otroVehiculoHumilde = new Mercedes();

    $schuma = new ConductorAutomovil();
    $schuma->acelerar($vehiculoHumilde);



?>