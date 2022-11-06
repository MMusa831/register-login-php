<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'Soudan11@');
define('DB_NAME', 'login_db');

$conn = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);

if (mysqli_connect_error()) {
    echo "connection failed" . mysqli_connect_error();
}