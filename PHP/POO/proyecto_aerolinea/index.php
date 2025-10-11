<?php 
//print_r($_POST);
require_once './Aerolinea.php';
// $_SESSION -> Variable reservada para almacenar datos (Array assoc)
//INICIAMOS LA SESION PARA PODER UTILIZAR LA VARIABLE $_SESSION

session_start();

//print_r($_SESSION);

//Llamamos la clase Aerolineas para crear un objeto
// include -> Incluir el archivo y si no existe, mostrar un error y continuar la ejecucion del codigo
// require -> Requerir el archivo y si no existe, mostrar un error y detener la ejecucion del codigo

// include_once -> Incluir el archivo una sola vez, si se vuelve a llamar dentro de este archivo, va a usar la misma referencia
// require_once -> Requerir el archivo una sola vez, si se vuelve a llamar dentro de este archivo, va a usar la misma referencia


print_r($_GET);


// Persistencia de datos
// Auxiliar para prechequear session
if(!isset($_SESSION['aerolineas'])){
    $_SESSION['aerolineas'] = [];
}


$aerolineas = $_SESSION['aerolineas'];

//Create form
if(isset($_POST['createForm'])){

if(isset($_POST['nombre_aerolinea'], $_POST['cantidad_aviones'], $_POST['tipo_aerolinea']) ){

    $id = rand(1,1000);
    $nombre = $_POST['nombre_aerolinea'];
    $cant_aviones = $_POST['cantidad_aviones'];
    $tipo_aero = $_POST['tipo_aerolinea'];
    
    $aerolineacita = new Aerolinea($id,$nombre,$cant_aviones,$tipo_aero);
    
    print_r($aerolineacita);
    array_push($aerolineas,$aerolineacita);
    //$aerolineas[] = $aerolineacita;

    // $_SESSION['aerolineas'][] = $aerolineas; otra forma de pushear los datos
    $_SESSION['aerolineas'] = $aerolineas;

    //echo "<h1>Aerolineas hasta ahora</h1><br>"; 
    //print_r($_SESSION['aerolineas']);
}
}

//Buscar una aerolinea en particular a traves de su ID

function obtenerAerolineaPorId($aerolineas, $id){
    foreach($aerolineas as $aerolinea){
        if($aerolinea->getId() == $id){
            return $aerolinea;
        }
    }
}

//Edit form

if( isset($_POST['updateForm'])){
    //La logica para actualizar una aerolinea
    foreach($aerolineas as $aerolinea){
        if($aerolinea->getId() == $_GET['editar'] ){

            $aerolinea->setNombre($_POST['nombre_aerolinea']);
            $aerolinea->setCant_aviones($_POST['cantidad_aviones']);
            $aerolinea->setTipo_aerolinea($_POST['tipo_aerolinea']);
        }
    }
    header('Location: /PHP/POO/proyecto_aerolinea/index.php');
}

//Delete

if(isset($_GET['eliminar'])){
    print_r($_GET['eliminar']);

    foreach($aerolineas as $idx => $aerolinea){

        if($aerolinea->getId() == $_GET['eliminar'] ){
            unset($aerolineas[$idx]);
            break;
        }
    }

    $_SESSION['aerolineas'] = $aerolineas;
    header('Location: /PHP/POO/proyecto_aerolinea/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica CRUD Aerolineas</title>
</head>
<body style="background-color: gray;" >
    <h1>Holiwis bienvenido a Aerolineas Benitez</h1>

    <?php 
        if( isset($_GET['editar']) ){
            $aerolineaEditable = obtenerAerolineaPorId($aerolineas,$_GET['editar']);
            print_r($aerolineaEditable);
?>    
 <!-- FORMULARIO PARA EDITAR UNA AEROLINEA-->
  <h3>Editar una nueva aerolinea</h3>
    <form action="" method="POST">
        <input type="hidden" name="updateForm" value="editForm">

        <label for="nombre_aerolinea">Nombre Aerolinea: </label>
        <input type="text" name="nombre_aerolinea" value="<?php echo $aerolineaEditable->getNombre() ?>" required>

        <label for="cantidad_aviones">Cantidad Aviones: </label>
        <input type="text" name="cantidad_aviones" value="<?php echo $aerolineaEditable->getCant_aviones() ?>"required>

        <label for="tipo_aerolinea">Tipo de Aerolinea: </label>
        <select type="text" name="tipo_aerolinea" >
            <option value="Privado" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Privado') ? 'selected' : '' ?> >Privado</option>
            <option value="Comercial" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Comercial') ? 'selected' : '' ?> >Comercial</option>
            <option value="Carga" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Carga' ) ? 'selected' : '' ?> >Carga</option>
            <option value="Nacional" <?php echo ($aerolineaEditable->getTipo_aerolinea() === 'Nacional')? 'selected' : '' ?> >Nacional</option>
        </select>
        <button type="submit">Editar</button>

    </form>
 
<?php
        } else {
?>
    <!-- FORMULARIO PARA CREAR UNA AEROLINEA-->
    <h3>Crear una nueva aerolinea</h3>
    <form action="" method="POST">
        <input type="hidden" name="createForm" value="createForm">

        <label for="nombre_aerolinea">Nombre Aerolinea: </label>
        <input type="text" name="nombre_aerolinea" required>

        <label for="nombre_aerolinea">Cantidad Aviones: </label>
        <input type="text" name="cantidad_aviones" required>

        <label for="nombre_aerolinea">Tipo de Aerolinea: </label>
        <select type="text" name="tipo_aerolinea">
            <option value="Privado">Privado</option>
            <option value="Comercial">Comercial</option>
            <option value="Carga">Carga</option>
            <option value="Nacional">Nacional</option>
        </select>
        <button type="submit">Crear</button>

    </form>
<?php }?>
    <main>
        <table>
            <thead>
                <th># ID</th>
                <th>Nombre</th>
                <th>Cantidad de aviones</th>
                <th>Tipo Aerolinea</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php 
                    foreach($aerolineas as $aero){
                        echo "<tr>
                            <td>{$aero->getId()}</td>
                            <td>{$aero->getNombre()}</td>
                            <td>{$aero->getCant_aviones()}</td>
                            <td>{$aero->getTipo_aerolinea()}</td>
                            <td>
                            <a href='?editar={$aero->getId()}'>Editar</a>
                            <a href='?eliminar={$aero->getId()}'>Eliminar</a>
                            </td>
                        </tr> ";
                    }
                ?>
            </tbody>

        </table>
    </main>
</body>
</html>