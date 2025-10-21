<?php
// Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, como por consola, formato JSON y archivo TXT.
// Debes crear un programa donde se muestren todos estos tipos de salidas.
// Para este propósito, aplica el patrón de diseño Strategy.
interface EstrategiaSalida {
    public function mostrar(string $mensaje): void;
}

class SalidaConsola implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        echo "Consola: " . $mensaje . PHP_EOL;
    }
}

class SalidaJSON implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        $data = ["mensaje" => $mensaje, "timestamp" => date("Y-m-d H:i:s")]; //date => eso es para obtener la fecha y hora actual
        echo " JSON: " . json_encode($data, JSON_PRETTY_PRINT) . PHP_EOL; // esta linea convierte el array en formato JSON
    }
}

class SalidaTXT implements EstrategiaSalida {
    private string $nombreArchivo;

    public function __construct(string $nombreArchivo = "salida.txt") {
        $this->nombreArchivo = $nombreArchivo;
    }

    public function mostrar(string $mensaje): void {
        $linea = "[" . date("Y-m-d H:i:s") . "] " . $mensaje . PHP_EOL; // Formateamos la línea a escribir
        file_put_contents($this->nombreArchivo, $linea, FILE_APPEND); // Guardamos el mensaje en el archivo
        echo " Mensaje guardado en archivo: {$this->nombreArchivo}" . PHP_EOL; 
    }
}

// --- Clase Contexto ---
class Mensaje {
    private EstrategiaSalida $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    // Cambiar la estrategia en tiempo de ejecución
    public function setEstrategia(EstrategiaSalida $estrategia): void {
        $this->estrategia = $estrategia;
    }

    // Ejecutar la estrategia
    public function mostrarMensaje(string $texto): void {
        $this->estrategia->mostrar($texto);
    }
}


$mensaje = new Mensaje(new SalidaConsola());

echo "=== Ejemplo de patrón Strategy: Distintos tipos de salida ===" . PHP_EOL;

$mensaje->mostrarMensaje("Bienvenido al sistema");

// Cambiar a formato JSON
$mensaje->setEstrategia(new SalidaJSON());
$mensaje->mostrarMensaje("El sistema está funcionando correctamente");

// Cambiar a salida en archivo TXT
$mensaje->setEstrategia(new SalidaTXT("mensajes.txt"));
$mensaje->mostrarMensaje("Este mensaje ha sido guardado en un archivo");

// Mostrar otro mensaje por consola nuevamente
$mensaje->setEstrategia(new SalidaConsola());
$mensaje->mostrarMensaje("Finalizando ejecución del programa");

echo "=== Fin de ejemplo ===" . PHP_EOL;
?>