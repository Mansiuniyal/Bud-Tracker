<?php

    $link = mysqli_connect("localhost", "root", "", "intern");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>