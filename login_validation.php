<?php
session_start();

// Pobierz informacje o bazie danych z pliku db_config.php
require_once 'db_config.php';

// Połącz się z bazą danych
$conn = new mysqli($host, $username, $password, $database_name);
if ($conn->connect_errno !== 0) {
    echo "Error: {$conn->connect_errno}";
} else {
    $login = @$_POST['login'];
    $haslo = $_POST['haslo'];

    $sql = "SELECT * FROM users WHERE login='$login' AND password='$haslo'";
    if ($result = $conn->query($sql)) {
        $ilu_userow = $result->num_rows;
        if ($ilu_userow > 0) {
            $row = $result->fetch_assoc();
            $login = $row['login'];

            $result->free_result();
            echo $login;
        } else {
            // Brak użytkowników o podanym loginie i haśle
            echo "pusto";
        }
    }
    $conn->close();
}

?>
