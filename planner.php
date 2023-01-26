<?php
session_start();
require("creds.php");
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");


$validToken = $_GET["token"];


if (!is_null($validToken)) {
    $_SESSION["token"] = $validToken;

    $query = "SELECT * FROM `adviseIt` WHERE token = '$validToken'";
    $result = mysqli_query($cnxn, $query);

    if (empty(mysqli_fetch_row($result))) {
        header("Location: https://halsamach.greenriverdev.com/home.html");
    }
    foreach ($result as $row) {
        $newFall = $row["fall"];
        $newWinter = $row["winter"];
        $newSpring = $row["spring"];
        $newSummer = $row["summer"];
        $newAdvisor = $row["advisor"];

    }

}

if (empty ($_POST) && is_null($validToken)) {
    $token = bin2hex(random_bytes(3));
    $_SESSION["token"] = $token;
}


$token = $_SESSION["token"];

$fall = $_POST["fall"];
$winter = $_POST["winter"];
$spring = $_POST["spring"];
$summer = $_POST["summer"];
$lastUpdate = date("Y-m-d h:i:s");
$advisor = $_POST["advisor"];

if (!empty($_POST)) {
    $select = "SELECT * FROM `adviseIt` WHERE token = '$token'";
    $result = mysqli_query($cnxn, $select);

    if (empty(mysqli_fetch_row($result))) {
        $sql = "INSERT INTO adviseIt (token, fall, winter, spring, summer, lastUpdate, advisor)
VALUES('$token','$fall','$winter','$spring','$summer','$lastUpdate', '$advisor')";

        mysqli_query($cnxn, $sql);
    } else {
        $sql = "UPDATE adviseIt SET fall = '$fall', winter = '$winter', spring  = '$spring',
                    summer= '$summer', lastUpdate = '$lastUpdate', advisor = $advisor WHERE token = '$token'";

        mysqli_query($cnxn, $sql);
    }
}

if (empty($_POST) || is_null($validToken)) {
    $_SESSION["fall"] = $newFall;
    $_SESSION["winter"] = $newWinter;
    $_SESSION["spring"] = $newSpring;
    $_SESSION["summer"] = $newSummer;
    $_SESSION["advisor"] = $newAdvisor;
}

$_SESSION["fall"] = $fall;
$_SESSION["winter"] = $winter;
$_SESSION["spring"] = $spring;
$_SESSION["summer"] = $summer;
$_SESSION["lastUpdate"] = $lastUpdate;
$_SESSION["advisor"] = $advisor;



//echo $result;


?>

    <link rel="stylesheet" href="styles/planner.css">
    <div id="token">
        <?php
        print "<h1> Token: " . $_SESSION["token"]
        ?>
    </div>
    <br>

    <form action="#" method="post">
        <div id="rows">

            <div class="quarter">
                <label for="fall">Fall</label><br>
                <textarea id="fall" name="fall" rows="5">
        <?php echo $fall;
        if (empty($_POST) || is_null($validToken)) {
            echo $newFall;
        }
        ?>
    </textarea>
                <br>
            </div>


            <div class="quarter">
                <label for="winter">Winter</label><br>
                <textarea id="winter" name="winter" rows="5">
        <?php
        echo $winter;
        if (empty($_POST) || is_null($validToken)) {
            echo $newWinter;
        }
        ?>
    </textarea>
                <br>
            </div>


            <div class="quarter">
                <label for="spring">Spring</label><br>
                <textarea id="spring" name="spring" rows="5">
        <?php
        echo $spring;
        if (empty($_POST) || is_null($validToken)) {
            echo $newSpring;
        }
        ?>
    </textarea>
                <br>
            </div>


            <div class="quarter">
                <label for="summer">Summer</label><br>
                <textarea id="summer" name="summer" rows="5">
        <?php
        echo $summer;
        if (empty($_POST) || is_null($validToken)) {
            echo $newSummer;
        }
        ?>
   </textarea>
                <br>
            </div>
        </div>
        <div id="advisor2">
            <label for="advisor">Advisor:</label><br>
            <textarea id="advisor" name="advisor">
                 <?php
                 echo $advisor;
                 if (empty($_POST) || is_null($validToken)) {
                     echo $newAdvisor;
                 }
                 ?>
        </textarea>
        </div>

        <div id="savePlan">
            <button id="save" type="submit"> Save</button>
        </div>

    </form>

    <form action="print.php" method="post">
        <div id="print">
            <button id="print" type="submit"> Print</button>
        </div>
    </form>

<?php
if (!empty($_POST)) {
    print "<div id='savedPlan'>
<h1>Plan successfully saved!</h1>
<h2> Last saved: . ($lastUpdate)</h2>
    </div>";
}








