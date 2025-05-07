<?php
session_start();
$conn = odbc_connect('users', "", "");

$message = "";
if (!$conn) {
    $message = " Failed to connect to the database.";
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = hash('sha1',$_POST['password']);

    if (!empty($user) && !empty($email) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$password')";
        if (odbc_exec($conn, $sql)) {
            $_SESSION['user'] = $user['username'];
            $message = " Registration successful!";
            header("Location: index.php");
        } else {
            $message = " Error: " . odbc_errormsg($conn);
        }
    } else {
        $message = " All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 0 15px #F8D7D0;
        }
        input[type="text"], input[type="email"], input[type="password"] {
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
            background: #1E2235 ;
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
    </style>
</head>
<body>

<form method="POST">
    <h2>Register</h2>
    <label>Username</label>
    <input type="text" name="username" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <input type="submit" value="Register">

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

