<?php
require_once __DIR__ . '/../Controller/userController.php';
// var_dump($profile);
?>
<html>

<head></head>

<body>
    <br>
    ID: <?php echo $profile['userID'] ?>

    <br><br>


    <form action="../Controller/userController.php" method="post">
        <input type="hidden" name="action" value="update">

        Name: <input type="text" name="name" id="" value="<?php echo $profile['userName'] ?>">
        <br><br>

        Email: <input type="text" name="email" id="" value="<?php echo $profile['userEmail'] ?>">
        <br><br>

        Address: <br><textarea name="address" id=""><?php echo $profile['Address'] ?></textarea>
        <br><br>

        Phone: <input type="text" value="<?php echo $profile['Phone'] ?>" name="phone" id="">
        <br><br>

        <input type="submit" value="Update profile">

    </form>
</body>

</html>