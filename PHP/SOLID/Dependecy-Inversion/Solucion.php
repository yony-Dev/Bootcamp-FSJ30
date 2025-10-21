<?php 

    interface IAdaptador{
        function conectarDB();
    }

    class BDConexion{
        private $adaptador;

        function __construct(IAdaptador $bd)
        {
            $this->adaptador = $bd;
        }

        function conectar(){
            $this->adaptador->conectarDB();
        }
    }

    class MySQLDB implements IAdaptador {
        //Credenciales

        function conectarDB(){
            //Logica para conectar la base de datos
            echo "Me estoy conectando a MySQLDB \n";
        }
    }

    class MongoDB implements IAdaptador {
          function conectarDB(){
            //Logica para conectar la base de datos
            echo "Me estoy conectando a MongoDB \n";
        }
    }

    class FirestoreBD implements IAdaptador{

        function conectarDB(){
            echo "Me estoy conectando a FirestoreBD \n";
        }

    }

    $mysql = new MySQLDB();
    $mongo = new MongoDB();
    $firestore = new FirestoreBD();

    $bdFirestore = new BDConexion($firestore);
    $bdconexionMongo = new BDConexion($mongo);
    $bdConexion = new BDConexion($mysql);
    $bdConexion->conectar();
    $bdconexionMongo->conectar();
    $bdFirestore->conectar();
?>