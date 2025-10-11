<?php
require_once 'Libro.php';

$archivo = 'biblioteca.txt';
$libros = [];

// Cargar libros si el archivo existe
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $libros = unserialize($contenido);
    if (!is_array($libros)) {
        $libros = [];
    }
}

// Guardar los cambios
function guardarLibros($libros, $archivo) {
    file_put_contents($archivo, serialize($libros));
}

// Agregar un libro nuevo
if (isset($_POST['agregar'])) {
    $id = count($libros) + 1;
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];

    $nuevoLibro = new Libro($id, $titulo, $autor, $categoria);
    $libros[] = $nuevoLibro;
    guardarLibros($libros, $archivo);
    header("Location: index.php");
    exit;
}

// Editar libro existente
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    foreach ($libros as $libro) {
        if ($libro->getId() == $id) {
            $libro->setTitulo($_POST['titulo']);
            $libro->setAutor($_POST['autor']);
            $libro->setCategoria($_POST['categoria']);
            break;
        }
    }
    guardarLibros($libros, $archivo);
    header("Location: index.php");
    exit;
}

// Prestar / devolver libro
if (isset($_GET['accion']) && $_GET['accion'] === 'prestar') {
    $id = $_GET['id'];
    foreach ($libros as $libro) {
        if ($libro->getId() == $id) {
            $libro->setDisponible(!$libro->getDisponible());
            break;
        }
    }
    guardarLibros($libros, $archivo);
    header("Location: index.php");
    exit;
}

// Eliminar libro
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
    $id = $_GET['id'];
    $libros = array_filter($libros, fn($l) => $l->getId() != $id);
    guardarLibros($libros, $archivo);
    header("Location: index.php");
    exit;
}

// Cargar libro para edición
$libroEditar = null;
if (isset($_GET['accion']) && $_GET['accion'] === 'editar') {
    $id = $_GET['id'];
    foreach ($libros as $libro) {
        if ($libro->getId() == $id) {
            $libroEditar = $libro;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f0f4f8;
        color: #333;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #2b4c7e;
        background-color: #dbe2ef;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 400px;
        margin: 20px auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #444;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    button, input[type="submit"] {
        background-color: #2b4c7e;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 15px;
        width: 100%;
        font-weight: bold;
        transition: 0.2s;
    }

    button:hover, input[type="submit"]:hover {
        background-color: #3e6cb0;
    }

    table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #2b4c7e;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f7f9fc;
    }

    tr:hover {
        background-color: #e9eff8;
    }

    a {
        text-decoration: none;
        color: #2b4c7e;
        font-weight: bold;
        margin: 0 4px;
    }

    a:hover {
        text-decoration: underline;
    }

    .estado-disponible {
        color: green;
        font-weight: bold;
    }

    .estado-prestado {
        color: crimson;
        font-weight: bold;
    }
</style>

</head>
<body>
    <h1>Bibliotech</h1>

    <h2><?php echo $libroEditar ? "Editar Libro" : "Agregar Libro"; ?></h2>
    <form method="POST">
        <?php if ($libroEditar): ?>
            <input type="hidden" name="id" value="<?= $libroEditar->getId(); ?>">
        <?php endif; ?>

        <label>Título:</label>
        <input type="text" name="titulo" required value="<?= $libroEditar ? $libroEditar->getTitulo() : ''; ?>"><br>

        <label>Autor:</label>
        <input type="text" name="autor" required value="<?= $libroEditar ? $libroEditar->getAutor() : ''; ?>"><br>

        <label>Categoría:</label>
        <input type="text" name="categoria" required value="<?= $libroEditar ? $libroEditar->getCategoria() : ''; ?>"><br>

        <button type="submit" name="<?= $libroEditar ? 'editar' : 'agregar'; ?>">
            <?= $libroEditar ? 'Guardar Cambios' : 'Agregar Libro'; ?>
        </button>
    </form>

    <h2>Lista de Libros</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($libros as $libro): ?>
        <tr>
            <td><?= $libro->getId(); ?></td>
            <td><?= $libro->getTitulo(); ?></td>
            <td><?= $libro->getAutor(); ?></td>
            <td><?= $libro->getCategoria(); ?></td>
            <td><?= $libro->getDisponible() ? 'Disponible' : 'Prestado'; ?></td>
            <td>
                <a href="?accion=editar&id=<?= $libro->getId(); ?>">Editar</a> |
                <a href="?accion=prestar&id=<?= $libro->getId(); ?>">
                    <?= $libro->getDisponible() ? 'Prestar' : 'Devolver'; ?>
                </a> |
                <a href="?accion=eliminar&id=<?= $libro->getId(); ?>" onclick="return confirm('¿Seguro que quieres elimarlo? No podras deshacer el cambio.')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
