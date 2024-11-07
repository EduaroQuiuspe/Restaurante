<?php 
require_once __DIR__ . '/../config/database.php';


function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Función para agregar un nuevo Producto
function agregarProducto( $nombre, $precio, $descripcion, $categoria , $disponible) {
    global $productosCollection;
    $resultado= $productosCollection->insertOne([
        'nombre' => $nombre,
        'precio' => $precio,
        'descripcion' => $descripcion,
        'categoria' => $categoria,
        'disponible' => $disponible 
     
    ]);
    return $resultado->getInsertedId();
}

// Función para obtener un Producto por ID
function obtenerProductoPorId($id) {
    global $productosCollection;
    return $productosCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

// Función para obtener todos los Productos
function obtenerProducto() {
    global $productosCollection;
    return $productosCollection->find();
}

// Función para actualizar un Producto
function actualizarProducto( $id, $nombre, $precio, $descripcion, $categoria, $disponible) {
    global $productosCollection;
    $resultado=$productosCollection->updateOne(
        ['_id'=>new MongoDB\BSON\ObjectId($id)],
        ['$set'=>[
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'categoria' => $categoria,
            'disponible' => $disponible 
        ]]
        );
        return $resultado->getModifiedCount();}

// Función para eliminar un Producto
function eliminarProducto( $id) {
    global $productosCollection;
    $resultado = $productosCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
?>
