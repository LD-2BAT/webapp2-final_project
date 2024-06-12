<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && hash('sha256', $password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: main.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<style>
        body {
            background-image: url('https://img.freepik.com/free-photo/digital-art-moon-wallpaper_23-2150918875.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .div1 {
            width: 450px;
            padding: 75px;
            background: black;
            border-radius: 15px;
            opacity: 0.7;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            font-size: 3rem;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            color: white;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .inputText {
            width: calc(100% - 16px);
            height: 30px;
            border: none;
            border-radius: 2px;
            padding-left: 8px;
            margin-bottom: 20px;
        }

        #logButton {
            width: calc(100% - 16px);
            height: 30px;
            border: none;
            border-radius: 10px;
            color: black;
            font-size: 16px;
            cursor: pointer;
            background-color: white;
            align-self: center;
        }

        #logButton:hover {
            background-color: rgb(53, 212, 93);
        }
</style>

    <div class="div1">
        <h1>Login Form</h1>
        <form id="loginForm" method="POST" action="login.php">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" class="inputText" placeholder="User Name" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="inputText" placeholder="Password" required>
            <button type="submit" id="logButton">Login</button>
        </form>
    </div>

</body>
</html>

