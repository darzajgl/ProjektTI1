<?php
session_start();

if(!isset($_POST['login']) || (!isset($_POST['haslo'])))
{
    header('Location: index.php');
    exit();
}

// Pobierz informacje o bazie danych z pliku db_config.php
require_once 'db_config.php';

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($connection->connect_errno !== 0) {
    echo "Error: {$connection->connect_errno}";
} else {
    $login = @$_POST['login'];
    $haslo = $_POST['haslo'];

    $sql = "SELECT * FROM users WHERE login='$login' AND haslo='$haslo'";

    if ($result = $connection->query($sql)) {
        $ilu_userow = $result->num_rows;
        if ($ilu_userow > 0) {

            // flaga czy zalogowany
            $_SESSION['logged'] = true;
            $row = $result->fetch_assoc();

            //dane sesyjne
            $_SESSION['imie'] = $row['imie'];
            $_SESSION['nazwisko'] = $row['nazwisko'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['haslo'] = $row['haslo'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['adres'] = $row['adres'];
            $_SESSION['wyksztalcenie'] = $row['wyksztalcenie'];
            $_SESSION['zainteresowania'] = $row['zainteresowania'];

            unset($_SESSION['login_error']);
            $result->free_result();
            header('Location:account.php');
        } else {
            $_SESSION['login_error'] = 'Nieprawidłowy login lub hasło';
            header('Location:login_form.php');
        }
    }
    $connection->close();
}

?>
