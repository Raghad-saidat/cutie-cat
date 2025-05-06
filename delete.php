<?php
$db_file = realpath("users.accdb");
$conn_str = "Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$db_file;";
$conn = odbc_connect($conn_str, "", "");

$message = "";
$results = [];
$search_query = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $user_id = intval($_POST['delete_id']);
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = odbc_prepare($conn, $sql);

    if (odbc_execute($stmt, [$user_id])) {
        $message = "✅ User deleted successfully.";
    } else {
        $message = "❌ Deletion failed: " . odbc_errormsg($conn);
    }
}
if (isset($_GET['q'])) {
    $search_query = trim($_GET['q']);
    $sql = "SELECT id, username, email FROM users WHERE username LIKE ? OR email LIKE ?";
    $stmt = odbc_prepare($conn, $sql);

    $like = "%" . $search_query . "%";
    if (odbc_execute($stmt, [$like, $like])) {
        while ($row = odbc_fetch_array($stmt)) {
            $results[] = $row;
        }
    } else {
        $message = " Search failed: " . odbc_errormsg($conn);
    }
}

odbc_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search & Delete Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8fa;
            padding: 30px;
        }
        form.search-form {
            text-align: center;
            margin-bottom: 25px;
        }
        input[type="text"] {
            padding: 10px;
            width: 280px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], button {
            padding: 10px 15px;
            background: #dc3545;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }
        input[type="submit"]:hover, button:hover {
            background: #c82333;
        }
        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #dc3545;
            color: white;
        }
        .message {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            color: #28a745;
        }
        .error {
            color: #c82333;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Search & Delete User</h2>

<form class="search-form" method="GET">
    <input type="text" name="q" placeholder="Search by username or email" value="<?= htmlspecialchars($search_query) ?>" required>
    <input type="submit" value="Search">
</form>

<?php if (!empty($message)): ?>
    <div class="message <?= strpos($message, '') !== false ? 'error' : '' ?>">
        <?= $message ?>
    </div>
<?php endif; ?>

<?php if (!empty($results)): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td>
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        <input type="hidden" name="delete_id" value="<?= $user['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php elseif (isset($_GET['q'])): ?>
    <div class="message error">No users found matching "<?= htmlspecialchars($search_query) ?>".</div>
<?php endif; ?>

</body>
</html>
