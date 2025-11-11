<?php 
require_once './models/Estudiante.php';
require_once './config/Database.php';
require_once './models/Curso.php';

class EstudianteController{
    private $estudianteModel;
    private $cursoModel;

    public function __construct(){
        $database = new Database();
        $db = $database->getConnection();
        $this->estudianteModel = new Estudiante($db);
        $this->cursoModel = new Curso($db);
    }

    public function read(){
        $estudiantes = $this->estudianteModel->getAll();
        include_once './views/home.php';
    }

    public function create(){
        $cursos = $this->cursoModel->getAll();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $promedio = $_POST['promedio'];
            $id_curso = $_POST['curso'];

            $this->estudianteModel->create($nombre, $edad, $promedio, $id_curso);
            header("Location: ./index.php?action=read");
            exit();

        }

        include_once './views/create.php';
    }

    public function update($id){
        $cursos = $this->cursoModel->getAll();

        $estudiante = $this->estudianteModel->getById($id);


        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $promedio = $_POST['promedio'];
            $id_curso = $_POST['curso'];

            $this->estudianteModel->update($id, $nombre, $edad, $promedio, $id_curso);
            header("Location: ./index.php?action=read");
            exit();
        }
        include_once './views/edit.php';
    }

    public function delete($id){
        if ($id !== null) {
            $this->estudianteModel->delete($id);
            header("Location: ./index.php?action=read");
            exit();
        }
    }
}

?>