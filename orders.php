<?php 
    include 'navbar.php';
    if($_SESSION['role'] !== 'admin')
    {
        header('Location: index.php');
    }
    $id = $_SESSION['id'];
    $orders = $conn->query("SELECT * FROM `orders`");
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
        </div>
        <?php 
            $sr = 1;
            if(isset($_GET['edit']))
            {
                $oid = $_GET['edit'];
                foreach($orders as $order)
                {
                    if($oid == $order['oid'])
                    {
                    ?>
                        <div class="table-row-2">
                        <p><?php echo $sr++; ?></p>
                        <p><?php echo $order['uid']; ?></p>
                        <input name = "oid" hidden type="text" value = "<?php echo $order['oid']; ?>">
                        <p><input name = "name" type="text" value = "<?php echo $order['name']; ?>"></p>
                        <p><input name = "address" type="text" value = "<?php echo $order['address']; ?>"></p>
                        <p><input name = "phone" type="text" value = "<?php echo $order['phone']; ?>"></p>
                        <p><input name = "totalAmount" type="text" value = "<?php echo $order['totalAmount']; ?>"></p>
                        
                            <p><select name="status" id="">
                                <option value="<?php echo $order['status']; ?>"><?php echo $order['status']; ?></option>
                                <option value="completed">Complete Order</option>
                                <option value="cancelled">Cancel Order</option>
                            </select></p>

                        <p><button name = "update">Save</button></p>
                        
                        </div>
                <?php
                    }
                }
            }
            else
                {
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
                            <div class="form6-btn" id="button-sumers">
                                <a href="?edit=<?php echo $order['oid']; ?>">Edit</a>
                                <a href="?del=<?php echo $order['oid']; ?>">Del</a>
                            </div>
                    </div>
                <?php
                    }
                }
                ?>
    </table>

</div>

<?php 
    if(isset($_POST['update']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $totalAmount = $_POST['totalAmount'];
        $status = $_POST['status'];
        $oid = $_POST['oid'];

        $conn->query("UPDATE `orders` SET `name` = '$name', `address` = '$address', `phone` = '$phone', `totalAmount` = '$totalAmount', `status` = '$status' WHERE `oid` = '$oid'");
        navigate("Order Updated Successfully.", "orders.php");
    }
    if(isset($_GET['del']))
    {
        $oid = $_GET['del'];
        $query = $conn->query("DELETE FROM `orders` WHERE `oid` = '$oid'");
        navigate("Order Deleted Successfully.", "orders.php");
    }
?>
        
      </div>
    </form>
            
                
<?php 
    include 'footer.php';
?>