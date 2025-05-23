<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Test Site</title>
    <link rel="stylesheet" href="src/css/style.css">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        .landing-container {
            max-width: 420px;
            margin: 7vh auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2.5rem 2rem 2rem 2rem;
            text-align: center;
        }
        .landing-container h1 {
            margin-bottom: 0.5em;
            color: #007bff;
        }
        .landing-container p {
            color: #444;
            margin-bottom: 2em;
        }
        .landing-container .btn-group {
            display: flex;
            gap: 1em;
            justify-content: center;
        }
        .landing-container a.button {
            display: inline-block;
            padding: 0.75em 2em;
            background: #007bff;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }
        .landing-container a.button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <h1>Welcome to Test Site</h1>
        <p>
            A simple PHP & MySQL authentication demo.<br>
            Please login or register to continue.
        </p>
        <div class="btn-group">
            <a href="/testsite/login" class="button">Login</a>
            <a href="/testsite/register" class="button">Register</a>
        </div>
    </div>
</body>
</html>