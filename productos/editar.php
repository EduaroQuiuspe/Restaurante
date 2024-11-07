<?php
require_once 'functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$producto = obtenerProductoPorId($_GET['id']);

if (!$producto) {
    header("Location: index.php?mensaje=producto no encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarproducto($_GET['id'], $_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], isset($_POST['disponible']));
    if ($count > 0) {
        header("Location: index.php?mensaje=producto actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar al producto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar producto</title>
</head>
<body>
    <h1>Editar producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        <label>precio:</label>
        <input type="number" name="precio" step="any" value="<?php echo $producto['precio']; ?>" required>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required>
        <label>Categoria:</label>
        <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>" required>
        <label >Disponible</label>
        <label>Disponible:</label>
        <input type="checkbox" name="disponible" <?php echo $producto['disponible'] ? 'checked' : ''; ?>>        
        <button type="submit">Actualizar Producto</button>
    </form>
    <a href="index.php" class="button">Volver a la lista de productos</a>
</body>
</html>
