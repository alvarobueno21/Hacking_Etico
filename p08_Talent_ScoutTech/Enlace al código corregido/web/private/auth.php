<?php
require_once dirname(__FILE__) . '/conf.php';
session_start();

function areUserAndPasswordValid($user, $password) {
    global $db;

    $stmt = $db->prepare('SELECT userId, password FROM users WHERE username = ?');
    $stmt->bindValue(1, $user, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();

    if ($password == $row['password']) {
        $_SESSION['userId'] = $row['userId'];
        return TRUE;
    } else {
        return FALSE;
    }
}

if (isset($_POST['username']) && isset($_POST['password'])) {       
    if (areUserAndPasswordValid($_POST['username'], $_POST['password'])) {
        $_SESSION['user'] = $_POST['username'];
    } else {
        $error = "Invalid user or password.<br>";
    }
}

if (isset($_POST['Logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['user'])) {
    $error = "This page requires you to be logged in.<br>";
    include 'login_page.php';
    exit;
}

?>

