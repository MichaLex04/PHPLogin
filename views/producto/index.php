<!DOCTYPE html>
<html>
<head><title>Producto</title></head>
<body>
    <?php include dirname(__DIR__) . '/includes/menu.php'; ?>
    <h2>Producto</h2>
    <form method="POST" action="index.php?c=producto&a=guardar">
        Nombre: <input type="text" name="nombre" required><br>Descripcion: <input type="text" name="descripcion" required><br>Precio: <input type="text" name="precio" required><br>Stock: <input type="text" name="stock" required><br>Idcategoria: <input type="text" name="idcategoria" required><br>Idproveedor: <input type="text" name="idproveedor" required><br>
        <input type="submit" value="Guardar">
    </form>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Descripcion</th><th>Precio</th><th>Stock</th><th>Idcategoria</th><th>Idproveedor</th><th>Acciones</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <?php foreach ($row as $value) echo "<td>$value</td>"; ?>
            <td>
                <a href="index.php?c=producto&a=eliminar&id=<?= $row[array_key_first($row)] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
