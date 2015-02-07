<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
            
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div class="poll">
            <div class="poll-question">
                This is the poll question
            </div>
            <form action="vote.php" method="get">
                <div class="poll-options">
                    <div class="poll-option">
                        <input type="radio" name="choice" value="1" id="c1">
                        <label for="c1">Choice 1</label>
                    </div>
                    <div class="poll-option">
                        <input type="radio" name="choice" value="20" id="c2">
                        <label for="c2">Choice 2</label>
                    </div>
                    <div class="poll-option">
                        <input type="radio" name="choice" value="35" id="c3">
                        <label for="c3">Choice 3</label>
                    </div>

                    <input type="submit" value="Submit answer">
                    <input type="hidden" name="poll" value="1">
                </div>
            </form>
        </div>
    </body>
</html>