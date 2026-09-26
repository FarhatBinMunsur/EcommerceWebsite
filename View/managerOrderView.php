<?php
    require_once __DIR__.'/../Controller/managerOrderHandler.php';        //give me $orders
    // var_dump($orders);
    // var_dump($cart);
    // var_dump($_SESSION);
      
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    
    </head>
    
    <body>

    <h1 class="topheading">Manage Order</h1>

    <div class="main">
            <div class="sidebar">
            <h1>Menu</h1>
            <form action="managerHome.php" method="post">
                <input type="submit" name="Home" value="Home" id="">
            </form>

            <form action="" name="Cart" method="post">
                <input type="submit" name="Cart" value="Manage Orders" id="">
            </form>

            

            <form action="../View/manageProduct.php" method="post">
                <input type="submit" value="Product Operation" name="Home" id="">
            </form>

            <form action="">
                <input type="submit" name="orders" value="My orders" id="">
            </form>

            <form action="../Controller/logoutHandler.php" method="post">
                <input type="submit" value="LogOut" name="Home" id="">
            </form>

        </div>

        <div class="tables">
            <?php foreach($orders as $key=>$value){?>
            <table>
                <tr>
                    <th colspan="2"><?php echo "Order ID: $key " ?></th>
                    <th colspan="2"><?php echo "Status: $value[status] " ?></th> 
                    <th>Details</th>

                </tr>

                <tr>
                    <th>Product Name </th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <td rowspan="<?php echo count($orders[$key])+1?>">
                        <?php echo "Will be Delivered to :".$orders[$key]['deliveryLocation']. "<br>" . "Phone: " . $orders[$key]['phone']?>
                    </td>

                </tr>
                
                <?php for($i=0; $i<count($orders[$key])-3;$i++){ ?>
                <tr>
                    <td ><?php echo $value[$i]['name']?></td>
                    <td ><?php echo $value[$i]['price']?></td>
                    <td ><?php echo $value[$i]['quantity']?></td>
                    <td ><?php echo $value[$i]['total']?></td>

                </tr>


                <?php }?>
            </table>
            
            <form  class="cancelForm" action="../Controller/managerOrderHandler.php">
                <input type="hidden" name="orderid" id="" value="<?php echo $key; ?>">
                <input type="hidden" name="status" id="" value="<?php echo $value['status']; ?>">
                <input type="submit" name="cnclod" id="" value="Cancel Order" class="cancelOrderbtn">
                <br>
            </form>
            <?php }?>

            <span style="color:red; font-weight: bold; font-size:16px; font-style: italic">
            <?php
            if (isset($_SESSION['noCancel'])) {
            echo $_SESSION['noCancel'];
            unset($_SESSION['noCancel']);
            } 
            ?>
            </span>

        </div>
    </div>
