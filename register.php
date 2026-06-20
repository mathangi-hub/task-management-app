<?php

include "db_connect.php";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO users
            (username,email,password)
            VALUES
            ('$username','$email','$password')";

    mysqli_query($conn,$sql);

    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<br><br>

<input
type="email"
name="email"
placeholder="Email"
required>

<br><br>

<input
type="password"
name="password"
placeholder="Password"
required>

<br><br>

<button name="register">
Register
</button>

</form>

</body>
</html>
