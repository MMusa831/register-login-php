<?php
include "db_conn.php";
$name_error = $email_error = $password_error = $passconfirm_error = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    # code...


if (empty($_POST["name"])) {
    $name_error = "Name is required!";
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email_error = "Valid email is required!";
}

if (strlen($_POST["password"]) < 8) {
   $password_error = "Password must contain at least 8 characters";
}
if (!preg_match("/[a-z]/i",  $_POST["password"])) {
    $password_error = "Password must contain at least one letter";
}
if (!preg_match("/[0-9]/",  $_POST["password"])) {
    $password_error = "Password must contain at least one number";
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $passconfirm_error = "Passwords does not match ";
}
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
 

if (empty($name_error) && empty($email_error) && empty($password_error) && empty($passconfirm_error)) {

        $sql = "INSERT INTO `users`(`name`, `email`, `password_hash`)
VALUES (?, ?, ?)";

        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("SQL error: " . $conn->error);
        }

        $stmt->bind_param(
            "sss",
            $_POST['name'],
            $_POST['email'],
            $password_hash
        );

        if ($stmt->execute()) {
            header("location: signup-success.html");
            exit;
        } else {
            if ($conn->errno === 1062) {
                die("Email already taken");
            } else {
                die($conn->error . " " . $conn->errno);
            }
        }
}

}


