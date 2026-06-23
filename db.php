<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "fructy_shop"; // Бул жерге өзүң түзгөн маалымат базасынын атын жаз

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Маалымат базасына туташуу ишке ашкан жок: " . mysqli_connect_error());
}
?>