<?php 

class Consultas{

    public function getGuardaTarea($nombre,$descripcion,$fecha){
        require '../conexion/conexion.php';

        $afectados = 0;
        $sql = "INSERT INTO tareas (nombre_tarea,descripcion_tarea,fecha_tarea) VALUES ('".$nombre."','".$descripcion."','".$fecha."')";
        $result = mysqli_query($conectar,$sql);

        if($result == '1'){
            $afectados =  $result;
        }

        return $afectados;
    }

    public function getMostrarDatos(){
        require '../conexion/conexion.php';
        $sql = "SELECT * FROM tareas WHERE estado IN (1,2)";
        $obtener = mysqli_query($conectar,$sql);
        $datosConsulta = mysqli_fetch_all($obtener);
        return $datosConsulta;
    }

    public function eliminarTarea($id){
        require '../conexion/conexion.php';

        $afectados = 0;
        $sql = "UPDATE tareas SET estado = '0' WHERE id = '".$id."' AND estado = '1'";
        $ejecucion = mysqli_query($conectar,$sql);

        if($ejecucion == '1'){
            $afectados = $ejecucion;
        }
        return $afectados;
    }

    public function getSeleccion($id){
        require '../conexion/conexion.php';

        $sql = "SELECT * FROM tareas WHERE id = '".$id."'";
        $obtenerDatos = mysqli_query($conectar,$sql);
        $datos = mysqli_fetch_all($obtenerDatos);
        return $datos;
    }

    public function actualizaTarea($nombre,$descripcion,$fecha,$id){
        require '../conexion/conexion.php';

        $afectados = 0;
        $sql = "UPDATE tareas SET nombre_tarea = '".$nombre."', descripcion_tarea='".$descripcion."',fecha_tarea='".$fecha."' WHERE id = '".$id."'";
        $result = mysqli_query($conectar,$sql);

        if($result == '1'){
            $afectados =  $result;
        }

        return $afectados;   
    }

    public function guardaContactenos($nombre,$email,$telefono,$mensaje){
        require '../conexion/conexion.php';

        $afectados = 0;
        $sql = "INSERT INTO contactenos (nombre,email,telefono,mensaje) VALUES ('".$nombre."','".$email."','".$telefono."','".$mensaje."')";
        $result = mysqli_query($conectar,$sql);

        if($result == '1'){
            $afectados =  $result;
        }

        return $afectados;
    }

    public function guardaObservacion($observacion,$id){
        require '../conexion/conexion.php';

        $afectados = 0;
        $sql = "UPDATE tareas SET observacion = '".$observacion."',estado = '2' WHERE id = '".$id."'";
        $result = mysqli_query($conectar,$sql);

        if($result == '1'){
            $afectados =  $result;
        }

        return $afectados;
    }

}


?>