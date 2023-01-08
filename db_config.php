<?php
//przekierowanie do index
if (!isset($_POST['login']) || (!isset($_POST['haslo']))) {
    header('Location: index.php');
    exit();
}

// dane połączenia z bazą danych
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rejestracja');

// tworzenie połączenia z bazą danych
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// sprawdzanie, czy połączenie zostało nawiązane
if (!$connection) {
    echo " nie udało się";
    die("Połączenie z bazą danych nie powiodło się: " . mysqli_connect_error());
}
// zamknięcie połączenia z bazą danych
mysqli_close($connection);

?>
