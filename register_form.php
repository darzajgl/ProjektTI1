<?php
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
        <br>
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" id="nazwisko" required>
        <br>
        <label for="login"> Login:</label>
        <input type="text" name="login" id="login" required>
        <br>
        <label for="haslo"> Hasło:</label>
        <input type="password" name="haslo" id="haslo" required>
        <br>
        <label for="email"> Adres e-mail:</label>
        <input type="email" name="email" id="email" required>
    </fieldset>
    <fieldset>
        <legend>Dane adresowe</legend>
        <label for="adres"> Adres:</label>
        <textarea name="adres" id="adres" required></textarea>
    </fieldset>
    <fieldset>
        <legend>Dane edukacyjne</legend>
        <label for="wyksztalcenie">Wykształcenie:</label><br>
        <input type="radio" id="podstawowe" name="wyksztalcenie" value="podstawowe">
        <label for="podstawowe">Podstawowe</label><br>
        <input type="radio" id="srednie" name="wyksztalcenie" value="srednie">
        <label for="srednie">Średnie</label><br>
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
        <fieldset>
            <br><a href="index.php">Przejdź do strony głównej</a>
        </fieldset>
    </fieldset>
</form>
</body>
</html>

