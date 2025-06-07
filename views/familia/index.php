<!DOCTYPE html>
<html>
<head><title>Familia</title></head>
<body>
    <?php include dirname(__DIR__) . '/includes/menu.php'; ?>
    <h2>Familia</h2>
    <form method="POST" action="index.php?c=familia&a=guardar">
        Nombre: <input type="text" name="nombre" required><br>Descripcion: <input type="text" name="descripcion" required><br>
        <input type="submit" value="Guardar">
    </form>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Descripcion</th><th>Acciones</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <?php foreach ($row as $value) echo "<td>$value</td>"; ?>
            <td>
                <a href="index.php?c=familia&a=eliminar&id=<?= $row[array_key_first($row)] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
