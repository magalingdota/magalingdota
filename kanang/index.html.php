<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: welcome.php");
    exit();
}
require 'db.php';

// ... your existing login logic here ...
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        /* Your existing styles here */
        /* Example: */
        body {
            background-color: #82b1d8;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: none;
        }
        .login-container {
            background-image: url('images/ganda.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #7298ca;
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 250px;
            width: 90%;
            color: white;
        }
        h2 {
            color: white;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #a1b7d6;
            color: #1c1c1c;
        }
        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #4a4a4a;
        }
        button {
            background-color: #5679c5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #3f5bb5;
        }
        .error {
            color: #ff6f91;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>kanang boutan ara</h2>

    <?php if ($showSurprise): ?>
    <div id="surpriseContainer" style="display: block; margin-bottom: 20px;">
        <img src="images/sd.png" alt="Surprise!" width="200" />
    </div>
    <div id="formContainer" style="display: none;">

            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <button type="submit">Login</button>
            </form>
        </div>
    <?php else: ?>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>
</div>

<?php if ($showSurprise): ?>
<script>
    setTimeout(() => {
        document.getElementById('surpriseContainer').style.display = 'none';
        document.getElementById('formContainer').style.display = 'block';
    }, 3000);  // Hide surprise after 3 seconds and show form
</script>
<?php endif; ?>

</body>
</html>
    