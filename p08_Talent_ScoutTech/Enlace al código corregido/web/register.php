<?php
require_once dirname(__FILE__) . '/private/conf.php';

# Require logged users
require dirname(__FILE__) . '/private/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bindValue(1, $username, SQLITE3_TEXT);
    $stmt->bindValue(2, $password, SQLITE3_TEXT);

    if ($stmt->execute()) {
        header("Location: list_players.php");
        exit;
    } else {
        $error = "Failed to register user.";
    }
}

?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>Práctica RA3 - Players list</title>
    </head>
    <body>
        <header>
            <h1>Register</h1>
        </header>
        <main class="player">
            <?php if (isset($error)): ?>
                <p class="error"><?= htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="#" method="post">
                <label>Username:</label>
                <input type="text" name="username" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <input type="submit" value="Send">
            </form>
            <form action="#" method="post" class="menu-form">
                <a href="list_players.php">Back to list</a>
                <input type="submit" name="Logout" value="Logout" class="logout">
            </form>
        </main>
        <footer class="listado">
            <img src="images/logo-iesra-cadiz-color-blanco.png">
            <h4>Puesta en producción segura</h4>
            < Please <a href="http://www.donate.co?amount=100&amp;destination=ACMEScouting/"> donate</a> >
        </footer>
    </body>
</html>
