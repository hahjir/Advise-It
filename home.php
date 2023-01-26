<?php
session_start();
require("creds.php");
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");


$token = bin2hex(random_bytes(3));
$select = "SELECT * FROM `adviseIt` WHERE token = '$token'";
$result = mysqli_query($cnxn, $select);

while (!empty(mysqli_fetch_row($result))) {
    $token = bin2hex(random_bytes(3));
    $select = "SELECT * FROM `adviseIt` WHERE token = '$token'";
    $result = mysqli_query($cnxn, $select);
    }

    $_SESSION["token"] = $token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advise-It</title>
    <link rel="stylesheet" href="styles/styles.css">



</head>
<body>
<div id="advise">
<h1>Advise-It</h1>
    <div id="button">
    <a href="planner.php?token=<?php echo $_SESSION["token"];?>"><button id="plan">Create New Plan</button></a>
    </div>
</div>


<a href="login.php"><button id="click" type="submit">Administrator Login</button>
</button></a>

</body>
</html>

