<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            background-color: #fce4ec;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .welcome-container {
            background-color: #ffffff;
            padding: 40px 50px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #ec407a;
            margin-bottom: 15px;
        }

        p {
            font-size: 24px;
            color: #d81b60; 
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
            background-color: #1976d2;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <p>You're so pretty 😍</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
