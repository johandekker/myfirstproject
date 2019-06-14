<html>
    <head>
        <title>Tmy first project johan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       <form method="post" action="../controllers/presenter.php">
            voer een text in:<br>
            <input type="text" name="naam" placeholder="naam"><br>
            <br>
     <input type="submit" value="Submit">
        </form>
        <?php
        echo $vieuwData["palindroom"];
        echo "<br>";
        echo $vieuwData["message"];
        echo "<br>";
        echo $vieuwData["action"];
        echo "<br>";
        ?>
    </body>
</html>
