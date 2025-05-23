<?php
    $conn = mysqli_connect('localhost', 'root', '', 'login_system', '3307');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
?>