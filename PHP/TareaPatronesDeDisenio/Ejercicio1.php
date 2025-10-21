<?php
// Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y velocidad. La creación de los personajes dependerá del nivel del juego:
// - En el nivel fácil se creará un personaje "Esqueleto".
// - En el nivel difícil se creará un personaje "Zombi".
// Debes aplicar el patrón de diseño Factory para la creación de los personajes.

interface Personaje {
    public function atacar();
    public function velocidad();
}
#Creamos los personajes
class Esqueleto implements Personaje {
    public function atacar() {
        return "El Esqueleto ataca con un arco.";
    }

    public function velocidad() {
        return "El Esqueleto es rápido.";
    }
}
class Zombi implements Personaje {
    public function atacar() {
        return "El Zombi ataca con sus garras.";
    }

    public function velocidad() {
        return "El Zombi es lento.";
    }
}

#Creamos la fabrica
class PersonajeFactory {
    public static function crearPersonaje($nivel) : Personaje{
        return match($nivel) {
            'facil' => new Esqueleto(),
            'dificil' => new Zombi(),
            default => throw new Exception("Nivel no válido"),
        };
    }
    
}
#Uso de la fabrica
$personaje1 = PersonajeFactory::crearPersonaje('facil');
echo $personaje1->atacar() . "\n"; // El Esqueleto ataca con un arco.
echo $personaje1->velocidad() . "\n"; // El Esqueleto es rápido.

$personaje2 = PersonajeFactory::crearPersonaje('dificil');
echo $personaje2->atacar() . "\n"; // El Zombi ataca con sus garras.
echo $personaje2->velocidad() . "\n"; // El Zombi es lento.
?>