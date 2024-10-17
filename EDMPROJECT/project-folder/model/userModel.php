<?php
$dsn = 'mysql:host=localhost;dbname=userdb';
$username = 'root'; // Adjust if needed
$password = ''; // Adjust if needed

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

function getUserByEmail($email) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugging to see if the user is retrieved
    if ($user) {
        echo "User found: " . $user['email'] . "<br>";
        echo "Hashed Password: " . $user['password'] . "<br>";
    } else {
        echo "No user found with this email.<br>";
    }
    
    return $user;
}

function createUser($name, $email, $password) {
    global $db;
    $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    return $stmt->execute([$name, $email, $password]);
}

