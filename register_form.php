<?php
session_start();
if (isset($_SESSION['error_server'])) {
    echo '<span class="error">' . $_SESSION['error_server'] . '</span>';
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
    <h1>Rejestracja</h1>
    <fieldset>
        <legend>Dane osobowe</legend>
        <input type="text" name="imie" required placeholder="Imię" id="imie">
        <?php
        if (isset($_SESSION['error_imie'])) {
            echo '<span class="error">' . $_SESSION['error_imie'] . '</span>';
            unset($_SESSION['error_imie']);
        }
        ?>
        <br>

        <input type="text" name="nazwisko" required placeholder="Nazwisko" id="nazwisko">
        <?php
        if (isset($_SESSION['error_nazwisko'])) {
            echo '<span class="error">' . $_SESSION['error_nazwisko'] . '</span>';
            unset($_SESSION['error_nazwisko']);
        }
        ?>

        <br>
        <input type="text" name="login" required placeholder="Login" id="login">
        <?php
        if (isset($_SESSION['error_login'])) {
            echo '<span class="error">' . $_SESSION['error_login'] . '</span>';
            unset($_SESSION['error_login']);
        }
        ?>

        <br>
        <input type="password" name="haslo" required placeholder="Hasło" id="haslo">
        <?php
        if (isset($_SESSION['error_haslo'])) {
            echo '<span class="error">' . $_SESSION['error_haslo'] . '</span>';
            unset($_SESSION['error_haslo']);
        }
        ?>

        <br>
        <input type="email" name="email" required placeholder="Adres e-mail" id="email">
        <?php
        if (isset($_SESSION['error_email'])) {
            echo '<span class="error">' . $_SESSION['error_email'] . '</span>';
            unset($_SESSION['error_email']);
        }
        ?>

    </fieldset>
    <fieldset>
        <legend>Dane adresowe</legend>

        <textarea name="adres" style="width: 100%; height: 50%" required placeholder="Adres" id="adres"></textarea>
        <?php
        if (isset($_SESSION['error_adres'])) {
            echo '<span class="error">' . $_SESSION['error_adres'] . '</span>';

            unset($_SESSION['error_adres']);
        }
        ?>

    </fieldset>
    <fieldset>
        <legend>Wykształcenie</legend>
        <input type="radio" id="podstawowe" name="wyksztalcenie" value="podstawowe" required>
        <label for="podstawowe">Podstawowe</label></b>
        <input type="radio" id="srednie" name="wyksztalcenie" value="srednie" required">
        <label for="srednie">Średnie</label></b>
        <input type="radio" id="wyzsze" name="wyksztalcenie" value="wyzsze" required>
        <label for="wyzsze">Wyższe</label><br>
    </fieldset>

    <fieldset>
        <legend>Zainteresowania</legend>
        <input type="checkbox" id="sport" name="zainteresowania[]" value="sport">
        <label for="sport">Sport</label><br>
        <input type="checkbox" id="kultura" name="zainteresowania[]" value="kultura">
        <label for="kultura">Kultura</label><br>
        <input type="checkbox" id="podroze" name="zainteresowania[]" value="podroze">
        <label for="podroze">Podróże</label><br>
        <input type="checkbox" id="podroze" name="zainteresowania[]" value="kino">
        <label for="kino">Kino</label><br>
        <input type="checkbox" id="kino" name="zainteresowania[]" value="muzyka">
        <label for="muzyka">Muzyka</label><br>
        <?php
        if (isset($_SESSION['error_zainteresowania'])) {
            echo '<span class="error">' . $_SESSION['error_zainteresowania'] . '</span>';
            unset($_SESSION['error_zainteresowania']);
        }
        ?>

    </fieldset>
    <fieldset>
        <div class="g-recaptcha" data-sitekey="6Lcz2Z0jAAAAALipOlsa3fPD1iNdwUzZ41M5RHG4"></div>
        <input type="submit" value="Zarejestruj się">
        <br><a href="index.php">Przejdź do strony głównej</a>
    </fieldset>

</form>
</body>
</html>

