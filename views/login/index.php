<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="index.php?c=login&a=validar">
        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br>
        <label>Clave:</label><br>
        <input type="password" name="clave" required><br><br>
        <button type="submit">Ingresar</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
