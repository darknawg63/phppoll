<?php

require_once 'app/init.php';

$pollsQuery = $db->query("
    SELECT id, question
    FROM polls
    WHERE DATE(NOW()) BETWEEN starts AND ends
");

while($row = $pollsQuery->fetchObject()) {
    $polls[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <?php if(!empty($polls)): ?>
            <ul>
                <?php foreach ($polls as $poll): ?>
                    <li><a href="poll.php?id=<?php echo $poll->id; ?>"><?php echo $poll->question; ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Sorry, no polls available right now.</p>
        <?php endif; ?>
    </body>
</html>