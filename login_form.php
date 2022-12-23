<?php
session_start();
if ((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true)) {
    header('Location:account.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Strona logowania</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
<form action="login_validation.php" method="post">
    <h1>Podaj dane</h1>
    <fieldset>
        <label for="login"> Login:</label>
        <input type="text" name="login" id="login" required>
        <br>
        <label for="haslo"> Hasło:</label>
        <input type="password" name="haslo" id="haslo" required>
        <br>
    </fieldset>

    <?php
    if (isset($_SESSION['login_error'])) echo $_SESSION['login_error'];
    ?>
    <fieldset>

        <input type="submit" value="Zaloguj się">
    </fieldset>
    <fieldset>
        <br><a href="index.php">Przejdź do strony głównej</a>
    </fieldset>
</form>
</body>
</html>