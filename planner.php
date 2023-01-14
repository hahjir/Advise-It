<?php
session_start();
$token=bin2hex(random_bytes(3));
$_SESSION["token"] = $token
?>
<h1><?php echo $token ?></h1>
<br>

<form action="success.php" method="post">
    <label for="fall">Fall</label><br>
    <textarea id="fall" name="fall" rows="5">
    </textarea>
    <br>

    <label for="winter">Winter</label><br>
    <textarea id="winter" name="winter" rows="5">
    </textarea>
    <br>

    <label for="spring">Spring</label><br>
    <textarea id="spring" name="spring" rows="5">
    </textarea>
    <br>

    <label for="summer">Summer</label><br><br>
    <textarea id="summer" name="summer" rows="5">
   </textarea>
    <br>

    <button type="submit"> Save</button>

</form>



