<?php
session_start();
//wylogowanie użytkownika, jeśli był zalogowany
$_SESSION['logged'] = false;


if (isset($_POST['imie'])) {
    //przypisanie zmiennych
    $status_OK = true;
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $wyksztalcenie = $_POST['wyksztalcenie'];
    $zainteresowania = $_POST['zainteresowania'];

    //sprawdzenie poszczególnych danych
    if (strlen($imie) < 3 || strlen($imie) > 50) {
        $status_OK = false;
        $_SESSION['error_imie'] = "Imię musi posiadać od 3 do 50 znaków ";
        header('Location:register_form.php');
    }
    if (strlen($nazwisko) < 3 || strlen($nazwisko) > 50) {
        $status_OK = false;
        $_SESSION['error_nazwisko'] = "Nazwisko musi posiadać od 3 do 50 znaków ";
        header('Location:register_form.php');
    }

    if (ctype_alnum($login) == false) {
        $status_OK = false;
        $_SESSION['error_login'] = "Login może składać się tylko z liter i cyfr";
        header('Location:register_form.php');
    }
    if (strlen($haslo) < 6 || strlen($haslo) > 50) {
        $status_OK = false;
        $_SESSION['error_haslo'] = "Hasło musi posiadać od 6 do 50 znaków";
        header('Location:register_form.php');
    }
    $email_sanit = filter_var($email, FILTER_SANITIZE_EMAIL);
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) || $email_sanit != $email) {
        $status_OK = false;
        $_SESSION['error_email'] = "<span class='error'>Nieprawidłowy adres email</span>";
        header('Location:register_form.php');
    }
    $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

    if (strlen($adres) < 3 || strlen($adres) > 255) {
        $status_OK = false;
        $_SESSION['error_adres'] = "Adres musi posiadać od 3 do 255 znaków";
        header('Location:register_form.php');
    }

    require_once "db_config.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($connection->connect_errno !== 0) {
            throw new Exception((mysqli_connect_errno()));
        } else {
            //sprawdzenie czy email istnieje w bazie danych
            $result = $connection->query("SELECT id FROM users WHERE email='$email'");

            if (!$result) throw new Exception(mysqli_error($connection));

            //sprawdzenie czy podany email istnieje w bazie danyc
            $how_many_emails = mysqli_num_rows($result);
            if ($how_many_emails > 0) {
                $status_OK = false;
                $_SESSION['error_email'] = "Konto z podanym adresem e-mail już istnieje";
                header('Location:register_form.php');
            } else {
                // sprawdzenie czy login już istnieje w bazie danych
                $result = mysqli_query($connection, "SELECT id FROM users WHERE login='$login'");

                if (!$result) {
                    throw new Exception(mysqli_error($connection));
                }

                $how_many_logins = mysqli_num_rows($result);
                if ($how_many_logins > 0) {
                    $status_OK = false;
                    $_SESSION['error_login'] = "Istnieje już taki login. Wprowadź inny.";
                    header('Location:register_form.php');
                }

                if ($status_OK == true) {
                    //kwerenda zapisu do bazy danych
                    if ($connection->query("INSERT INTO users (imie, nazwisko, login, haslo, email, adres, wyksztalcenie, zainteresowania)
VALUES ('$imie', '$nazwisko', '$login', '$haslo_hash', '$email', '$adres', '$wyksztalcenie', '" . implode(',', $zainteresowania) . "')")) ;
                    $_SESSION['success_registration'] = true;
                    $_SESSION['logged'] = true;

                    //dane sesyjne
                    $_SESSION['imie'] = $imie;
                    $_SESSION['nazwisko'] = $nazwisko;
                    $_SESSION['login'] = $login;
                    $_SESSION['haslo'] = $haslo;
                    $_SESSION['email'] = $email;
                    $_SESSION['adres'] = $adres;
                    $_SESSION['wyksztalcenie'] = $wyksztalcenie;
                    $_SESSION['zainteresowania'] = implode(', ', $zainteresowania);
                    header('Location:register_success.php');
                }
                //zamknięcie połączenia
                $connection->close();
            }
        }
    } catch
    (Exception $error) {
        $_SESSION['error_server'] = $error->getMessage();
        header('Location:register_form.php');
    }
}

?>
