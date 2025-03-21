<?php
include 'conexionDB.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    // Actualizar datos en DB
    $stmt = $conexDB->prepare("UPDATE personas SET nombre = ?, email = ?, edad = ? WHERE id = ?");
    $stmt->bind_param("ssii", $nombre, $email, $edad, $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
$stmt = $conexDB->prepare("SELECT * FROM personas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultsSQL = $stmt->get_result();
$persona = $resultsSQL->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Persona</title>
</head>
<body>
    <h1>Modificar Datos</h1>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($persona['nombre']); ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($persona['email']); ?>" required></label><br>
        <label>Edad: <input type="number" name="edad" value="<?php echo htmlspecialchars($persona['edad']); ?>" required></label><br>
        <button type="submit">Actualizar</button>
        <br>
        <a href="index.php">Volver</a>
    </form>
</body>
</html>
