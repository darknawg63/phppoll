<?php

session_start();

$_SESSION['user_id'] = 9;

try {
    $db = new PDO('mysql:host=localhost;dbname=poll', 'root', 'password');
}
// to handle connection error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}