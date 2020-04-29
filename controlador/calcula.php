<?php 

require '../conexion/conexion.php';
include '../modelo/consultas.php';
include '../vista/mostrarTareas.php';

if($_POST['accion'] == "guardarTarea"){
    
    $consulta = new consultas();

    $nombre = $_POST['nombreTarea'];
    $desripcion = $_POST['descTarea'];
    $fecha = $_POST['fecha'];

    $guardaTarea = $consulta->getGuardaTarea($nombre,$desripcion,$fecha);

    echo json_encode($guardaTarea);
}

if($_POST['accion'] == "mostrarTareas"){

    $consulta = new consultas();
    $vista = new MostrarTareas();
    $mostrarData = $consulta->getMostrarDatos();

    $envioData = $vista->visualizarTareas($mostrarData);

    return $envioData;
}

if($_POST['accion'] == "eliminarTarea"){

    $consultas = new consultas();
    $id = $_POST['id'];

    $eliminar = $consultas->eliminarTarea($id);

    echo json_encode($eliminar);
}

if($_POST['accion'] == "actTarea"){
    $consultas = new consultas();
    $vista = new MostrarTareas();

    $id = $_POST['id'];
    $dataSeleccion = $consultas->getSeleccion($id);

    $mostrarModal = $vista->mostrarActualizacionTarea($dataSeleccion);

    return $mostrarModal;
}

if($_POST['accion'] == "actualizarTarea"){

    $consulta = new consultas();

    $nombre = $_POST['nombreTarea'];
    $desripcion = $_POST['descTarea'];
    $fecha = $_POST['fecha'];
    $id = $_POST['id'];

    $actualizaTarea = $consulta->actualizaTarea($nombre,$desripcion,$fecha,$id);

    echo json_encode($actualizaTarea);
}

if($_POST['accion'] == "guardaContactenos"){

    $consulta = new consultas();

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    $guardaTarea = $consulta->guardaContactenos($nombre,$email,$telefono,$mensaje);

    echo json_encode($guardaTarea);
}

if($_POST['accion'] == "observacionGuardado"){
    $vista = new MostrarTareas();

    $id = $_POST['id'];

    $mostrarModalObservacion = $vista->mostrarObservacion($id);

    return $mostrarModalObservacion;
}

if($_POST['accion'] == "guardaObservacion"){

    $consulta = new consultas();

    $observacion = $_POST['observacion'];
    $id = $_POST['id'];

    $guardaObservacion = $consulta->guardaObservacion($observacion,$id);

    echo json_encode($guardaObservacion);

}

?>