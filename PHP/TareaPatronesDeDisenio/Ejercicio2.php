<?php
// Estamos trabajando con distintas versiones de sistemas operativos Windows 7 y Windows 10. 
//  Al compartir archivos como Word, Excel, Power Point, surgen problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con la versión Windows 7.
//   Debes crear un programa donde Windows 10 pueda aceptar estos archivos independientemente de que sean de versiones anteriores.

// Para ello, aplica el patrón de diseño Adapter. 

// ----- Interfaz legacy (sistemas viejos: Windows 7, etc.) -----
interface LegacyFileInterface {
    public function getLegacyFormat(): string;
    public function getContent(): string;
}

class LegacyWord implements LegacyFileInterface {
    private string $content;
    private string $format; 

    public function __construct(string $content, string $format = 'doc97') {
        $this->content = $content;
        $this->format = $format;
    }

    public function getLegacyFormat(): string {
        return $this->format;
    }

    public function getContent(): string {
        return $this->content;
    }
}

class LegacyExcel implements LegacyFileInterface {
    private string $content;
    private string $format;

    public function __construct(string $content, string $format = 'xls97') {
        $this->content = $content;
        $this->format = $format;
    }

    public function getLegacyFormat(): string {
        return $this->format;
    }

    public function getContent(): string {
        return $this->content;
    }
}

class LegacyPpt implements LegacyFileInterface {
    private string $content;
    private string $format;

    public function __construct(string $content, string $format = 'ppt97') {
        $this->content = $content;
        $this->format = $format;
    }

    public function getLegacyFormat(): string {
        return $this->format;
    }

    public function getContent(): string {
        return $this->content;
    }
}

// ----- Interfaz moderna (lo que Windows 10 espera) -----
interface ModernFileInterface {
    // Retorna el formato moderno (ej: docx, xlsx, pptx)
    public function getFormat(): string;
    // Abre (o procesa) el archivo para Windows 10
    public function open(): string;
}

// ----- Adapter: convierte LegacyFileInterface a ModernFileInterface -----
class LegacyToModernAdapter implements ModernFileInterface {
    private LegacyFileInterface $legacyFile;

    public function __construct(LegacyFileInterface $legacyFile) {
        $this->legacyFile = $legacyFile;
    }

    // Mapea formatos legacy a formatos modernos
    private function convertFormat(string $legacyFormat): string {
        $map = [
            'doc97' => 'docx',
            'doc'   => 'docx',
            'xls97' => 'xlsx',
            'xls'   => 'xlsx',
            'ppt97' => 'pptx',
            'ppt'   => 'pptx',
            // si no está en el mapa asumimos 'unknown' y Windows 10 intentará manejarlo.
        ];

        return $map[$legacyFormat] ?? 'unknown';
    }

    public function getFormat(): string {
        return $this->convertFormat($this->legacyFile->getLegacyFormat());
    }

    public function open(): string {
        // Aquí podemos simular una conversión/compatibilización del contenido.
        $legacyFormat = $this->legacyFile->getLegacyFormat();
        $convertedFormat = $this->convertFormat($legacyFormat);

        $content = $this->legacyFile->getContent();

        // Simulación de "conversión" (en la vida real usarías convertidores / librerías)
        $convertedContent = "[CONVERTIDO a {$convertedFormat}] " . $content;

        // Resultado de "abrir" en Windows 10
        return "Abriendo archivo en formato '{$convertedFormat}': " . $convertedContent;
    }
}

// ----- Windows 10 (cliente) que espera ModernFileInterface -----
class Windows10App {
    public function openFile(ModernFileInterface $file): void {
        echo $file->open() . PHP_EOL;
    }
}

// ----- Ejemplo de uso -----
$legacyFiles = [
    new LegacyWord("Documento clásico creado en Word 97-2003", 'doc97'),
    new LegacyExcel("Hoja de cálculo con fórmulas antiguas", 'xls97'),
    new LegacyPpt("Presentación antigua con transiciones viejas", 'ppt97'),
    // También puede venir un archivo "moderno" ya (simulado mediante un Adapter encima de algo que ya sea 'doc')
    new LegacyWord("Documento creado en Word 2003 (doc)", 'doc'),
];

$win10 = new Windows10App();

echo "=== Simulación: Windows10 recibiendo archivos legacy ===" . PHP_EOL;

foreach ($legacyFiles as $legacy) {
    // Crear Adapter para cada archivo legacy
    $adapter = new LegacyToModernAdapter($legacy);
    $win10->openFile($adapter);
}

echo "=== Fin de simulación ===" . PHP_EOL;
?>