<?php
$enlace = new mysqli("localhost", "root", "", "fotos");

if ($enlace->connect_error) {
    die("Error de conexión: " . $enlace->connect_error);
}

if (isset($_POST['id_usuario']) && !empty($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    $query = "
        SELECT
            usuario.nombre AS usuario_nombre,
            usuario.apellido_p AS usuario_apellido_p, 
            usuario.apellido_m AS usuario_apellido_m,
            telefono.numero AS telefono_numero,
            telefono.lada_edo AS telefono_lada_edo,
            fotografo.nombre AS fotografo_nombre,
            fotografo.apellido_p AS fotografo_apellido_p,
            citaaas.fecha AS fecha_evento,
            citaaas.evento AS evento,
            citaaas.hora_inicio AS hora_inicio,
            citaaas.hora_fin AS hora_fin
        FROM usuario
        LEFT JOIN telefono ON usuario.id_telefono = telefono.id_telefono
        LEFT JOIN citaaas ON usuario.id_usuario = citaaas.id_usuario
        LEFT JOIN fotografo ON citaaas.id_fotografo = fotografo.id_fotografo
        WHERE usuario.id_usuario = ?
    ";

    $stmt = $enlace->prepare($query);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Número de Teléfono</th>
                <th>Fotógrafo</th>
                <th>Fecha del Evento</th>
                <th>Hora de Inicio</th>
                <th>Hora de Fin</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($row['usuario_nombre']) . "</td>
                <td>" . htmlspecialchars($row['usuario_apellido_p']) . "</td>
                <td>" . htmlspecialchars($row['usuario_apellido_m']) . "</td>
                <td>" . htmlspecialchars($row['telefono_lada_edo']) . " " . htmlspecialchars($row['telefono_numero']) . "</td>
                <td>" . htmlspecialchars($row['fotografo_nombre']) . " " . htmlspecialchars($row['fotografo_apellido_p']) . "</td>
                <td>" . htmlspecialchars($row['fecha_evento']) . "</td>
                <td>" . htmlspecialchars($row['hora_inicio']) . "</td>
                <td>" . htmlspecialchars($row['hora_fin']) . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron registros para el ID de usuario: $id_usuario";
    }

    $stmt->close();
} elseif (isset($_POST['mostrar_todos'])) {
    $query = "
        SELECT
            usuario.nombre AS usuario_nombre,
            usuario.apellido_p AS usuario_apellido_p, 
            usuario.apellido_m AS usuario_apellido_m,
            telefono.numero AS telefono_numero,
            telefono.lada_edo AS telefono_lada_edo,
            fotografo.nombre AS fotografo_nombre,
            fotografo.apellido_p AS fotografo_apellido_p,
            citaaas.fecha AS fecha_evento,
            citaaas.evento AS evento,
            citaaas.hora_inicio AS hora_inicio,
            citaaas.hora_fin AS hora_fin
        FROM usuario
        LEFT JOIN telefono ON usuario.id_telefono = telefono.id_telefono
        LEFT JOIN citaaas ON usuario.id_usuario = citaaas.id_usuario
        LEFT JOIN fotografo ON citaaas.id_fotografo = fotografo.id_fotografo
        ORDER BY usuario.id_usuario
    ";

    $result = $enlace->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Número de Teléfono</th>
                <th>Fotógrafo</th>
                <th>Fecha del Evento</th>
                <th>Hora de Inicio</th>
                <th>Hora de Fin</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($row['usuario_nombre']) . "</td>
                <td>" . htmlspecialchars($row['usuario_apellido_p']) . "</td>
                <td>" . htmlspecialchars($row['usuario_apellido_m']) . "</td>
                <td>" . htmlspecialchars($row['telefono_lada_edo']) . " " . htmlspecialchars($row['telefono_numero']) . "</td>
                <td>" . htmlspecialchars($row['fotografo_nombre']) . " " . htmlspecialchars($row['fotografo_apellido_p']) . "</td>
                <td>" . htmlspecialchars($row['fecha_evento']) . "</td>
                <td>" . htmlspecialchars($row['hora_inicio']) . "</td>
                <td>" . htmlspecialchars($row['hora_fin']) . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron usuarios en la base de datos.";
    }
} else {
    echo "Ingrese el ID del usuario";
}
?>

<div class="form-container">
    <form method="post" action="">
        <label for="id_usuario">ID de Usuario:</label>
        <input type="text" name="id_usuario" id="id_usuario" placeholder="Ingrese el ID de Usuario">
        <input type="submit" value="Buscar Usuario">
    </form>

    <form method="post" action="">
        <input type="submit" name="mostrar_todos" value="Mostrar Todos los Usuarios">
    </form>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .form-container {
        margin: 20px auto;
        width: 80%;
        text-align: center;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgb(152, 115, 181);
        border-radius: 8px;
    }

    .form-container form {
        margin-bottom: 15px;
    }

    .form-container label {
        font-size: 16px;
        margin-right: 10px;
    }

    .form-container input[type="text"] {
        padding: 8px;
        font-size: 14px;
        width: 200px;
        margin-right: 10px;
    }

    .form-container input[type="submit"] {
        padding: 10px 15px;
        font-size: 16px;
        background-color: rgb(152, 115, 181);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgb(152, 115, 181);
        border-radius: 8px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: rgb(152, 115, 181);
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
</style>




