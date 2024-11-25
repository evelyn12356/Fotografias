<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "fotos";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Recibir los datos del formulario
$usuario_id = $_POST['usuario_id'];  // ID del usuario
$evento = $_POST['evento'];          // Nombre del evento
$fotografo_id = $_POST['fotografo']; // ID del fotógrafo
$fecha_evento = $_POST['fecha'];     // Fecha del evento
$hora_inicio = $_POST['hora_inicio']; // Hora de inicio
$hora_fin = $_POST['hora_fin'];      // Hora de finalización

// Verificar si el ID del usuario existe en la tabla "usuario"
$queryUsuario = "SELECT id_usuario FROM usuario WHERE id_usuario = '$usuario_id'";
$resultadoUsuario = mysqli_query($enlace, $queryUsuario);

if (mysqli_num_rows($resultadoUsuario) > 0) {
    // El ID del usuario existe, continuar con la inserción en la tabla "citas"

    // Insertar los datos en la tabla "citas"
    $sql = "INSERT INTO citaaas (id_usuario, evento, id_fotografo, fecha, hora_inicio, hora_fin) 
            VALUES ('$usuario_id', '$evento', '$fotografo_id', '$fecha_evento', '$hora_inicio', '$hora_fin')";

    if (mysqli_query($enlace, $sql)) {
        echo "Cita agendada correctamente.";
    } else {
        echo "Error al agendar la cita: " . mysqli_error($enlace);
    }
} else {
    // El ID del usuario no existe
    echo "El ID del usuario no existe en la base de datos.";
}

// Cerrar la conexión
mysqli_close($enlace);
?>

