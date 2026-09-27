<?php

include "../connection.php";

$message = "";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password != $confirmPassword) {

        $message = "Passwords do not match";

    } else {

        $checkEmail = "SELECT * FROM users WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($checkResult) > 0) {

            $message = "Email already registered";

        } else {

            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $sql = "INSERT INTO users
                    (username, email, password)
                    VALUES
                    ('$username', '$email', '$hashedPassword')";

            $result = mysqli_query($conn, $sql);

            if ($result) {

                header("Location: login.php?registered=1");
                exit;

            } else {

                $message = "Registration failed";

            }
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Blog CMS</title>

    <link rel="stylesheet" href="auth.css">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
</head>

<body>

    <div class="auth-page">

        <div class="auth-box">

            <div class="auth-brand">
                <h2>Blog<span>CMS</span></h2>
                <p>Admin Panel</p>
            </div>

            <div class="auth-heading">
                <h1>Create Account</h1>
                <p>Register to manage your blog website</p>
            </div>
<?php if ($message != "") { ?>

    <p class="auth-message">
        <?php echo $message; ?>
    </p>

<?php } ?>
            <form method="POST" autocomplete="off">

    <div class="form-group">
        <label>Username</label>

        <div class="input-box">
            <i class="bi bi-person"></i>

            <input type="text" name="username" id="registerUsername"
                placeholder="Enter your username"
                autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label>Email Address</label>

        <div class="input-box">
            <i class="bi bi-envelope"></i>

            <input type="email" name="email" id="registerEmail"
                placeholder="Enter your email"
                autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label>Password</label>

        <div class="input-box">
            <i class="bi bi-lock"></i>

            <input type="password" name="password" id="registerPassword"
                placeholder="Create password"
                autocomplete="new-password" required>

            <i class="bi bi-eye password-toggle"
                id="registerPasswordToggle"></i>
        </div>
    </div>

    <div class="form-group">
        <label>Confirm Password</label>

        <div class="input-box">
            <i class="bi bi-shield-lock"></i>

            <input type="password" name="confirm_password"
                id="confirmPassword"
                placeholder="Confirm password"
                autocomplete="new-password" required>

            <i class="bi bi-eye password-toggle" id="confirmPasswordToggle"></i>
        </div>
    </div>

    <button type="submit" name="register" class="auth-btn">
        Create Account
        <i class="bi bi-arrow-right"></i>
    </button>

</form>

            <div class="auth-switch">
                <p>
                    Already have an account?
                    <a href="login.php">Login</a>
                </p>
            </div>

        </div>

    </div>
<script src="auth.js"></script>
</body>

</html>