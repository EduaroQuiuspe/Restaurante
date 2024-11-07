<?php
require_once 'functions.php';

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarProducto($_GET['id']);
    $mensaje = $count > 0 ? "Tarea eliminada con éxito." : "No se pudo eliminar la tarea.";
}

$productos = obtenerProducto();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de Productos</title>
</head>
<body>
    <div class ="container">
    <h1>Lista de Productos</h1>
    <script></script>
    <?php if (isset($mensaje)): ?>
    <script>
        <?php if ($count > 0): ?>
            alert("Success: <?php echo addslashes($mensaje); ?>");
        <?php else: ?>
            alert("Error: <?php echo addslashes($mensaje); ?>");
        <?php endif; ?>
    </script>
<?php endif; ?>

    <a href="nuevo.php" class="button">Añadir Producto</a>
    </div>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Disponible</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            <td><?php echo htmlspecialchars($producto['precio']); ?></td>
            <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
            <td><?php echo htmlspecialchars($producto['categoria']); ?></td>
            <td><?php echo $producto['disponible'] ? 'Sí' : 'No'; ?></td>
            <td class ="actions">
                <a href="editar.php?id=<?php echo $producto['_id']; ?>" class="button">Editar</a>
                <a href="index.php?accion=eliminar&id=<?php echo $producto['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar al producto$producto?');">Eliminar</a>           
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
        </div>
</body>
</html>
