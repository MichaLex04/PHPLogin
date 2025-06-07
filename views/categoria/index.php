<!DOCTYPE html>
<html>
<head><title>Categoria</title></head>
<body>
    <h2>Categoria</h2>
    <form method="POST" action="index.php?c=categoria&a=guardar">
        Nombre: <input type="text" name="nombre" required><br>Idfamilia: <input type="text" name="idfamilia" required><br>
        <input type="submit" value="Guardar">
    </form>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th><th>Nombre</th><th>Idfamilia</th><th>Acciones</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <?php foreach ($row as $value) echo "<td>$value</td>"; ?>
            <td>
                <a href="index.php?c=categoria&a=eliminar&id=<?= $row[array_key_first($row)] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
