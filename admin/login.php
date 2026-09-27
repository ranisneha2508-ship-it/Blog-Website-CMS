<?php

session_start();


include "../connection.php";

$message = "";

if (isset($_GET['registered'])) {
    $message = "Account created successfully. Please login.";
}

if (isset($_POST['login'])) {

$username = $_POST['username'];
$password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

    if ($user) {

    if (password_verify($password, $user['password'])) {

        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_name'] = $user['username'];

        header("Location: index.php");
        exit;

    } else {

        $message = "Incorrect password";

    }

} else {

    $message = "Username not found";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Blog CMS</title>

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
                <h1>Welcome Back</h1>
                <p>Login to manage your blog website</p>
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

            <input
                type="text"
                name="username"
                id="loginUsername"
                placeholder="Enter your username"
                autocomplete="off"
                value=""
                readonly
                onfocus="this.removeAttribute('readonly');"
                required
            >
        </div>
    </div>


    <div class="form-group">
        <label>Password</label>

        <div class="input-box">
            <i class="bi bi-lock"></i>

            <input
                type="password"
                name="password"
                id="loginPassword"
                placeholder="Enter your password"
                autocomplete="new-password"
                value=""
                readonly
                onfocus="this.removeAttribute('readonly');"
                required
            >

            <i
                class="bi bi-eye password-toggle"
                id="loginPasswordToggle"
            ></i>
        </div>
    </div>


    <div class="login-options">

        <label class="remember-me">
            <input type="checkbox" name="remember">
            <span>Remember me</span>
        </label>

        <a href="#">Forgot Password?</a>

    </div>


    <button
        type="submit"
        name="login"
        class="auth-btn"
    >
        Login
        <i class="bi bi-arrow-right"></i>
    </button>

</form>

            <div class="auth-switch">
                <p>
                    Don't have an account?
                    <a href="register.php">Create Account</a>
                </p>
            </div>

        </div>

    </div>
<script src="auth.js"></script>
</body>

</html>