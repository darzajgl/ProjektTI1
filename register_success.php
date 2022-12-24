<?php
session_start();

if (!isset($_SESSION['success_registration'])) {
    header('Location: index.php');
exit();
}
else{
    unset($_SESSION['success_registration']);
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Rejestracja powiodła się</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Dziękujemy za rejestrację</h1>
<form>
    <fieldset>
        <br><a href="account.php">Przejdź do strony konta</a>
        </br>
        <br><a href="index.php">Przejdź do strony głównej</a>
    </fieldset>
</form>
</body>
</html>