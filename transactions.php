<?php 
    include 'navbar.php';
    if($_SESSION['role'] !== 'admin')
    {
        header('Location: index.php');
    }
    $id = $_SESSION['id'];
    $orders = $conn->query("SELECT * FROM `orders`");
    
    $completed_orders = $conn->query("SELECT SUM(`amountRecieved`) AS t_amount, COUNT(`oid`) AS t_order FROM `orders` WHERE `status` = 'completed'");
    $order_detail = mysqli_fetch_assoc($completed_orders);
?>

<title>Orders Summary</title>
</head>
<body>

<form class="form-6" action="" method="POST">
      <div class="form-6-heading">
        <h2>Transaction History</h2>
      </div>

      <div class="table">
        <div class="table-row-1" id="table-setting">
          <h2>#</h2>
          <h2>Order Id</h2>
          <h2>Amount</h2>
          <h2>Order Status</h2>
          <h2>Payment Status</h2>
          <h2>Payment Date</h2>
        </div>
        <?php
            $sr = 1;
            $totalAmount = $order_detail['t_amount'];
            $totalOrders = $order_detail['t_order'];
            foreach($orders as $order){
            ?>
                <div class="table-row-2" id="table-setting-2">
                    <p><?php echo $sr++; ?></p>
                    <p><?php echo $order['oid']; ?></p>
                    <p><?php echo $order['totalAmount']; ?></p>
                    <p><?php echo $order['status']; ?></p>
                    <p><?php echo $order['amountRecieved'] !== NULL ? 'Paid' : 'Not Paid'; ?></p>
                    <p><?php echo $order['paymentDate'] !== NULL ? $order['paymentDate'] : 'Waiting'; ?></p>
            </div>
            <?php
                }
                ?>
                <div class="table-row-2" id="table-setting-2">
                    <h2>Completed Orders: </h2>
                    <h2><?php echo $totalOrders; ?></h2>
                    <h2>Total Amount Recieved: </h2>
                    <h2><?php echo $totalAmount; ?></h2>
                </div>
    </table>

</div>

      </div>
    </form>
            
                
<?php 
    include 'footer.php';
?>