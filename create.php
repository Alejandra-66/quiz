<?php
include 'conexionDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    $stmt = $conexDB->prepare("INSERT INTO personas (nombre, email, edad) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $email, $edad);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Persona</title>
</head>
<body>
    <h1>Agregar Persona</h1>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Edad: <input type="number" name="edad" required></label><br>
        <button type="submit">Guardar</button>
        <br>
        <a href="index.php">Volver</a>
    </form>
</body>
</html>

