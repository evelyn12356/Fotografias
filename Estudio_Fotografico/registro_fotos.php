<?php
// Establecer la conexión a la base de datos
$connexion = mysqli_connect("localhost", "root", "", "fotos");

// Verificar si la conexión fue exitosa
if (!$connexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Recibir los datos del formulario
$nombre = $_GET["nombre"];
$ap = $_GET["ap"];
$am = $_GET["am"];
$ladapais = $_GET["ladapais"];
$ladaedo = $_GET["ladaedo"];
$telefono = $_GET["telefono"];
$correo = $_GET["correo"];

// Insertar los datos en la tabla telefono
$sql_telefono = "INSERT INTO telefono (lada_pais, lada_edo, numero) VALUES (?, ?, ?)";
$stmt_telefono = mysqli_prepare($connexion, $sql_telefono);
mysqli_stmt_bind_param($stmt_telefono, "sss", $ladapais, $ladaedo, $telefono);

if (mysqli_stmt_execute($stmt_telefono)) {
    echo "Registro en tabla teléfono exitoso.<br>";
    // Obtener el último ID insertado en la tabla telefono
    $id_telefono = mysqli_insert_id($connexion);
} else {
    die("Error al registrar en la tabla teléfono: " . mysqli_error($connexion));
}

// Insertar los datos en la tabla usuario
$sql_usuario = "INSERT INTO usuario (nombre, apellido_p, apellido_m, id_telefono, correo) VALUES (?, ?, ?, ?, ?)";
$stmt_usuario = mysqli_prepare($connexion, $sql_usuario);
mysqli_stmt_bind_param($stmt_usuario, "sssss", $nombre, $ap, $am, $id_telefono, $correo);

if (mysqli_stmt_execute($stmt_usuario)) {
    // Obtener el último ID insertado en la tabla usuario
    $id_usuario = mysqli_insert_id($connexion);

    // Mostrar el ID del usuario recién registrado
    echo "Registro de usuario exitoso.<br>";
    echo "El ID del usuario registrado es: " . $id_usuario . "<br>";
    echo '<a href="inicio.html">Ir al inicio</a>';
} else {
    die("Error al registrar usuario: " . mysqli_error($connexion));
}

// Cerrar la conexión
mysqli_close($connexion);
?>
