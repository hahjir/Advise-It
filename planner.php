<?php
session_start();
if (empty ($_POST)) {
    $token = bin2hex(random_bytes(3));
    $_SESSION["token"] = $token;
}


//$_SESSION["token"] = $token

require("creds.php");
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");

$token = $_SESSION["token"];

$fall = $_POST["fall"];
$winter = $_POST["winter"];
$spring = $_POST["spring"];
$summer = $_POST["summer"];
$lastUpdate = date("Y-m-d h:i:s");

if(!empty($_POST)){
    $select = "SELECT * FROM `adviseIt` WHERE token = '$token'";
    $result = mysqli_query($cnxn, $select);

    if (empty(mysqli_fetch_row($result))) {
        $sql = "INSERT INTO adviseIt (token, fall, winter, spring, summer, lastUpdate)
VALUES('$token','$fall','$winter','$spring','$summer','$lastUpdate')";

        mysqli_query($cnxn, $sql);
    } else{
        $sql = "UPDATE adviseIt SET fall = '$fall', winter = '$winter', spring  = '$spring',
                    summer= '$summer', lastUpdate = '$lastUpdate' WHERE token = '$token'";

        mysqli_query($cnxn , $sql);
    }
}





//echo $result;




if (!empty($_POST)) {
    echo "<h1>Plan successfully saved!</h1>";
    echo "<p>Last saved:</p>" . ($lastUpdate);

}

?>
<h1><?php echo $_SESSION["token"] ?></h1>
<br>

<form action="#" method="post">

    <label for="fall">Fall</label><br>
    <textarea id="fall" name="fall" rows="5">
        <?php echo $winter ?>
    </textarea>
    <br>

    <label for="winter">Winter</label><br>
    <textarea id="winter" name="winter" rows="5">
        <?php echo $winter ?>
    </textarea>
    <br>

    <label for="spring">Spring</label><br>
    <textarea id="spring" name="spring" rows="5">
        <?php echo $spring ?>
    </textarea>
    <br>

    <label for="summer">Summer</label><br><br>
    <textarea id="summer" name="summer" rows="5">
        <?php echo $summer ?>
   </textarea>
    <br>

    <button type="submit"> Save</button>

</form>






