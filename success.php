<?php
session_start();
$database = "halsamac_adviseIt";
$host = "localhost";
$user = "halsamac_halsamac";
$password = "joojajoojaH@3";
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");

$token = $_SESSION["token"];

$fall = $_POST["fall"];
$winter = $_POST["winter"];
$spring = $_POST["spring"];
$summer = $_POST["summer"];
$lastUpdate = date("Y-m-d h:i:sa");

$sql = "INSERT INTO adviseIt (token, fall, winter, spring, summer, lastUpdate)
VALUES('$token','$fall','$winter','$spring','$summer','$lastUpdate')";

mysqli_query($cnxn, $sql);
