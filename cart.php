<?php 
    include 'navbar.php';
 
    if(!isset($_SESSION['cart'])) navigate("Cart is empty.", "index.php");
    if(count($_SESSION['cart']) === 0) navigate("", "index.php");
?>

<title>Cart Page</title>
</head>
<body>

<form class="form-4" action="" method="">
      <div class="table">
        <div class="table-row-1">
          <h2>Sr</h2>
          <h2>Product Name</h2>
          <h2>Price</h2>
          <h2>Quantity</h2>
          <h2>subtotal</h2>
          <h2>Action</h2>
        </div>
        
        <?php 
            $sr = 1;
            $total = 0;
            $items = $_SESSION['cart'];
            foreach($items as $q => $item)
            { 
                $subtotal = 0;
                $subtotal = ($item['price'] * $item['quantity']);
            ?>
                <div class="table-row-2">
                    <p><?php echo $sr; ?></p>
                    <p><?php echo $item['name']; ?></p>
                    <p><?php echo $item['price']; ?></p>
                    <p><?php echo $item['quantity']; ?></p>
                    <p><?php echo $subtotal; $total += $subtotal; ?></p>
                    <div class="form4-btn">
                        <a href="?del=<?php echo $item['id']; ?>">Del</a>
                    </div>
                </div>
            <?php
            $sr++;
            }
        ?>
        
      </div>

      <div class="form-cart">
        <div class="cart-sec">
          <h2>Cart Totals</h2>
        </div>
        <div class="detail-cart">
          <div class="total">
            <p>Total Bill</p>
            <p><?php echo $total; ?></p>
          </div>
          
          <div class="total-btn">
            <a href="checkout.php">Procced</a>
          </div>
        </div>
      </div>
    </form>
        
<?php 
    if(isset($_GET['del']))
    {
        $pid = $_GET['del'];
        foreach($_SESSION['cart'] as $q => $item)
        {
            if($pid == $item['id'])
            {
                unset($_SESSION['cart'][$q]);
            }
        }
        navigate("", "cart.php");
    }
?>
<?php 
    include 'footer.php';
?>
