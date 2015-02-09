<?php

require_once 'app/init.php';

if(isset($_POST['question'])) {

    $questionQuery = $db->prepare("
                              
        INSERT INTO polls
        VALUES (
            NULL,
            :question,
            NOW(),
            NOW()
        )
    ");

    $questionQuery->execute([
        'question' => $_POST['question']

    ]);

    header('Location: index.php');
}
