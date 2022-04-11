<?php
    $connectionDB = mysqli_connect(
        "localhost",
        "comp_view",
        "teressa",
        "comp_conf"
    );
	
    if (mysqli_connect_errno()) {
        echo "Unable to connect to MySQL: " . mysqli_connect_error();
    }
?>