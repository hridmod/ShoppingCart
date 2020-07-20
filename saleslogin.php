<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="saleslogin.css">
    <title>Login</title>
</head>
<body>


<header align=center>
        Welcome to Navlakhi!!
</header>

    <br>

    <div class="panel" align=center>
        <form action="salesauthenticate.php" method="POST">
            <br>
            <input class="contact-form-text" type="text" name="username" placeholder="Username">
            <br>
            <input  class="contact-form-text" type="password" name="password" placeholder=Password>
            <br>
            <input class="contact-form-btn" type=submit name="Login">
            <input type="hidden" name=s value=1>
        </form>
    </div>

</body>
</html>
