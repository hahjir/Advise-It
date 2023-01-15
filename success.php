<?php
session_start();

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("creds.php");
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");

$token = $_SESSION["token"];

$fall = $_POST["fall"];
$winter = $_POST["winter"];
$spring = $_POST["spring"];
$summer = $_POST["summer"];
$lastUpdate = date("Y-m-d h:i:s");

$sql = "INSERT INTO adviseIt (token, fall, winter, spring, summer, lastUpdate)
VALUES('$token','$fall','$winter','$spring','$summer','$lastUpdate')";

mysqli_query($cnxn, $sql);

echo "<p>Last saved:</p>" .($lastUpdate);
?>

<h1>Plan successfully saved!</h1>




