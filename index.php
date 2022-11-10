<?php
require_once 'php/collectorsappfunctions.php';
require_once 'php/addToDatabase.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plant Collection</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<header id="top">
    <h1>Welcome to my plant collection app!</h1>
    <p>My apologies some of the plants are dead or dying, I blame my friend who's "looking after them".</p>
</header>
<main>
    <div class = "container">
        <?php
        $db = connectToDatabase();
        $plants = getAllArray($db);
        echo addToHTML($plants);
        ?>
    </div>
</main>
<footer id="footer">
    <h1>Add your own plants!</h1>
    <form class="form" method="post" action="php/addToDatabase.php">
        <div class = "allInputs">
            <div class="input">
                <label for="species">Input Species name:</label>
                <br>
                <input type="text" id="species" name="species">
            </div>
            <div class="input">
                <label for="nickname">Input Nickname:</label>
                <br>
                <input type="text" id="nickname" name="nickname">
            </div>
            <div class="input">
                <label for="height">Input Average Height:</label>
                <br>
                <input type="text" id="height" name="height">
            </div>
            <div class="input">
                <label for="pic_link">Input Link To Picture:</label>
                <br>
                <input type="text" id="pic_link" name="pic_link">
            </div>
            <div class="input">
                <label for="pic_alt">Input Alt Text For Picture:</label>
                <br>
                <input type="text" id="pic_alt" name="pic_alt">
            </div>
        </div>
        <input type="submit" value="Submit" id="submit">
    </form>
    <a class="backToTop" href="#top">
    <img  src="images/back-to-top.png" alt="Back to top arrow">
    </a>
</footer>
</body>

</html>