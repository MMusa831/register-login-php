<?php include "register.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <title>Sign Up</title>
</head>

<body>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <h1>Sign up</h1>
    <form action="register.php" method="post" novalidate>
        <p><span class="error">* required field</span></p>
        <div>
            <label for="name">Name:</label>
            <span class="error">*</span>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            <p class="error username-error">
                <?php echo $name_error; ?>
            </p>
        </div>
        <div>
            <label for="email">Email:</label>
            <span class="error">*</span>
            <input type="email" id="email" name="email" value="<?php $email; ?>">
            <p class="error email-error">
                <?php echo $email_error; ?>
            </p>
        </div>
        <div>
            <label for="password">Password:</label>
            <span class="error">*</span>
            <input type="password" id="password" name="password" value="<?php $password; ?>">
            <p class="error password-error">
                <?php echo $password_error; ?>
            </p>
        </div>
        <div>
            <label for="password_confirmation">Repeat password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            <button type="submit">Sign up</button>
        </div>
    </form>

</body>

</html>