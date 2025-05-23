<?php
    include "../../database.php";
    $message = "";
    $message_class = "";

    if (isset($_GET['success']) && $_GET['success'] == 1) {
        $message = "Registration successful! You can now <a href='/testsite/login'>login</a>.";
        $message_class = "success";
    } elseif (isset($_POST["submit"])) {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        if ($username && $email && $password && $confirm_password) {
            if ($password !== $confirm_password) {
                $message = "Passwords do not match.";
                $message_class = "error";
            } else {
                // Check if username or email exists
                $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $username, $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result && mysqli_num_rows($result) > 0) {
                    $message = "Username or email already exists.";
                    $message_class = "error";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $insert_sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                    $insert_stmt = mysqli_prepare($conn, $insert_sql);
                    mysqli_stmt_bind_param($insert_stmt, "sss", $username, $email, $hashed_password);
                    if (mysqli_stmt_execute($insert_stmt)) {
                        header("Location: register.php?success=1");
                        exit();
                    } else {
                        $message = "Registration failed. Please try again.";
                        $message_class = "error";
                    }
                }
            }
        } else {
            $message = "Please fill in all fields.";
            $message_class = "error";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Test Site</title>
    <link rel="stylesheet" href="/testsite/src/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" name="submit">Register</button>
        </form>
        <div class="message <?php echo $message_class; ?>">
            <?php echo $message; ?>
        </div>
        <p style="margin-top:1em;">Already have an account? <a href="/testsite/login">Login</a></p>
    </div>
</body>
</html>