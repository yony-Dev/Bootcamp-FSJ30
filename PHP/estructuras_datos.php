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

class Stack {
    private $data;
    //constructor con parametros opcionales
    public function __construct($dataParams = []) {
        $this->data = $dataParams;
    }

    //metodos para agregar elementos
    function add($element) {
        array_push($this->data, $element);
    }
    //metodo para eliminar elementos
    function remove() {
        return array_pop($this->data);
    }
}
$satcksito = new Stack([1,2,3,4]);
//FIFO - queue -> FIRST IN FIRST OUT = PRIMERO EN ENTRAR, PRIMERO EN SALIR


class Queue {
    private $data;
    //constructor con parametros opcionales
    public function __construct($dataParams = []) {
        $this->data = $dataParams;
    }

    //metodos para agregar elementos
    function add($element) {
        array_push($this->data, $element);
    }
    //metodo para eliminar elementos
    function remove() {
        return array_shift($this->data);
    }
}
$colasita = new Queue([1,2,3,4]);

//================================================
//lista enlazadas
class Node{
    private $value;
    private $next;
    public function __construct($valueParam) {
        $this->value = $valueParam;
        $this->next = null;
    }
    public function getValue() {
        return $this->value;
    }
    public function getNext() {
        return $this->next;
    }
    public function setNext($nextParam) {
        $this->next = $nextParam;
    }

} 
class LinkedList{
    private $head;
    public function __construct() {
        $this->head = null;
    }
    function add($value){
        //crear un nuevo nodo
        $newNode = new Node($value);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            //recorrer la lista mientras el siguiente no sea nulo
            while ($current->getNext() !== null) {
                $current = $current->getNext();

            }
            //cuando se llega al final de la lista, enlazar el nuevo nodo
            $current->setNext($newNode);
        }
    }
}
$listita = new LinkedList();
$listita->add(3);
$listita->add(1);
$listita->add(5);
print_r($listita);

//================================================
// ARBOLES BINARIOS DE BUSQUEDA
class Nodo {
    private $valor;
    private $izq;
    private $der;

    function __construct($valorParam) {
        $this->valor = $valorParam;
        $this->izq = null;
        $this->der = null;
    }

    // Getters
    function getValor() {
        return $this->valor;
    }
    function getIzq() {
        return $this->izq;
    }
    function getDer() {
        return $this->der;
    }

    // Setters
    function setValor($data) {
        $this->valor = $data;
    }
    function setIzq($data) {
        $this->izq = $data;
    }
    function setDer($data) {
        $this->der = $data;
    }
}

class ArbolBinario {
    private $raiz;

    function __construct($data = null) {
        $this->raiz = $data;
    }

    function agregar($data) {
        $nuevoNodo = new Nodo($data);

        if ($this->raiz === null) {
            $this->raiz = $nuevoNodo;
            return $this->raiz;
        }

        $auxiliar = $this->raiz;

        while (true) {
            if ($nuevoNodo->getValor() > $auxiliar->getValor()) {
                if($auxiliar->getDer() === null){
                $auxiliar->setDer($nuevoNodo);
                return $nuevoNodo;
                }else{
                $auxiliar = $auxiliar->getDer();
                }
            }else {
                if ($auxiliar->getIzq() === null){
                    $auxiliar->setIzq($nuevoNodo);
                    return $nuevoNodo;
                }else{
                    $auxiliar->getIzq();
                }
            }
        }
    }
    //Funcion para encontrar un dato. Devolver un mensaje si el dato existe
function encontrar($data){
    if ($this->raiz === null) {
        return "El árbol está vacío";
    }

    $current = $this->raiz;

    while ($current !== null) {
        if ($current->getValor() == $data) {
            return "Dato encontrado: {$data}";
        } elseif ($data < $current->getValor()) {
            $current = $current->getIzq();
        } else {
            $current = $current->getDer();
        }
    }

    return "El dato {$data} no existe";
}



    //Funcion para eliminar un dato existente
}

// Prueba
$nNodo = new Nodo(10);
$arbolito = new ArbolBinario($nNodo);

$arbolito->agregar(17);
$arbolito->agregar(13);
print_r($arbolito);

$arbolVacio= new ArbolBinario();
echo $arbolito->encontrar(13); 
echo "\n";
echo $arbolito->encontrar(20);

?>