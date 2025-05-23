<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: /testsite/login");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Test Site</title>
    <link rel="stylesheet" href="/testsite/src/css/style.css">
    <style>
        .admin-container {
            max-width: 480px;
            margin: 7vh auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2.5rem 2rem 2rem 2rem;
            text-align: center;
        }
        .admin-container h1 {
            color: #007bff;
            margin-bottom: 0.5em;
        }
        .admin-container p {
            color: #444;
            margin-bottom: 2em;
        }
        .admin-container .logout-btn {
            display: inline-block;
            padding: 0.75em 2em;
            background: #dc3545;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }
        .admin-container .logout-btn:hover {
            background: #b52a37;
        }
        .admin-container .welcome {
            font-size: 1.1em;
            margin-bottom: 1.5em;
            color: #222;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Admin Dashboard</h1>
        <div class="welcome">
            Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!
        </div>
        <p>This is a protected page. Only logged-in users can see this.</p>
        <a href="/testsite/logout" class="logout-btn">Logout</a>
    </div>
</body>
</html>