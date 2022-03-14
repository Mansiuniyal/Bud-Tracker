<?php

    $link = mysqli_connect("localhost", "root", "", "manager");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>