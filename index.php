<?php
include './database/connection.php';

if (session_id() == '') {
    session_start();
}
?>
<html lang="en">

<head>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .box-img {
            width: 100%;
            height: 220px; /* Fixed height for all images */
        }
        
        .box-img img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* This ensures images maintain aspect ratio */
        }

        .box {
            width: 350px; /* Increased width from 280px to 350px */
        }

        .flex-form {
            display: flex;
            justify-content: center;
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <h1>Online Sweets Spot</h1>
        </div>
        <nav>
            <ul>
                <?php
                $role = '';
                if (isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                }

                // Always show Cart first if logged in
                if ($role != '') {
                    echo '<li><a href="cart.php">Cart <span class="cartItem">'.(!empty($_SESSION["cart"]) ? count($_SESSION["cart"]) : "0").'</span></a></li>';
                }

                // Show Order Summary for customers
                if ($role == 'customer') {
                    echo '<li><a href="customerOrders.php?user='.$_SESSION['id'].'">Order Summary</a></li>';
                }

                // Show Admin Panel for admins after Cart
                if ($role == 'admin') {
                    echo '<li><a href="home.php">Admin Panel</a></li>';
                }

                // Always show Login
                echo '<li><a href="login.php">Login</a></li>';

                // Show Logout for logged in users
                if ($role != '') {
                    echo '<li><a href="logout.php">Logout</a></li>';
                }

                // Always show Sign up at the end
                echo '<li><a href="signup.php">Sign up</a></li>';
                ?>
            </ul>
        </nav>
    </header>

    <form class="form-searchbar" action="" method="POST">
        <input required name="query" type="text" placeholder="Search">
        <select required name="category" class="select-btn-search">
            <option value="" selected hidden>Select Category</option>
            <?php
            $cats = $conn->query("SELECT * FROM `categories`");
            foreach ($cats as $cat) { ?>
                <option value="<?php echo $cat['cid'] ?>"><?php echo $cat['cName'] ?></option>
            <?php
            }
            ?>
        </select>
        <button name="search">Search</button>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $cid = $_POST['category'];
        $query = $_POST['query'];
        $products = $conn->query("SELECT * FROM `products` WHERE `cid` = '$cid' AND (`pName` LIKE '%$query%' OR `pPrice` LIKE '%$query%')");
    } else {
        $products = $conn->query("SELECT * FROM `products` LIMIT 3");
    }
    ?>

    <!-- <form class="form-31" action="" method="POST"> -->
        <?php
        if (mysqli_num_rows($products) == 0) {
            //
        } else {
            echo '<div class = "flex-form">';
            foreach ($products as $product) { ?>
                <form class="form-31" action="" method="POST">

                <div class="box-flex">
                    <div class="box">
                        <div class="box-img">
                            <img src="<?php 
                                $productName = $product['pName'];
                                if ($productName == 'Product 1') {
                                    echo './assets/images/sweet.jpg';
                                } else if ($productName == 'Product 2') {
                                    echo './assets/images/turkish sweet.jpg';
                                } else if ($productName == 'Product 3') {
                                    echo './assets/images/arabian sweets.jpg';
                                } else {
                                    echo './assets/images/' . $product['pImage'];
                                }
                            ?>" alt="Sweet Image" />
                        </div>
                        <div class="heading-form3">
                            <div class="name">
                                <p>Name:</p>
                                <p><?php 
                                    $productName = $product['pName'];
                                    if ($productName == 'Product 1') {
                                        echo 'Pakistani';
                                    } else if ($productName == 'Product 2') {
                                        echo 'Turkish';
                                    } else if ($productName == 'Product 3') {
                                        echo 'Arabian';
                                    } else {
                                        echo $productName;
                                    }
                                ?></p>
                            </div>
                            <div class="name">
                                <p>Price:</p>
                                <p><?php 
                                    $productName = $product['pName'];
                                    if ($productName == 'Product 1') {
                                        echo '1200';
                                    } else if ($productName == 'Product 2') {
                                        echo '2600';
                                    } else if ($productName == 'Product 3') {
                                        echo '1700';
                                    } else {
                                        echo $product['pPrice'];
                                    }
                                ?></p>
                            </div>

                            <div class="name">
                                <p>Quantity:</p>
                                <input required name="itemQuantity" type="number" min="1" max="100" value="1" />

                            </div>

                            <div class="form3-btn">
                                <input name="itemId" type="text"  hidden value="<?php echo $product['pid'] ?>">
                                <input name="itemName" type="text"  hidden value="<?php echo $product['pName'] ?>">
                                <input name="itemPrice" type="text"  hidden value="<?php echo $product['pPrice'] ?>">
                                <button name="cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
                <?php
            }
            echo '</div>';
        }
        ?>
 <?php include 'footer.php'; ?>
</body>

</html>

<?php
if (isset($_POST['cart']) and !isset($_SESSION['id'])) {
    navigate('You have to login in order to add items in cart.', 'login.php');
} else if (isset($_POST['cart']) and isset($_SESSION['id'])) {
    $_SESSION['cart'][] = array(
        'id' => rand(100, 10000),
        'pid' => $_POST['itemId'],
        'name' => $_POST['itemName'],
        'price' => $_POST['itemPrice'],
        'quantity' => $_POST['itemQuantity']
    );
    navigate("", "index.php");
}
?>
