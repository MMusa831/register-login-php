<?php
include "db_conn.php";
session_start();

if (isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM `users` WHERE id = {$_SESSION['user_id']}";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">

    <title>Home</title>
</head>

<body>
    <h1>Home</h1>
    <?php if (isset($user)): ?>
        <p>Hello <?= htmlspecialchars($user['name']) ?></p>
        <a href="logout.php">log out</a>
    <?php else: ?> 
        <p><a href="login.php">Log in</a> or <a href="sign-up.html">Sign up</a></p>
    <?php endif; ?>       

</body>

</html>