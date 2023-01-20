<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];



if ($username == "admin" && $password == "admin") {
    $_SESSION["admin"] = "admin";
    header("Location: https://halsamach.greenriverdev.com/admin.php");
} else if($username != "admin" && $password != "admin" && !empty($_POST)) {
    echo "<div id='error'> Incorrect username or password, Please try again! </div>";
}

?>

<link rel="stylesheet" href="styles/login.css">
<form method="post">
    <h1>Admin Login</h1>
<div id="login">
    <div id="username">
    <label for="username">Username:</label>
    <input id="username" name="username">
    </div>
    <br>
    <div id="password">
    <label for="password">Password:</label>
    <input id="password" name="password">
    </div>
    <br>

    <button type="submit">Login</button>
</div>
</form>