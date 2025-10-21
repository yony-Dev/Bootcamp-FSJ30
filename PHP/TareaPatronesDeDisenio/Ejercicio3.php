<?php
// Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.
// Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator.

interface PersonajeVideojuego {
    public function obtenerDescripcion(): string;
    public function obtenerPoder(): int;
}
// --- Personajes base ---
class Guerrero implements PersonajeVideojuego {
    public function obtenerDescripcion(): string {
        return "Guerrero valiente";
    }

    public function obtenerPoder(): int {
        return 50;
    }
}

class Arquero implements PersonajeVideojuego {
    public function obtenerDescripcion(): string {
        return "Arquero ágil";
    }

    public function obtenerPoder(): int {
        return 40;
    }
}

// --- Decorador base ---
abstract class ArmaDecorator implements PersonajeVideojuego {
    protected PersonajeVideojuego $personajeVideojuego;

    public function __construct(PersonajeVideojuego $personajeVideojuego) {
        $this->personajeVideojuego = $personajeVideojuego;
    }

    public function obtenerDescripcion(): string {
        return $this->personajeVideojuego->obtenerDescripcion();
    }

    public function obtenerPoder(): int {
        return $this->personajeVideojuego->obtenerPoder();
    }
}

// --- Decoradores concretos (armas) ---
class Espada extends ArmaDecorator {
    public function obtenerDescripcion(): string {
        return $this->personajeVideojuego->obtenerDescripcion() . " con una espada legendaria";
    }

    public function obtenerPoder(): int {
        return $this->personajeVideojuego->obtenerPoder() + 30;
    }
}

class Escudo extends ArmaDecorator {
    public function obtenerDescripcion(): string {
        return $this->personajeVideojuego->obtenerDescripcion() . " protegido con un escudo de acero";
    }

    public function obtenerPoder(): int {
        return $this->personajeVideojuego->obtenerPoder() + 20;
    }
}

class Arco extends ArmaDecorator {
    public function obtenerDescripcion(): string {
        return $this->personajeVideojuego->obtenerDescripcion() . " equipado con un arco élfico";
    }

    public function obtenerPoder(): int {
        return $this->personajeVideojuego->obtenerPoder() + 25;
    }
}

// --- Ejemplo de uso ---
$guerrero = new Guerrero();
$arquero = new Arquero();

echo "=== Personajes base ===\n";
echo $guerrero->obtenerDescripcion() . " | Poder: " . $guerrero->obtenerPoder() . "\n";
echo $arquero->obtenerDescripcion() . " | Poder: " . $arquero->obtenerPoder() . "\n\n";

echo "=== Personajes con armas (Decorator) ===\n";

// Guerrero con espada y escudo
$guerreroArmado = new Escudo(new Espada($guerrero));
echo $guerreroArmado->obtenerDescripcion() . " | Poder: " . $guerreroArmado->obtenerPoder() . "\n";

// Arquero con arco
$arqueroArmado = new Arco($arquero);
echo $arqueroArmado->obtenerDescripcion() . " | Poder: " . $arqueroArmado->obtenerPoder() . "\n";

// Arquero con arco y escudo
$arqueroCombinado = new Escudo(new Arco($arquero));
echo $arqueroCombinado->obtenerDescripcion() . " | Poder: " . $arqueroCombinado->obtenerPoder() . "\n";
?>