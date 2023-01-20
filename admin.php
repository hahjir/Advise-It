<?php
session_start();
require("creds.php");
$cnxn = mysqli_connect($host, $user, $password, $database)
or die("error connecting");

if ($_SESSION["admin"] != "admin") {
    header("Location: https://halsamach.greenriverdev.com/login.php");
}
?>



<h2>Admin Table</h2>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"></head>
<link rel="stylesheet" href="styles/admin.css">

<table id="admin" class=" text-dark display" style="width:100%">
    <thead>
    <tr>
        <th>token</th>
        <th>fall</th>
        <th>winter</th>
        <th>spring</th>
        <th>summer</th>
        <th>lastUpdate</th>
        <th>advisor</th>
    </tr>
    </thead>

    <?php

    $query = "SELECT * FROM `adviseIt`";
    $result = mysqli_query($cnxn, $query);

    foreach ($result as $row) {
        $fall = "fall";
        $winter = $row['winter'];
        $spring = $row['spring'];
        $summer = $row['summer'];
        $lastUpdate = $row['lastUpdate'];
        $advisor = $row['advisor'];


        echo "
            <tr>
                <td>$fall</td>
                <td>$winter</td>
                <td>$spring</td>
                <td>$summer</td>
                <td>$lastUpdate</td>
                <td>$advisor</td>
            </tr>";
    }
    ?>
    <tbody>
</table>


<script>
    $('#admin').DataTable(
        {
            responsive: true
        }
    );
</script>

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>



