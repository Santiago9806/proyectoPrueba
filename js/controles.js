
//Funcion para crear una nueva tarea

function guardarTarea(){
    var nombreTarea = $("#tarea").val();
    var descTarea = $("#descTarea").val();
    var fecha = $("#fechaTarea").val();

    if(nombreTarea == "" || descTarea == "" || fecha == ""){
        alert("Por favor veririque que todos los campos esten llenos");
    }else{
        $.ajax({
            url : '../controlador/calcula.php',
            type: 'POST',
            dataType: 'json',
            data : 'accion=guardarTarea&nombreTarea='+nombreTarea+'&descTarea='+descTarea+"&fecha="+fecha,
            success : function(resultado){
                if(resultado == '1'){
                    setTimeout(function(){
                        $("#divGuardado").fadeIn()
                    },500)
                    setTimeout(function(){
                        $("#divGuardado").fadeOut();
                        $("#tarea").val("");
                        $("#descTarea").val("");
                        $("#fechaTarea").val("");
                    },2000)
                }else{
                    setTimeout(function(){
                        $("#divError").fadeIn()
                    },500)
                    setTimeout(function(){
                        $("#divError").fadeOut();
                    },2000)
                }
            }
        })
    }
}

//Funcion para mostrar las tareas realizadas

function visualizarTareas(){
    $.ajax({
        url : 'controlador/calcula.php',
        type: 'POST',
        data: 'accion=mostrarTareas',
        success : function(respuesta){
                $("#contenedorInformacion").html(respuesta);
        }
    })
}

//Funcion para eliminar una tarea

function delTarea(id){

    var confirmar = confirm("Esta seguro que desea eliminar la tarea ?");

    if(confirmar){
        $.ajax({
            url : 'controlador/calcula.php',
            type: 'POST',
            dataType: 'json',
            data : 'accion=eliminarTarea&id='+id,
            success : function(resultado){
                if(resultado == '1'){
                    setTimeout(function(){
                        $("#tareaEliminada").fadeIn();
                    },500)
                    setTimeout(function(){
                        $("#tareaEliminada").fadeOut()
                    },2000)
                    setTimeout(function(){
                        visualizarTareas();
                    },2000)
                }else{
                    setTimeout(function(){
                        $("#errorTareaEliminada").fadeIn();
                    },500)
                    setTimeout(function(){
                        $("#errorTareaEliminada").fadeOut()
                    },2000)
                }
            }
        })
    }
}

// funcion para visualizar la tarea en el modal

function actTarea(id){
    $.ajax({
        url: 'controlador/calcula.php',
        type: 'POST',
        data: 'accion=actTarea&id='+id,
        success: function(respuesta){
            $(".modal-body").html(respuesta);
        }
    })
}

// Funcion para actualizar la tarea seleccionada

function actualizarTarea(id){
    var nombreTarea = $("#tarea_act").val();
    var descTarea = $("#descTarea_act").val();
    var fecha = $("#fechaTarea_act").val();

    $.ajax({
        url : 'controlador/calcula.php',
        type: 'POST',
        dataType: 'json',
        data : 'accion=actualizarTarea&nombreTarea='+nombreTarea+'&descTarea='+descTarea+"&fecha="+fecha+"&id="+id,
        success : function(resultado){
            if(resultado == '1'){
                setTimeout(function(){
                    $("#tareaActualizada").fadeIn();
                },500)
                setTimeout(function(){
                    $("#tareaActualizada").fadeOut();
                },2000)
                setTimeout(function(){
                    location.reload();
                },2000)
            }else{
                setTimeout(function(){
                    $("#errorTareaActualizada").fadeIn();

                },500)
                setTimeout(function(){
                    $("#errorTareaActualizada").fadeOut();
                },2000)
            }
        }
    })
}

function contactenos(){
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var telefono = $("#telefono").val();
    var mensaje = $("#mensaje").val();

    $.ajax({
        url : '../controlador/calcula.php',
        type: 'POST',
        dataType: 'json',
        data : 'accion=guardaContactenos&nombre='+nombre+'&email='+email+"&telefono="+telefono+"&mensaje="+mensaje,
        success : function(resultado){
            if(resultado == '1'){
                setTimeout(function(){
                    $("#divGuardadoContacto").fadeIn()
                },500)
                setTimeout(function(){
                    $("#divGuardadoContacto").fadeOut();
                    $("#nombre").val("");
                    $("#email").val("");
                    $("#telefono").val("");
                    $("#mensaje").val("");
                },2000)
            }else{
                setTimeout(function(){
                    $("#divErrorContacto").fadeIn()
                },500)
                setTimeout(function(){
                    $("#divErrorContacto").fadeOut();
                },2000)
            }
        }
    })
}

// Funcion para mostrar modal para guardar la observacion
function checkCompletado(id){
    
    if($("#checkSelect").is(':checked')) { 
        $.ajax({
            url : 'controlador/calcula.php',
            type: 'POST',
            data: 'accion=observacionGuardado&id='+id,
            success : function(resultado){
                $(".modal-body-observacion").html(resultado);
            }
        })
    }
}

function guardarObservacion(id){
    var confirmar = confirm("Esta seguro que desea guardar esta observacion?");
    var observacion = $("#observacion").val();

    if(confirmar){
        $.ajax({
            url : 'controlador/calcula.php',
            type: 'POST',
            dataType: 'json',
            data : 'accion=guardaObservacion&observacion='+observacion+'&id='+id,
            success : function(resultado){
                if(resultado == '1'){
                    setTimeout(function(){
                        $("#observacionGuardada").fadeIn();
                    },500)
                    setTimeout(function(){
                        $("#observacionGuardada").fadeOut();
                    },2000)
                }else{
                    setTimeout(function(){
                        $("#errorObservacion").fadeIn();
                    },500)
                    setTimeout(function(){
                        $("#errorObservacion").fadeOut();
                    },2000)
                }
            }
        })
    }
}