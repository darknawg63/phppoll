<?php

session_start();

$_SESSION['user_id'] = 9;

$db = new PDO('mysql:host=localhost;dbname=poll', 'root', 'password');