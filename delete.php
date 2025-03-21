<?php
include 'conexionDB.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $stmt = $conexDB->prepare("DELETE FROM personas WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        die("Hubo un error al eliminar el registro: " . $conexDB->error);
    }
}
?>
