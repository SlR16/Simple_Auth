<?php
    session_start();
    include "../../database.php";
    $message = "";
    $message_class = "";
    if (isset($_POST["submit"])) {
        if ($_POST['username'] && $_POST['password']) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $message = "Login successful! Redirecting to admin page in <span id='countdown'>5</span> seconds...";
                $message_class = "success";
                $redirect = true;
            }
            } else {
                $message = "Invalid username or password.";
                $message_class = "error";
            }
        } else {
            $message = "Please enter username and password.";
            $message_class = "error";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Test Site</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="/testsite/register">Register here</a></p>
</div>  
        <div class="message <?php echo $message_class; ?>">
            <?php echo $message; ?>
            <?php if (!empty($redirect)): ?>
<script>
let seconds = 5;
const countdown = document.getElementById('countdown');
const interval = setInterval(() => {
    seconds--;
    countdown.textContent = seconds;
    if (seconds <= 0) {
        clearInterval(interval);
        window.location.href = "/testsite/admin";
    }
}, 1000);
</script>
<?php endif; ?>
        </div>
    </div>
</body>
</html>