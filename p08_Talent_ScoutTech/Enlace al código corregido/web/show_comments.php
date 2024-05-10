<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Práctica RA3 - Comments editor</title>
</head>
<body>
<header>
    <h1>Comments editor</h1>
</header>
<main class="player">
<?php
require_once dirname(__FILE__) . '/private/conf.php';
require dirname(__FILE__) . '/private/auth.php';

$playerId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($playerId) {
    $stmt = $db->prepare("SELECT commentId, username, body FROM comments C, users U WHERE C.playerId = ? AND U.userId = C.userId ORDER BY C.playerId DESC");
    $stmt->bindValue(1, $playerId, SQLITE3_INTEGER);
    $result = $stmt->execute();

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<div>
                <h4>" . htmlspecialchars($row['username']) . "</h4> 
                <p>commented: " . htmlspecialchars($row['body']) . "</p>
              </div>";
    }
} else {
    echo "<p>Invalid player ID.</p>";
}
?>
<div>
    <a href="list_players.php">Back to list</a>
    <a class="black" href="add_comment.php?id=<?php echo htmlspecialchars($playerId); ?>">Add comment</a>
</div>
</main>
<footer class="listado">
    <img src="images/logo-iesra-cadiz-color-blanco.png">
    <h4>Puesta en producción segura</h4>
    < Please <a href="http://www.donate.co?amount=100&amp;destination=ACMEScouting/"> donate</a> >
</footer>
</body>
</html>
