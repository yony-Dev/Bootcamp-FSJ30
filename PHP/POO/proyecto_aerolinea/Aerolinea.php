<?php

class Aerolinea{
    private $nombre;
    private $cant_aviones;
    private $tipo_aerolinea;
    private $id;

    function __construct($idParam, $nombreParam, $cant_avionesParam, $tipo_aerolineParam)
    {
        $this -> id = $idParam;
        $this->nombre = $nombreParam;
        $this->cant_aviones = $cant_avionesParam;
        $this->tipo_aerolinea = $tipo_aerolineParam;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param string $nombre
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }

    /**
     * Get the value of cant_aviones
     */ 
    public function getCant_aviones()
    {
        return $this->cant_aviones;
    }

    /**
     * Set the value of cant_aviones
     *
     * @param number $cat_aviones
     */ 
    public function setCant_aviones($cant_aviones)
    {
        $this->cant_aviones = $cant_aviones;
    }

    /**
     * Get the value of tipo_aerolinea
     */ 
    public function getTipo_aerolinea()
    {
        return $this->tipo_aerolinea;
    }

    /**
     * Set the value of tipo_aerolinea
     *
     * @param string $tipo_aerolinea
     */ 
    public function setTipo_aerolinea($tipo_aerolinea)
    {
        $this->tipo_aerolinea = $tipo_aerolinea;

    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}

?>