<?php 

require_once 'app/init.php';

if(!isset($_GET['poll'])) {
    header('Location: index.php');
} else {

    $id = (int)$_GET['poll'];

    // Get general poll information
    $pollQuery = $db->prepare("
        SELECT id, question
        FROM polls
        WHERE id = :poll
        AND DATE(NOW()) BETWEEN starts AND ends
    ");

    $pollQuery->execute([
        'poll' => $id
    ]);

    $poll = $pollQuery->fetchObject();

    // Get poll choices

    $choicesQuery = $db->prepare("
        SELECT polls.id, polls_choices.id AS choice_id, polls_choices.name
        FROM polls
        JOIN polls_choices
        ON polls.id = polls_choices.poll
        WHERE polls.id = :poll
        AND DATE(NOW()) BETWEEN polls.starts AND polls.ends
    ");
    
    $choicesQuery->execute([
        'poll' => $id
    ]);

    // Extract choices
    while($row = $choicesQuery->fetchObject()) {
        $choices[] = $row;
    }

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

        <?php if(!$poll): ?>
            <p>That poll doesn't exist.</p>
        <?php else: ?>

            <div class="poll">
                <div class="poll-question">
                    <?php echo $poll->question; ?>
                </div>

                <?php if(!empty($choices)): ?>

                    <form action="vote.php" method="post">
                        <div class="poll-options">

                            <?php foreach ($choices as $index => $choice): ?>

                                <div class="poll-option">     
                                    <input type="radio" name="choice" value="<?php echo $choice->choice_id; ?>" id="c<?php echo $index; ?>">
                                    <label for="c<?php echo $index; ?>"><?php echo $choice->name; ?></label>                     
                                </div>

                            <?php endforeach; ?>

                            <input type="submit" value="Submit answer">
                            <input type="hidden" name="poll" value="<?php echo $id; ?>">
                        </div>
                    </form>
                <?php else: ?>
                    <p>There are no choices right now.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </body>
</html>