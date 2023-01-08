<?php
session_start();
//przekierowanie do login_form
if (!isset($_POST['login']) || (!isset($_POST['haslo']))) {
    header('Location: index.php');
    exit();
}
// Pobierz informacje o bazie danych z pliku db_config.php
require_once 'db_config.php';
try {
//połączenie z bazą danych
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($connection->connect_errno !== 0) {
        throw new Exception("<span class='error'>Błąd połączenia z bazą danych: {$connection->connect_errno}</span>");
    } else {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        //zabezpieczenie przed wstrzykiwaniem SQL
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if ($result = $connection->query(
            sprintf("SELECT * FROM users WHERE login='%s'",
                mysqli_real_escape_string($connection, $login)))) {

            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($haslo, $row['haslo'])) {

                    // flaga czy zalogowany
                    $_SESSION['logged'] = true;
                    //dane sesyjne
                    $_SESSION['imie'] = $row['imie'];
                    $_SESSION['nazwisko'] = $row['nazwisko'];
                    $_SESSION['login'] = $row['login'];
                    $_SESSION['haslo'] = $row['haslo'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['adres'] = $row['adres'];
                    $_SESSION['wyksztalcenie'] = $row['wyksztalcenie'];
                    $_SESSION['zainteresowania'] = $row['zainteresowania'];

                    //usunięcie zmiennej sesyjnej blędu
                    unset($_SESSION['login_error']);
                    $result->free_result();
                    //przekierowanie
                    header('Location:account.php');
                } else {
                    $_SESSION['login_error'] = 'Nieprawidłowy login lub hasło';
                    header('Location:login_form.php');
                }
            } else {
                $_SESSION['login_error'] = 'Nieprawidłowy login lub hasło';
                header('Location:login_form.php');
            }
            $connection->close();
        }
    }
} catch (Exception $error) {
    // obsłuż wyjątek
    $_SESSION['login_error'] = $error->getMessage();
    header('Location:login_form.php');
}

?>