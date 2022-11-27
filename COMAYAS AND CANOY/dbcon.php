<?php

    $con = mysqli_connect("localhost", "root", "", "db_comayas");

    if(!$con)
    {
        echo mysqli_connect_error();
    }
?>
