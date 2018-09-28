<?php session_start();
?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pcmaisum";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


require_once 'functions.php';
?>