<?php
session_start();
//sprawdzenie czy ktoś jest już zalogowany
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
    <h1>Strona logowania</h1>
    <fieldset>

        <input type="text" name="login" required placeholder="login" id="login">
        <br>
        <input type="password" name="haslo" required placeholder="Hasło" id="haslo">
        <br>
        <?php
        if (isset($_SESSION['login_error'])) {
            echo '<span class="error">' . $_SESSION['login_error'] . '</span>';
            unset($_SESSION['login_error']);
        }
        ?>
    </fieldset>
    <fieldset>
        <input type="submit" value="Zaloguj się">
        <br>
        <br><a href="index.php">Przejdź do strony głównej</a>
    </fieldset>
</form>
</body>
</html>