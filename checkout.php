<?php
include 'navbar.php';
$totalBill = '';
if (!isset($_SESSION['cart'])) navigate("", "index.php");
if (count($_SESSION['cart']) === 0) navigate("", "index.php");

?>

<title>Checkout Page</title>
</head>

<body>
  <form class="form-5" action="" method="POST">
    <div class="billing">
      <div class="left">
        <div class="left-flex">


        </div>

        <label for="name" class="password1">Name</label>
        <input type="text" name="name" id="name" required placeholder="Enter Name" />


        <label for="tell1" class="password1">Phone</label>
        <input type="tell1" name="phone" id="tell1" required placeholder="Enter Phone" />

        <label for="adress1" class="email1">Street/Adress</label><br />
        <input type="text" name="address" id="adress1" required placeholder="Enter Adress" /><br />

        <label for="adress1" class="email1">Payment Method</label><br />
        <select name="" id="adress1">
          <option value="1" selected disabled>Only Cash on Delivery Available</option>
        </select><br />

      </div>
      <div class="right">
        <div class="table-strat">
          <div class="table-strat-heading">
            <h2>Your Order</h2>
          </div>
          <div class="order1">
            <div class="order">
              <p>Sr</p>
              <p>Product Name</p>
              <p>price</p>
              <p>quantity</p>
              <p>Sub Total</p>
            </div>

            <?php
            $sr = 1;
            $total = 0;

            foreach ($_SESSION['cart'] as $q => $item) {
              $subtotal = 0;
              $subtotal = $item['price'] * $item['quantity'];
            ?>
              <div class="item-name">
                <p><?php echo $sr; ?></p>
                <p><?php echo $item['name']; ?></p>
                <p><?php echo $item['price']; ?></p>
                <p><?php echo $item['quantity']; ?></p>
                <p><?php echo $subtotal;
                    $total += $subtotal; ?></p>
              </div>
            <?php
            }
            ?>
            <div class="sub-total-1">
              <p>Total</p>
              <p><?php echo $total; ?></p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="billing-btn">
      <button name="checkout">Place Order</a>
    </div>
  </form>
  <?php
  if (isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $uid = $_SESSION['id'];
    $conn->query("INSERT INTO `orders`(`uid`, `name`, `address`, `phone`, `totalAmount`) VALUES('$uid', '$name','$address', '$phone', '$total')");

    $OrderId = $conn->insert_id;

    foreach ($_SESSION['cart'] as $q => $item) {
      $pid = $item['pid'];
      $pname = $item['name'];
      $quantity = $item['quantity'];
      $price = $item['price'];
      $bill_t = $quantity * $price;
      $conn->query("INSERT INTO `cart`(`oid`, `pid`, `uid`, `name`, `quantity`, `priceUnit`, `totalBill`) VALUES('$OrderId', '$pid', '$uid', '$pname', '$quantity', '$price', '$bill_t')");
    }
    
    $query = $conn->query("SELECT * FROM `users` WHERE `id` = '$uid'");
    $user = mysqli_fetch_assoc($query);
    
    $to = $user['email'];
    $subject = "Order Booked Successfully";

    $message_p1 = '
    <html>
    <head>
    <title>Email</title>
    </head>
    <body>
    <h1>Thanks for your order.</h1>
    <h3>Order Detail</h3>
    <center>
    <table>
    <tr>
      <th>Sr</th>
      <th>Product Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
    </tr>';
    $sr = 1;
    $total = 0;
    $message_p2='';
    foreach ($_SESSION['cart'] as $q => $item) {
      $pid = $item['pid'];
      $pname = $item['name'];
      $quantity = $item['quantity'];
      $price = $item['price'];
      $sub_total = $quantity * $price;
      
      $message_p2 .=
      '<tr>
        <td>' . $sr . '</td>
        <td>' . $pname . '</td>
        <td>' . $price . '</td>
        <td>' . $quantity . '</td>
        <td>' . $sub_total . '</td>
      </tr>';
      $total += $sub_total;
      $sr++;
    }
    
    $message_p3 = 
      '<h3>Total: ' . $total . '</h3></br></br></center>

      <h2>Order Delivery Info</h2>
      <h5>Name: '. $name.'</h5>
      <h5>Phone: '. $phone.'</h5>
      <h5>Address: '. $address.'</h5>
      <h5>Payment Method: Cash On Delivery</h5>
      </br></br>
      <h1>Thanks for shoping from Online Sweets Spot</h1>
      
    </table>
    </body>
    </html>';

    
    $message = $message_p1 . $message_p2 . $message_p3;
    $message = wordwrap($message,70);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    if(mail($to,$subject,$message,$headers))
    {
      unset($_SESSION['cart']);
      navigate("Order placed successfully and an email is sent to your email address.", "customerOrders.php");
    }
    else
    {
      navigate("Something went wrong, please try again.", "checkout.php");
    }
    

  }
?>

  <?php
  include 'footer.php';
  ?>