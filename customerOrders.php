<?php 
    include 'navbar.php';
    $customer_id = $_SESSION['id'];
    if($_SESSION['id'] !== $customer_id)
    {
        header('Location: index.php');
    }
    $orders = $conn->query("SELECT * FROM `orders` WHERE `uid` = '$customer_id'");
?>

<title>Orders Summary</title>
</head>
<body>

<form class="form-6" action="" method="POST">
      <div class="form-6-heading">
        <h2>Orders Summary</h2>
      </div>

      <div class="table">
        <div class="table-row-1" id="table-setting">
          <h2>#</h2>
          <h2>Order Id</h2>
          <h2>Customer Name</h2>
          <h2>Address</h2>
          <h2>Phone</h2>
          <h2>Amount</h2>
          <h2>Status</h2>
          <h2>Action</h2>
          <h2>Payment</h2>
        </div>
        <?php 
            $sr = 1;
            foreach($orders as $order){
            ?>
                <div class="table-row-2" id="table-setting-2">
                    <p><?php echo $sr++; ?></p>
                    <p><?php echo $order['oid']; ?></p>
                    <p><?php echo $order['name']; ?></p>
                    <p><?php echo $order['address']; ?></p>
                    <p><?php echo $order['phone']; ?></p>
                    <p><?php echo $order['totalAmount']; ?></p>
                    <p><?php echo $order['status']; ?></p>
                    
                    <div style = "display: flex;" class="form6-btn" id="button-sumers">
                        <a 
                            <?php echo $order['status'] == 'pending' ? '' : 'style="pointer-events: none; background-color: white; color: grey;"'; ?>
                            href="?confirm=<?php echo $order['oid']; ?>">
                            <?php echo $order['status'] == 'pending' ? 'Confirm': 'Confirmed'?>
                        </a>
                        <a 
                            <?php echo $order['status'] == 'pending' ? '' : 'style="pointer-events: none; background-color: white; color: grey;"'; ?>
                            href="?del=<?php echo $order['oid']; ?>">
                            Del
                        </a>
                    </div>
                    <div id="button-sumers" class="form6-btn">
                        <a 
                            <?php echo $order['status'] == 'confirmed' ? '' : 'style="pointer-events: none; background-color: white; color: grey;"'; ?>
                            href="?pay=<?php echo $order['oid']; ?>&amount=<?php echo $order['totalAmount']; ?>">
                            <?php echo $order['status'] == 'completed' ? 'Bill Paid': 'Pay Bill'?>
                        </a>
                    </div>
            </div>
        <?php
            }
        ?>
    </table>
</div>
<?php 
    if(isset($_GET['pay']))
    {
        $oid = $_GET['pay'];
        $bill_amount = $_GET['amount'];
        date_default_timezone_set("Asia/Karachi");
        $bill_date = date("y-m-d");
        $conn->query("UPDATE `orders` SET `status` = 'completed', `amountRecieved` = '$bill_amount', `paymentDate` = '$bill_date' WHERE `oid` = '$oid'");
        navigate("Bill paid Successfully.", "customerOrders.php");
    }
    if(isset($_GET['confirm']))
    {
        $oid = $_GET['confirm'];
        $conn->query("UPDATE `orders` SET `status` = 'confirmed' WHERE `oid` = '$oid'");
        navigate("Order Confirmed Successfully.", "customerOrders.php");
    }
    if(isset($_GET['del']))
    {
        $oid = $_GET['del'];
        $query = $conn->query("DELETE FROM `orders` WHERE `oid` = '$oid'");
        navigate("Order Deleted Successfully.", "customerOrders.php");
    }
?>        
      </div>
    </form>          
<?php 
    include 'footer.php';
?>