<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarProducto($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], isset($_POST['disponible']) );
    if ($id) {
        header("Location: index.php?mensaje=Producto creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear al Producto.";
    }
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Añadir Producto</title>
</head>
<body>
    <h1>Añadir Producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Precio:</label>
        <input type="number" name="precio" step="any" required><br>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" required>
        <label>Categoria:</label>
            <select name="categoria"  value="<?php echo htmlspecialchars($Producto['categoria']); ?>" required>
                <option value="Lácteos">Lácteos</option>
                <option value="Carnes">Carnes</option>
                <option value="Cereales">Cereales</option>
                <option value="Condimentos">Condimentos</option>
                <option value="Aceites">Aceites</option>
                <option value="Frutos secos">Frutos Secos</option>
            </select>
        <label>Disponible:</label>
        <input type="checkbox" name="disponible" > 
        <button type="submit">Añadir Producto</button>
    </form>
    <a href="index.php" class="button">Volver a la lista de Productos</a>
</body>
</html>
