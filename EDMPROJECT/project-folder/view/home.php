<?php
session_start();

if (!isset($_SESSION['isloggedin'])) {
    header('Location: /login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']['name']; ?>!</h1>
    <a href="/EDMPROJECT/project-folder/public/logout.php" class="btn btn-danger">Logout</a>

</body>
</html>
