<?php
session_start();

if (isset($_POST['name']))
    // Pobierz informacje o bazie danych z pliku config.php
    require_once 'config.php';

// sprawdź, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // pobierz dane z formularza
    $imie = mysqli_real_escape_string($db, $_POST['imie']);
    $nazwisko = mysqli_real_escape_string($db, $_POST['nazwisko']);
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $haslo = mysqli_real_escape_string($db, $_POST['haslo']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $adres = mysqli_real_escape_string($db, $_POST['adres']);
    $wyksztalcenie = mysqli_real_escape_string($db, $_POST['wyksztalcenie']);
    $zainteresowania = isset($_POST['zainteresowania']) ? mysqli_real_escape_string($db, implode(',', $_POST['zainteresowania'])) : array();

    // sprawdź, czy wszystkie pola zostały wypełnione
    if (empty($imie) || empty($nazwisko) || empty($login) || empty($haslo) || empty($email) || empty($adres) || empty($wyksztalcenie)) {
        $error = 'Musisz wypełnić wszystkie pola formularza';
    } else {
        // Połącz się z bazą danych
        $conn = mysqli_connect($host, $username, $password, $database_name);

        // sprawdź, czy login jest unikalny
        $query = "SELECT * FROM users WHERE login='$login'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            $error = 'Podany login jest już zajęty';
        } else {
            // zapisz dane do bazy danych
            $query = "INSERT INTO users (imie, nazwisko, login, haslo, email, adres, wyksztalcenie, zainteresowania) VALUES ('$imie', '$nazwisko', '$login', '$haslo', '$email', '$adres', '$wyksztalcenie', '" . implode(',', $zainteresowania) . "')";
            mysqli_query($db, $query);

            // przekieruj do strony z potwierdzeniem rejestracji
            header('Location: save.php');
            exit;
        }
    }
}

?>