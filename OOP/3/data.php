<?php

require_once 'classes.php';

$publications = array();

//connect to database
$con = mysqli_connect("localhost", "root", "testsite2");
if (mysqli_connect_errno()) {
    echo 'Failed to connect to mysql' . mysqli_connect_error();
}

//make query
$result = mysqli_query($con, "SELECT * FROM publications");

//work with data
while ($row = mysqli_fetch_array($result)) {
    //echo '<br>' . $row["type"];
    //////////////////new NewsPublication
    $publications[] = new $row["type"]($row);
}

?>