<?php 

class MostrarTareas{

    public function visualizarTareas($datos){
        $complemento = "";
        if(empty($datos)){
            $html = "Aun no hay tareas desarrolladas";
        }else{
            $html = "<center><table class='table table-striped'>
                <tr>
                    <td colspan='6' style='text-align: center; font-size: 30px;'>
                        Tareas Realizadas
                    </td>
                </tr>
                <tr>
                    <td>NOMBRE TAREA</td>
                    <td>DESCRIPCION TAREA</td>
                    <td>FECHA TAREA</td>
                    <td>EDIT</td>
                    <td>DEL</td>
                    <td>CHECK</td>
                </tr>";
                foreach($datos as $dt){
                    if($dt[5] == '2'){
                        $complemento = "<td colspan='3'><label style='color: green; text-align: center; font-size: 20px;'><b>Completado!</b></label></td>";
                    }else{
                        $complemento = '
                        <td>
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" onclick="actTarea('.$dt[0].')">Editar</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="delTarea('.$dt[0].')">Eliminar</button>
                        </td>
                        <td style="text-align: center"><input type="checkbox" id="checkSelect" name="checkSelect" data-toggle="modal" data-target="#myModalObservacion" onclick="checkCompletado('.$dt[0].');"></td>';
                    }
                    $html .=
                    '<tr>
                        <td style="text-align: center">'.$dt[1].'</td>
                        <td style="text-align: center">'.$dt[2].'</td>
                        <td style="text-align: center">'.$dt[3].'</td>';
                        $html .= $complemento;
                        $html .= '</tr>';
                }
            $html .='</table>';
        }
        echo $html;
    }

    public function mostrarActualizacionTarea($dataSeleccion){
        foreach($dataSeleccion as $dts){
            $html = '
            <table class="table table-striped">
                <tr>
                    <td>
                        Nombre tarea: 
                    </td>
                    <td>
                        <input type="text" id="tarea_act" name="tarea_act" value="'.$dts[1].'">
                    </td>
                </tr>
                <tr>
                    <td>
                        Descripcion tarea: 
                    </td>
                    <td>
                        <textarea id="descTarea_act" name="descTarea_act">'.$dts[2].'</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha tarea : 
                    </td>
                    <td>
                        <input type="date" id="fechaTarea_act" name="fechaTarea_act" value="'.$dts[3].'">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="btn btn-success" type="button" id="btnActualizar" name="btnActualizar" onclick="actualizarTarea('.$dts[0].')">Actualizar</button></center>
                    </td>
                </tr>
            </table>';
        }
        echo $html;
    }

    public function mostrarObservacion($id){
        $html = '
            <table class="table table-striped">
                <tr>
                    <td>
                        Observacion:  
                    </td>
                    <td>
                        <textarea type="text" id="observacion" name="observacion"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><button class="btn btn-success" type="button" id="btnObservacion" name="btnObservacion" onclick="guardarObservacion('.$id.')">Guardar</button></center>
                    </td>
                </tr>
            </table>';
            echo $html;
    }
}


?>