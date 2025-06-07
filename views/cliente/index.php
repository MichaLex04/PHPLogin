<!DOCTYPE html>
<html>
<head><title>Cliente</title></head>
<body>
    <?php include dirname(__DIR__) . '/includes/menu.php'; ?>
    <h2>Cliente</h2>
    <form method="POST" action="index.php?c=cliente&a=guardar">
        Nombre: <input type="text" name="nombre" required><br>Apellidos: <input type="text" name="apellidos" required><br>Dni: <input type="text" name="dni" required><br>Celular: <input type="text" name="celular" required><br>Direccion: <input type="text" name="direccion" required><br>
        <input type="submit" value="Guardar">
    </form>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Apellidos</th><th>Dni</th><th>Celular</th><th>Direccion</th><th>Acciones</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <?php foreach ($row as $value) echo "<td>$value</td>"; ?>
            <td>
                <a href="index.php?c=cliente&a=eliminar&id=<?= $row[array_key_first($row)] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
