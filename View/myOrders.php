<?php
    require_once __DIR__.'/../Controller/myOrderHandler.php';        //give me $orders
    var_dump($orders);
    // var_dump($cart);
    // var_dump($_SESSION);
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    
    </head>
    
    <body>

    <h1 class="topheading">My Orders</h1>

    <div class="main">
            <div class="sidebar">
            <h1>Menu</h1>
            <form action="customerHome.php" method="post">
                <input type="submit" name="Home" value="Home" id="">
            </form>

            <form action="../Controller/cartHandler.php" name="Cart" method="post">
                <input type="submit" name="Cart" value="Cart" id="">
            </form>

            <form action="" method="post">
                <input type="submit" name="orders" value="My orders" id="">
            </form>

            <form action="">
                <input type="submit" value="My Profile" name="Home" id="">
            </form>

            <form action="">
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
                    <td rowspan="<?php echo count($orders[$key])+1 ;?>"> <?php echo "Will be Delivered to :".$orders[$key]['deliveryLoc']. "<br>" . "Phone: " . $orders[$key]['phone']?></td>

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
            
            <form  class="cancelForm" action="../Controller/myOrderHandler.php">
                <input type="hidden" name="orderid" id="" value="<?php echo $key; ?>">
                <input type="hidden" name="status" id="" value="<?php echo $value['status']; ?>">
                <input type="submit" name="cnclod" id="" value="Cancel Order" class="cancelOrderbtn">
                <br>
            </form>
            <?php }?>
            <span style="color:red; font-weight: bold; font-size:16px; font-style: italic"><?php echo (isset($_SESSION['noCancel']))?$_SESSION['noCancel']:"";?></span>


        </div>
    </div>
