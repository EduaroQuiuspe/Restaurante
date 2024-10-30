<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarCliente($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion']);
    if ($id) {
        header("Location: index.php?mensaje=Cliente creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear al Cliente.";
    }
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Añadir Cliente</title>
</head>
<body>
    <h1>Añadir Cliente</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Correo:</label>
        <input type="email" name="correo" required>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required>
        <label>Dirección:</label>
        <input type="text" name="direccion" required>
        <button type="submit">Añadir Cliente</button>
    </form>
    <a href="index.php" class="button">Volver a la lista de Clientes</a>
</body>
</html>
