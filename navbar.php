<?php
    include 'header.php';
    if(!isset($_SESSION['id']))
    {
        header('Location: login.php');
        
    }
    $role = '';
    $role = $_SESSION['role'];
?>
<header>
      <div class="logo">
        <h1>Online Sweets Spot</h1>
      </div>
      <nav>
      
        <ul>
        <?php

          switch($role)
          {
              case 'admin':
                  ?>
                  <li><a href="index.php">Shop</a></li>
                  <li><a href="categories.php">Categories</a></li>
                  <li><a href="orders.php">Manage Orders</a></li>
                  <li><a href="transactions.php">Transaction History</a></li>
                  <div class="dropdown">
                    <button class="dropbtn">Menu</button>
                    <div class="dropdown-content">
                      <a href="addCategory.php"> Add Category</a>
                      <a href="addProduct.php">Add Product</a>
                      <a href="categories.php">Manage Category</a>
                      <a href="products.php">Manage Product</a>
                      <a href="logout.php"> Logout</a>
                    </div>
                  </div>
                  <?php
                  // echo '<li><a href="home.php">Admin Panel</a></li>';
                  break;
              case 'customer':
                  ?>
                  <li><a href="index.php">Shop</a></li>
                  <li><a href="categories.php">Categories</a></li>
                  <li><a href="cart.php">Cart <span class = "cartItem"><?php if(!empty($_SESSION["cart"])) echo  count($_SESSION["cart"]); else echo "0"; ?></span></a></li>
                  <?php
                  echo '<li><a href="logout.php">Logout</a></li>';
                  break;
              default:
                  echo '<li><a href="login.php">Login</a></li>
                  <li><a href="signup.php">Sign up</a></li>';
                  break;
          }
        ?>
          <!-- <li><a href="home.php"></a></li> -->
          <!-- <li><a href="./loginpage.html">Login</a></li> -->
          
        </ul>
      </nav>
</header>