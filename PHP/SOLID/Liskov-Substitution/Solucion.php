<?php 

    class Persona {

        function comer(){}

        function dormir(){}

        function respirar(){}

    }

    trait PersonaCantora{
        function cantar(){
            echo "Lalalala ";
        }
    }

    interface PersonaHabladora{
        function hablar();
    }

    interface PersonaCaminadora{
        function caminar();
    }

    class Programador extends Persona implements PersonaHabladora, PersonaCaminadora{
    use PersonaCantora;

    
    function hablar(){
    }

    function caminar(){}
    }

    class Bebe extends Persona{

    }

    $enoc = new Programador("Enoc",23);
    $enoc->cantar();

?>