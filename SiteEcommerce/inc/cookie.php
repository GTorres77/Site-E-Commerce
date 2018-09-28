<?php

function save($user) {
    $validade = time() + 600 * 100;
    setcookie('utilizadorConectado', $user, $validade, "/");
    alertMessage();
}

function delete(){
    unset($_COOKIE['utilizadorConectado']);
}

function alertMessage(){
    $message = $_COOKIE['utilizadorConectado'];
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>