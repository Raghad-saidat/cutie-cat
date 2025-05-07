<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$conn = odbc_connect("users", "", "");

$message = "";
$user_data = null;

if (!$conn) {
    $message = "Database connection failed.";
} else {
    $username = $_SESSION['user'];

    $sql = "SELECT id, username, email, password FROM users WHERE username = '$username'";
    $result = odbc_exec($conn, $sql);

    if ($result) {
        $user_data = odbc_fetch_array($result);
        if (!$user_data || !isset($user_data['id'])) {
            $message = "User data is incomplete or missing.";
        }
    } else {
        $message = "Failed to fetch user data: " . odbc_errormsg($conn);
    }

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];

        $delete_sql = "DELETE FROM users WHERE id = $id";
        $delete_result = odbc_exec($conn, $delete_sql);

        if ($delete_result) {
            $message = "Profile deleted successfully!";
            session_destroy();
            header("Location: login.php");
            exit();
        } else {
            $message = "Failed to delete profile: ";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($user_data['id'])) {
        $new_username = trim($_POST['username']);
        $new_email = trim($_POST['email']);
        $new_password = trim($_POST['password']);

        $hashed_password = !empty($new_password) ? hash('sha1', $new_password) : $user_data['password'];

        $update_sql = "UPDATE users SET username = '$new_username', email = '$new_email', password = '$hashed_password' WHERE id = {$user_data['id']}";

        $update_result = odbc_exec($conn, $update_sql);

        if ($update_result) {
            $_SESSION['user'] = $new_username;
            $message = "Profile updated successfully!";
            header("Location: update.php");
        } else {
            $message = "Update failed: ";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Profile</title>
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
            width: 400px;
            box-shadow: 0 0 15px  #F8D7D0;
        }

        input[type="text"],
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
            color: #d9534f;
        }

        .message.success {
            color: #28a745;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .delete {
            display: inline-block;
            margin-top: 10px;
            color: #dc3545;
            font-weight: bold;
        }

        .delete-container {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <form method="POST">
        <div class="top">
            <h2>Update Profile</h2>
            <a href="index.php">Back</a>
        </div>
        <label>Username</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user_data['username']) ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user_data['email']) ?>" required>

        <label>New Password (leave blank to keep current)</label>
        <input type="password" name="password">

        <input type="submit" value="Update">
        <div class="delete-container">
            <a class="delete" href="update.php?action=delete&id=<?= $user_data['id'] ?>">Delete Profile</a>
        </div>

        <?php if (!empty($message)): ?>
            <div class="message <?= strpos($message, '✅') !== false ? 'success' : '' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>
    </form>

</body>

</html>