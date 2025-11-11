<?php 


class Estudiante{
    private $id;
    private $nombre;
    private $edad;
    private $promedio;
    private $id_curso;
    private $table_name = "estudiantes";
    private $db_connection;

    public function __construct($db){
      $this->db_connection = $db;
    }

    /**
     * Recupera todos los estudiantes con su información de curso correspondiente
     * 
     * Ejecuta una consulta JOIN entre las tablas de estudiantes y cursos
     * para obtener la información completa del estudiante incluyendo el nombre de su curso
     *
     * @return array Array asociativo que contiene todos los estudiantes con sus datos de curso:
     *               - id: ID del estudiante
     *               - nombre: Nombre del estudiante
     *               - edad: Edad del estudiante
     *               - promedio: Promedio del estudiante
     *               - id_curso: ID del curso
     *               - nombre_curso: Nombre del curso
     */
    public function getAll(){
        $query = "SELECT estudiantes.id, estudiantes.nombre, estudiantes.edad, estudiantes.promedio, estudiantes.id_curso, cursos.nombre AS nombre_curso FROM  {$this->table_name} INNER JOIN cursos ON estudiantes.id_curso = cursos.id";
        $sentence = $this->db_connection->prepare($query); // esta linea prepara la consulta en un gbd
        $sentence->execute(); // esta linea ejecuta la consulta
        return $sentence->fetchAll(PDO::FETCH_ASSOC); // esta linea devuelve todos los resultados en un array asociativo
    }


    /**
     * Crea un nuevo registro de estudiante en la base de datos.
     * 
     * @param string $nombre    Nombre del estudiante
     * @param int    $edad      Edad del estudiante
     * @param float  $promedio  Promedio académico del estudiante
     * @param int    $id_curso  Identificador del curso al que pertenece el estudiante
     * 
     * @return bool  Retorna true si la inserción fue exitosa, false en caso contrario
     */
    public function create($nombre, $edad, $promedio, $id_curso){
        $query = "INSERT INTO {$this->table_name} (nombre, edad, promedio, id_curso) VALUES (:nombre, :edad, :promedio, :id_curso)";
        $sentence = $this->db_connection->prepare($query);
        $sentence->bindParam(':nombre', $nombre);
        $sentence->bindParam(':edad', $edad);
        $sentence->bindParam(':promedio', $promedio);
        $sentence->bindParam(':id_curso', $id_curso);
        if($sentence->execute()){
            return true;
        }
        return false;
    }

    /**
     * Actualiza los datos de un estudiante en la base de datos
     * 
     * @param int $id ID del estudiante a actualizar
     * @param string $nombre Nuevo nombre del estudiante
     * @param int $edad Nueva edad del estudiante
     * @param float $promedio Nuevo promedio del estudiante
     * @param int $id_curso Nuevo ID del curso al que pertenece el estudiante
     * 
     * @return bool Retorna true si la actualización fue exitosa, false en caso contrario
     */
    public function update($id, $nombre, $edad, $promedio, $id_curso){
        $query = "UPDATE {$this->table_name} SET nombre = :nombre, edad = :edad, promedio = :promedio, id_curso = :id_curso WHERE id = :id";
        $sentence = $this->db_connection->prepare($query);
        $sentence->bindParam(':id', $id);
        $sentence->bindParam(':nombre', $nombre);
        $sentence->bindParam(':edad', $edad);
        $sentence->bindParam(':promedio', $promedio);
        $sentence->bindParam(':id_curso', $id_curso);
        if($sentence->execute()){
            return true;
        }
        return false;
    } 

    /**
     * Obtiene un estudiante específico de la base de datos por su ID
     * 
     * @param int $id El ID del estudiante a buscar
     * @return array|false Retorna un array asociativo con los datos del estudiante si se encuentra,
     *                     o false si no existe
     */
    public function getById($id){
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id";
        $sentence = $this->db_connection->prepare($query);
        $sentence->bindParam(':id', $id);
        $sentence->execute();
        return $sentence->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Elimina un registro de la tabla estudiante según el ID proporcionado
     * 
     * @param int $id ID del estudiante a eliminar
     * @return bool Retorna true si la eliminación fue exitosa, false en caso contrario
     */
    public function delete($id){
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $sentence = $this->db_connection->prepare($query);
        $sentence->bindParam(':id', $id);
        if($sentence->execute()){
            return true;
        }
        return false;
    }
}

?>