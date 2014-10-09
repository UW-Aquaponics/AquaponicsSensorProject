<?php

$address = "something.com";
$user = "me";
$pass = "pass";
$datab = "this one";

$con = myspli_connect($address, $user, $pass, $datab);

if (mysqli_connect_errno()) {
    echo "Connection failure: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM TempChecks");

mysqli_close($con);

?>