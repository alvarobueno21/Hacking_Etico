<?php
require_once dirname(__FILE__) . '/private/conf.php';
require dirname(__FILE__) . '/private/auth.php';

$db = new SQLite3(dirname(__FILE__) . "/database.db"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['team'])) {
    $name = SQLite3::escapeString($_POST['name']);
    $team = SQLite3::escapeString($_POST['team']);

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = SQLite3::escapeString($_POST['id']);
        $stmt = $db->prepare('INSERT OR REPLACE INTO players (playerid, name, team) VALUES (?, ?, ?)');
        $stmt->bindValue(1, $id, SQLITE3_INTEGER);
    } else {
        $stmt = $db->prepare('INSERT INTO players (name, team) VALUES (?, ?)');
    }

    $stmt->bindValue(2, $name, SQLITE3_TEXT);
    $stmt->bindValue(3, $team, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($result) {
        header("Location: list_players.php");
        exit;
    } else {
        $error = "Error handling your request.";
    }
}

$name = $team = $id = ""; 
if (isset($_GET['id'])) {
    $id = SQLite3::escapeString($_GET['id']);
    $stmt = $db->prepare("SELECT name, team FROM players WHERE playerid = ?");
    $stmt->bindValue(1, $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $name = $row['name'];
        $team = $row['team'];
    } else {
        $error = "No such player found!";
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
        <h1>Player</h1>
    </header>
    <main class="player">
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="#" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>"><br>
            <h3>Player name</h3>
            <textarea name="name"><?= htmlspecialchars($name) ?></textarea><br>
            <h3>Team name</h3>
            <textarea name="team"><?= htmlspecialchars($team) ?></textarea><br>
            <input type="submit" value="Send">
        </form>
        <form action="#" method="post" class="menu-form">
            <a href="index.php">Back to home</a>
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
