<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Login</h2>
            
            <!-- Display error messages -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
            <?php endif; ?>

            <!-- Login form -->
            <form action="/EDMPROJECT/project-folder/controller/loginController.php" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <!-- Show Password Checkbox -->
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword">
                    <label class="form-check-label" for="showPassword">Show Password</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>

                <p class="text-center mt-3">Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById("showPassword").addEventListener("click", function () {
            const passwordField = document.getElementById("password");
            if (this.checked) {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    </script>
</body>
</html>
