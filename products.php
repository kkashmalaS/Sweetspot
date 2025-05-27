<?php 
    include 'navbar.php';
    
    if($_SESSION['role'] !== 'admin')
    {
        header('Location: index.php');
    }
    $products = $conn->query("SELECT * FROM `products` INNER JOIN `categories` ON products.cid = categories.cid");
?>

<title>Product Page</title>
</head>
<body>
 
    <form class="form-6" action="" method="">
      <div class="form-6-heading">
        <h2>Products Summary</h2>
      </div>

      <div class="table">
        <div class="table-row-1">
          <h2>Sr#</h2>
          <h2>Product Name</h2>
          <h2>Category</h2>
          <h2>Price</h2>
          <h2>Quantity</h2>
          <h2>Action</h2>
        </div>
        <tbody>
        
        <?php 
            $sr = 1;
            foreach($products as $product)
            {
            ?>
                <div class="table-row-2">
                    <p><?php echo $sr; ?></p>
                    <p><?php echo $product['pName']; ?></p>
                    <p><?php echo $product['cName']; ?></p>
                    <p><?php echo $product['pPrice']; ?></p>
                    <p><?php echo $product['pQuantity']; ?></p>
                <div class="form6-btn">
                    <a href="addProduct.php?edit=<?php echo $product['pid']; ?>">Edit</a>
                    <a href="?del=<?php echo $product['pid']; ?>">Del</a>
                </div>
                </div>
                <?php
                $sr++;
            }
            ?>
            </form>
    

</div>
<?php 
    if(isset($_GET['del']))
    {
        $pid = $_GET['del'];
        $query = $conn->query("DELETE FROM `products` WHERE `pid` = '$pid'");
        navigate("Product Deleted Successfully.", "products.php");
    }
?>
<?php 
    include 'footer.php';
?>