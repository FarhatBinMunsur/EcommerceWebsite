<?php
session_start();
require_once __DIR__ . '/../Model/viewallproduct.php';
$product = new Product();
$products = $product->showProduct();
// var_dump($products);
// echo $_SESSION['userID'] ;
?>
<html>

<head>
    <title>Buy Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 class="topheading">ShopEaseee</h1>

    <div class="main">
        <div class="sidebar">
            <h1>Menu</h1>
            <form action="" method="post">
                <input type="submit" name="Home" value="Home" id="">
            </form>

            <form action="../Controller/cartHandler.php" name="Cart" method="post">
                <input type="submit" name="Cart" value="Cart" id="">
            </form>

            <form action="../View/myOrders.php" method="post">
                <input type="submit" name="orders" value="My orders" id="">
            </form>

            <form action="../View/viewProfile.php" method="post">
                <input type="submit" value="My Profile" name="Home" id="">
            </form>

            <form action="../Controller/logoutHandler.php">
                <input type="submit" value="LogOut" name="Home" id="">
            </form>

        </div>

        <div class="content">
        <input type="search" name="" id="search" placeholder="Search for products....." class="search">
        

        <div class="product" id="productContainer">

            <?php foreach ($products as $p) { ?>
                <div name="productCard" class="productCard">
                    <img src="<?php echo $p['image'] ?>" alt="image not available">

                    <div class="productInfo">
                        <p class="productName"><?php echo $p['name']; ?></p>
                        <p class="productPrice"><?php echo $p['price'] . " taka"; ?></p>
                    </div>
                    <form action="../Controller/homepageHandler.php" name="addtocart" method="POST">
                        <input type="hidden" name="action" value="addtocart">
                        <input type="hidden" name="productID" value="<?php echo $p['productID']; ?>">
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $p['stock']; ?>">
                        <input type="submit" name="" id="" value="add to cart">
                    </form>
                </div>

            <?php } ?>

        </div>
    </div>
    </div>


    <script>
        var searchBox = document.getElementById('search');

        function searchResult() {
            var searchTxt = searchBox.value;
            var xhr = new XMLHttpRequest();

            xhr.open("GET", "../api/search.php?name=" + encodeURIComponent(searchTxt), true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var products = JSON.parse(xhr.responseText);

                    displayProducts(products);

                }

            };
            xhr.send();
        }

        function displayProducts(products) {
            var container = document.getElementById("productContainer");

            container.innerHTML = "";

            for (var i = 0; i < products.length; i++) {

                var p = products[i];

                var card = document.createElement("div");

                card.className = "productCard";


                var image = document.createElement("img");

                image.src = p.image;

                image.alt = "image not available";


                var productInfo = document.createElement("div");

                productInfo.className = "productInfo";


                var productName = document.createElement("p");

                productName.className = "productName";

                productName.innerHTML = p.name;


                var productPrice = document.createElement("p");

                productPrice.className = "productPrice";

                productPrice.innerHTML = p.price + " taka";


                productInfo.appendChild(productName);

                productInfo.appendChild(productPrice);


                var form = document.createElement("form");

                form.action = "../Controller/homepageHandler.php";

                form.method = "POST";


                var action = document.createElement("input");

                action.type = "hidden";

                action.name = "action";

                action.value = "addtocart";


                var productID = document.createElement("input");

                productID.type = "hidden";

                productID.name = "productID";

                productID.value = p.productID;


                var quantity = document.createElement("input");

                quantity.type = "number";

                quantity.name = "quantity";

                quantity.value = 1;

                quantity.min = 1;

                quantity.max = p.stock;


                var submit = document.createElement("input");

                submit.type = "submit";

                submit.value = "add to cart";


                form.appendChild(action);

                form.appendChild(productID);

                form.appendChild(quantity);

                form.appendChild(submit);


                card.appendChild(image);

                card.appendChild(productInfo);

                card.appendChild(form);


                container.appendChild(card);
            }

        }

        searchBox.addEventListener("input", searchResult);
    </script>
</body>

</html>