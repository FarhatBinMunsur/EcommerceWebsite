<?php

session_start();
?>

<html>
    <head></head>

    <body>
        <form action="../Controller/signinHandler.php" method="post">
            User Email: <input type="email" name="email">
            <br><br>

            Password: <input type="password" name="pass">
            <br><br>

            <?php if(isset($_SESSION["loginerror"])) echo $_SESSION["loginerror"] ; ?>
            
            <br>
            <input type="submit" value="Login">

        </form>
    </body>
</html>