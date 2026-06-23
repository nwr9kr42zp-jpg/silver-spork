<?php
// Сессияны баштоо
session_start();

// Базага туташуу файлын кошуу
require_once 'db.php'; 

// Форма жөнөтүлгөнүн текшерүү
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Формадан келген маалыматтарды алуу жана коопсуздук үчүн тазалоо
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Эгер пароль базада шифрленбеген болсо

    // Колдонуучуну базадан издөө
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Паролду текшерүү (жөнөкөй текст түрүндө)
        if ($password === $user['password']) {
            // Сессияга колдонуучуну сактоо
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];

            // Ийгиликтүү киргенден кийин башкы бетке багыттоо
            header("Location: index.html");
            exit();
        } else {
            echo "<script>alert('Пароль туура эмес!'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('Мындай email менен колдонуучу табылган жок!'); window.location.href='login.html';</script>";
    }
} else {
    // Эгер түз эле php файлына кирүүгө аракет кылса, формага кайтаруу
    header("Location: login.html");
    exit();
}
?>