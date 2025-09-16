<?php 
//arrays
//declaraciones
//array indexados
$array = [1, 2, 3, 4, 5];
$array2 = array();
$array3 = new ArrayObject();

//arrays asociativos
$arrayAsociativo = [
    "nombre" => "Yony",
    "edad" => 19,
    "departamento" => "San Miguel"
];
print_r($arrayAsociativo["nombre"]."\n");

//array propieadades y metodos
//saber el largo del array
print count($array)."\n";

//agregar elementos al final del array
array_push($array, 6);
$array[] = 7;

//agregar elementos al inicio del array
array_unshift($array, 0);

print_r($array);

//eliminar el ultimo elemento del array
array_pop($array);
print_r($array);

//eliminar el primer elemento del array
array_shift($array);
print_r($array);

//recorrer un array
foreach ($array as $valor) {
    echo "El valor es: {$valor}\n";
}

//array multidimensionales o matrices
$arrayMultimensional = [
    "nombre" => "Jairo",
    "edad" => 30,
    "hobbies" => ["Programar", "Leer", "Correr", "otros" => [ "Jugar jueguitos" => ["LOL","DOTA2","CS2"]]]

];
print_r($arrayMultimensional);

//=====================================================
//clases y objetos
class Persona {
    //atributos o propiedades
    private $nombre;
    private $edad;

    //constructor
    public function __construct($nombreParam, $edadParam) {
        $this->nombre = $nombreParam;
        $this->edad = $edadParam;
    }
    //metodos o funciones
    public function getNombre() {
        return $this->nombre;
    }
    public function getEdad() {
        return $this->edad;
    }

    /**
     * Set the value of nombre
     * @param string $nombre
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of edad
     * @param int $edad
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }
}
//crear un objeto
$persona1 = new Persona("Yony", 19);
//acceder a los metodos del objeto
echo "El nombre es: ".$persona1->getNombre()."\n";
echo "La edad es: ".$persona1->getEdad()."\n";

$persona1->setNombre("Alexander");
$persona1->setEdad(20); 
echo "El nuevo nombre es: ".$persona1->getNombre()."\n";
echo "La nueva edad es: ".$persona1->getEdad()."\n";

//LIFO - stack -> LAST IN FIRST OUT = ULTIMO EN ENTRAR, PRIMERO EN SALIR
//FIFO - queue -> FIRST IN FIRST OUT = PRIMERO EN ENTRAR, PRIMERO EN SALIR
?>