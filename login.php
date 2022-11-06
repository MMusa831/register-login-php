<?php

include "db_conn.php";
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = sprintf(
        "SELECT * FROM users 
                    WHERE email = '%s'",
        $conn->real_escape_string($_POST['email'])
    );

    $result = $conn->query($sql);

    if ($result) {

        if ($result && mysqli_num_rows($result)) {

            $user = mysqli_fetch_assoc($result);
            if (password_verify($_POST['password'], $user['password_hash'])) {
                session_start();

                session_regenerate_id();

                $_SESSION['user_id'] = $user['id'];

                header("location: index.php");
                exit;
            }
        }
    }
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <title>Login</title>
</head>

<body>
    <h1>Sign in</h1>
    <?php if ($is_invalid) : ?>
        <em>Invalid login</em>
    <?php endif; ?>
    <form method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? "") ?>">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Login</button>
    </form>
</body>

</html>