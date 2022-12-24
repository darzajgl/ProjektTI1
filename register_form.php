<?php
session_start();
if (isset($_SESSION['error_server'])) {
    echo $_SESSION['error_server'];
    unset($_SESSION['error_server']);
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Formularz rejestracji</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<form action="register_validation.php" method="post">
    <fieldset>
        <legend>Dane osobowe</legend>
        <label for="imie">Imię:</label>
        <input type="text" name="imie" id="imie" required>
        <?php
        if (isset($_SESSION['error_imie'])) {
            echo $_SESSION['error_imie'];
            unset($_SESSION['error_imie']);
        }
        ?>
        <br>
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" id="nazwisko" required>
        <?php
        if (isset($_SESSION['error_nazwisko'])) {
            echo $_SESSION['error_nazwisko'];
            unset($_SESSION['error_nazwisko']);
        }
        ?>

        <br>
        <label for="login"> Login:</label>
        <input type="text" name="login" id="login" required>
        <?php
        if (isset($_SESSION['error_login'])) {
            echo $_SESSION['error_login'];
            unset($_SESSION['error_login']);
        }
        ?>

        <br>
        <label for="haslo"> Hasło:</label>
        <input type="password" name="haslo" id="haslo" required>
        <?php
        if (isset($_SESSION['error_haslo'])) {
            echo $_SESSION['error_haslo'];
            unset($_SESSION['error_haslo']);
        }
        ?>

        <br>
        <label for="email"> Adres e-mail:</label>
        <input type="email" name="email" id="email" required>
        <?php
        if (isset($_SESSION['error_email'])) {
            echo $_SESSION['error_email'];
            unset($_SESSION['error_email']);
        }
        ?>

    </fieldset>
    <fieldset>
        <legend>Dane adresowe</legend>
        <label for="adres"> Adres:</label>
        <textarea name="adres" id="adres" required></textarea>
        <?php
        if (isset($_SESSION['error_adres'])) {
            echo $_SESSION['error_adres'];
            unset($_SESSION['error_adres']);
        }
        ?>

    </fieldset>
    <fieldset>
        <legend>Dane edukacyjne</legend>
        <label for="wyksztalcenie">Wykształcenie:</label><br>
        <input type="radio" id="podstawowe" name="wyksztalcenie" value="podstawowe">
        <label for="podstawowe">Podstawowe</label></b>
        <input type="radio" id="srednie" name="wyksztalcenie" value="srednie">
        <label for="srednie">Średnie</label></b>
        <input type="radio" id="wyzsze" name="wyksztalcenie" value="wyzsze">
        <label for="wyzsze">Wyższe</label><br>
    </fieldset>
    <fieldset>
        <label for="zainteresowania">Zainteresowania:</label><br>
        <input type="checkbox" id="sport" name="zainteresowania[]" value="sport">
        <label for="sport">Sport</label><br>
        <input type="checkbox" id="kultura" name="zainteresowania[]" value="kultura">
        <label for="kultura">Kultura</label><br>
        <input type="checkbox" id="podroze" name="zainteresowania[]" value="podroze">
        <label for="podroze">Podróże</label><br>
        <input type="checkbox" id="podroze" name="zainteresowania[]"
        <label for="kino">Kino</label><br>
        <input type="checkbox" id="kino" name="zainteresowania[]"
        <label for="muzyka">Muzyka</label><br>
    </fieldset>
    <fieldset>
        <div class="g-recaptcha" data-sitekey="6Lcz2Z0jAAAAALipOlsa3fPD1iNdwUzZ41M5RHG4"></div>
        <input type="submit" value="Zarejestruj się">
<!--        --><?php
//        if (isset($_SESSION['error_recaptcha'])) {
//            echo $_SESSION['error_recaptcha'];
//            unset($_SESSION['error_recaptcha']);
//        }
//        ?>
        <br><a href="index.php">Przejdź do strony głównej</a>
    </fieldset>

</form>
</body>
</html>

