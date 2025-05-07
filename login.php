<?php
session_start();
$conn = odbc_connect('users', "", "");

$message = "";

if (!$conn) {
    $message = " Failed to connect to database.";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = hash('sha1', $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = odbc_exec($conn, $sql);

    if ($user = odbc_fetch_array($result)) {
        if ($user && $password == $user['password']) {
            $_SESSION['user'] = $user['username'];
            $message = " Login successful! Welcome, " . $user['username'];
            header("Location: index.php");
        } else {
            $message = " Invalid email or password.";
        }
    } else {
        $message = "Login failed. User not found.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1E2235;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 0 15px #F8D7D0;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #F8D7D0;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #1E2235;
        }

        .message {
            margin-top: 15px;
            font-weight: bold;
        }

        .message.success {
            color: #28a745;
        }

        .message.error {
            color: #d9534f;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <form method="POST">
        <div class="top">
            <h2>Login</h2>
            <a href="index.php">Back</a>
        </div>
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">

        <?php if (empty($message)): ?>
            <div class="message error">
                <?= $message ?>
            </div>
        <?php else: ?>
            <div class="message success">
                <?= $message ?>
            </div>
        <?php endif; ?>
    </form>

</body>

</html>
