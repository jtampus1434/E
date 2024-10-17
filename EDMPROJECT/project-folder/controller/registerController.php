<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        // Redirect back with an error message if passwords don't match
        header('Location: /EDMPROJECT/project-folder/public/register.php?error=Passwords do not match');
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    require '../model/userModel.php'; 

    // Check if the email already exists
    $userExists = getUserByEmail($email);

    if (!$userExists) {
        // Create new user with hashed password
        if (createUser($name, $email, $hashedPassword)) {
            // Redirect to login page after success
            header('Location: /EDMPROJECT/project-folder/public/login.php?success=Registration successful');
            exit();
        } else {
            // Error while creating user
            header('Location: /EDMPROJECT/project-folder/public/register.php?error=Error in creating user');
            exit();
        }
    } else {
        // Redirect back to register page with error
        header('Location: /EDMPROJECT/project-folder/public/register.php?error=Email already exists');
        exit();
    }
}
?>
