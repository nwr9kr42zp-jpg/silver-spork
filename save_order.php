<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Формадан кардардын маалыматтарын алуу
    // (Аттары order.html файлындагы <input name="..."> тегдерине шайкеш келиши керек)
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    // Эгер кардар логин болгон болсо, анын ID'син алабыз
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

    // Заказды базага кошуу суроосу (Таблицаңыздын аты 'orders' деп эсептейли)
    $query = "INSERT INTO orders (user_id, customer_name, phone, address, status) 
              VALUES ('$user_id', '$name', '$phone', '$address', 'new')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Заказ ийгиликтүү кабыл алынды!'); window.location.href='index.html';</script>";
    } else {
        echo "Ката кетти: " . mysqli_error($conn);
    }
} else {
    header("Location: order.html");
    exit();
}
?>