<?php

require_once('../conn/connect.php');

mysqli_close($conn);
session_destroy();
header("Location: ../index.php");

