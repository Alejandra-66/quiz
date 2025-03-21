<?php
include 'conexionDB.php';
if ($conexDB->connect_error) {
    die("Conexión errónea: " . $conexDB->connect_error);
}
$query = "SELECT *, IF(edad >= 18, 'Mayor de Edad', 'Menor de Edad') AS es_mayor FROM personas";
$resultsSQL = $conexDB->query($query);

if (!$resultsSQL) {
    die("Error en la consulta: " . $conexDB->error);
}

$personas = $resultsSQL->fetch_all(MYSQLI_ASSOC); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personas</title>
</head>
<body>
    <h1>Lista de Personas</h1>
    <a href="create.php">Agregar Persona</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Mayor de Edad</th>
                <th>Configuraciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona): ?>
                <tr>
                    <td><?php echo $persona['nombre']; ?></td>
                    <td><?php echo $persona['email']; ?></td>
                    <td><?php echo $persona['edad']; ?></td>
                    <td><?php echo $persona['es_mayor']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $persona['id']; ?>">Modificar</a>
                        <a href="delete.php?id=<?php echo $persona['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

