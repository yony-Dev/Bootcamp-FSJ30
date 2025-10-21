<?php 



    class ConductorAutomovil{

        function acelerar(Auto $auto){
            $auto->aumentarVelocidad();
        }
    }


    //Clase intermedia generica -> Contiene el metodo principal del funcionamiento
    class Auto{
       function aumentarVelocidad(){
        echo "Estoy acelerando brum";
       }
    }
   
    class RollRoyce extends Auto{

        function aumentarVelocidad(){
            echo "Estoy acelerando brum brum";
        }
    }

    class Mercedes extends Auto{
        function aumentarVelocidad(){
            echo "Estoy acelerando brum brum pero mas fuerte";
        }
    }

    $vehiculoHumilde = new RollRoyce();
    $otroVehiculoHumilde = new Mercedes();

    $schuma = new ConductorAutomovil();
    $schuma->acelerar($otroVehiculoHumilde);


?>