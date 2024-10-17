<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $enteredPassword = $_POST['password'];

    require '../model/userModel.php'; // Load the model to interact with the database

    // Get user from the database
    $user = getUserByEmail($email);
    
    if ($user) {
        // Retrieve the hashed password from the database
        $storedHashedPassword = $user['password'];

        // Verify the entered password against the hashed one
        if (password_verify($enteredPassword, $storedHashedPassword)) {
            // Set session variables for successful login
            $_SESSION['isloggedin'] = true;
            $_SESSION['user'] = $user;
            // Redirect to home page
            header('Location: /EDMPROJECT/project-folder/view/home.php');
            exit();
        } else {
            // Incorrect password
            header('Location: /EDMPROJECT/project-folder/public/login.php?error=Incorrect password');
            exit();
        }
    } else {
        // Email does not exist in the database
        header('Location: /EDMPROJECT/project-folder/public/login.php?error=Email does not exist');
        exit();
    }
}
?>
