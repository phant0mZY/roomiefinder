<?php
session_start(); 

$db = new SQLite3('roomiefinder.db');


$db->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        phone TEXT NOT NULL,
        gender TEXT NOT NULL,
        password TEXT NOT NULL
    );
");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $password = htmlspecialchars(trim($_POST['password'])); 


    $checkStmt = $db->prepare("SELECT id FROM users WHERE email = :email");
    $checkStmt->bindValue(':email', $email, SQLITE3_TEXT);
    $existingUser = $checkStmt->execute()->fetchArray(SQLITE3_ASSOC);

    if ($existingUser) {
        echo "<h2>Email already registered. <a href='signup.html'>Try again</a></h2>";
        exit();
    }


    $insertStmt = $db->prepare("
        INSERT INTO users (name, email, phone, gender, password)
        VALUES (:name, :email, :phone, :gender, :password)
    ");
    $insertStmt->bindValue(':name', $name, SQLITE3_TEXT);
    $insertStmt->bindValue(':email', $email, SQLITE3_TEXT);
    $insertStmt->bindValue(':phone', $phone, SQLITE3_TEXT);
    $insertStmt->bindValue(':gender', $gender, SQLITE3_TEXT);
    $insertStmt->bindValue(':password', $password, SQLITE3_TEXT);

    $result = $insertStmt->execute();

    if ($result) {

        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $db->lastInsertRowID();
        header("Location: menu.php");
        exit();
    } else {
        echo "<h2>Something went wrong. Please try again.</h2>";
    }
}
?>
