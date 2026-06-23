<!DOCTYPE html>
<html lang="ky">
<head>
    <meta charset="UTF-8">
    <title>Каттоо</title>
</head>
<body>
    <h2>Колдонуучуну каттоо</h2>
    <!-- Маалыматты register.php файлына POST ыкмасы менен жөнөтүү -->
    <form action="register.php" method="POST">
        <label>Аты-жөнү:</label><br>
        <input type="text" name="fullname" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Пароль:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Катталуу</button>
    </form>
</body>
</html>