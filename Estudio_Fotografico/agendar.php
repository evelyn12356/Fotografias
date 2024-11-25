<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="age.css">
    <link rel="stylesheet" href="inicio.css">
    <link rel="icon" type="image/ico" href="camara.png">
</head>
<body>
    <header>
        <nav style="font-family: 'cooper black', sans-serif;">
            <img src="img/camara.png" alt="logo" class="logo">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <a href="#" class="enlace"></a>
            <ul class="menu">
                <li><a href="inicio.html">INICIO</a></li>
                <li><a href="promo_fotos.html">PAQUETES</a></li>
                <li><a href="catalogo_fotos.html">TRABAJOS</a></li>
                <li><a href="agendar.html">AGENDAR</a></li>
                <li><a href="contacto.html">CONTACTANOS</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <h1>AGENDAR CITA</h1>
    <div class="container">
        <!-- Formulario para agendar citas -->
        <form action="age.php" method="post" class="formulario-evento">
            <h2>Agregar Evento</h2>
            <label for="usuario_id">ID del Usuario:</label>
            <input type="text" id="usuario_id" name="usuario_id" placeholder="ID del usuario" required>
            
            <label for="evento">Nombre del Evento:</label>
            <input type="text" id="evento" name="evento" placeholder="Nombre del evento" required>
            

            <label for="fotografo">Fotógrafo:</label>
            <select id="fotografo" name="fotografo" required>
                <option value="">Seleccione un fotógrafo</option>
                <?php
                // PHP para cargar fotógrafos desde la base de datos
                $servidor = "localhost";
                $usuario = "root";
                $clave = "";
                $baseDatos = "fotos";

                $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

                if (!$enlace) {
                    echo "<option value=''>Error de conexión: " . htmlspecialchars(mysqli_connect_error()) . "</option>";
                } else {
                    $consultaFotografos = "SELECT id_fotografo, nombre, apellido_p, apellido_m FROM fotografo";
                    $resultadoFotografos = mysqli_query($enlace, $consultaFotografos);

                    if ($resultadoFotografos) {
                        if (mysqli_num_rows($resultadoFotografos) > 0) {
                            while ($fotografo = mysqli_fetch_assoc($resultadoFotografos)) {
                                echo "<option value='{$fotografo['id_fotografo']}'>
                                    {$fotografo['nombre']} {$fotografo['apellido_p']} {$fotografo['apellido_m']}
                                </option>";
                            }
                        } else {
                            echo "<option value=''>No hay fotógrafos disponibles</option>";
                        }
                    } else {
                        echo "<option value=''>Error al ejecutar la consulta</option>";
                    }
                    mysqli_close($enlace);
                }
                ?>
            </select>

            <label for="fecha_evento">Fecha del Evento:</label>
            <input type="date" id="fecha_evento" name="fecha" required>

            <label for="hora_inicio">Hora de Inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" required>

            <label for="hora_fin">Hora de Finalización:</label>
            <input type="time" id="hora_fin" name="hora_fin" required>

            <button type="submit" name="agregar" class="btn-agregar">Agregar Evento</button>
        </form>
    </div>
</body>
</html>
