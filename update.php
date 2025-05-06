<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$db = realpath("users.accdb");
$conn_str = "Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$db_file;";
$conn = odbc_connect($conn_str, "", "");

$message = "";
$user_data = null;

if (!$conn) {
    $message = " Database connection failed.";
} else {
    $username = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = odbc_prepare($conn, $sql);

    if (odbc_execute($stmt, [$username])) {
        $user_data = odbc_fetch_array($stmt);
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $new_username = trim($_POST['username']);
        $new_email = trim($_POST['email']);
        $new_password = $_POST['password'];

        $update_sql = "UPDATE users SET username=?, email=?" .
                      (!empty($new_password) ? ", password=?" : "") .
                      " WHERE id=?";
        $update_stmt = odbc_prepare($conn, $update_sql);

        $params = [$new_username, $new_email];
        if (!empty($new_password)) {
            $params[] = password_hash($new_password, PASSWORD_DEFAULT);
        }
        $params[] = $user_data['id'];

        if (odbc_execute($update_stmt, $params)) {
            $_SESSION['user'] = $new_username;
            $message = " Profile updated successfully!";
        } else {
            $message = " Update failed: " . odbc_errormsg($conn);
        }
    }

    odbc_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #17a2b8;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #138496;
        }
        .message {
            margin-top: 15px;
            font-weight: bold;
            color: #d9534f;
        }
        .message.success {
            color: #28a745;
        }
    </style>
</head>
<body>

<form method="POST">
    <h2>Update Profile</h2>
    <label>Username</label>
    <input type="text" name="username" value="<?= htmlspecialchars($user_data['username']) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user_data['email']) ?>" required>

    <label>New Password (leave blank to keep current)</label>
    <input type="password" name="password">

    <input type="submit" value="Update">

    <?php if (!empty($message)): ?>
        <div class="message <?= strpos($message, '✅') !== false ? 'success' : '' ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>
</form>

</body>
</html>
