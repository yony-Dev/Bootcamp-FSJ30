<?php 

    // Principio de Inversión de Dependencias (Dependency Inversion Principle - DIP)
    // Los módulos de alto nivel no deben depender de los módulos de bajo nivel.
    // Ambos deben depender de abstracciones.
    // Las abstracciones no deben depender de los detalles.
    // Los detalles deben depender de las abstracciones.

    class BDConexion{
        private $adaptador;
        private $adaptador2;

        function __construct()
        {
            $this->adaptador = new MysqlDB();
            $this->adaptador2 = new MongoDB();
        }

        function conectar(){
            $this->adaptador->conectarDB();
            $this->adaptador2->conectarDB();
        }
    }

    class MySQLDB {
        //Credenciales

        function conectarDB(){
            //Logica para conectar la base de datos
        }
    }

    class MongoDB{
          function conectarDB(){
            //Logica para conectar la base de datos
        }
    }

    $connect = new BDConexion();
    $connect->conectar();

?>