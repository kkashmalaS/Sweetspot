<?php
include 'navbar.php';
$uid = '';
$edit = false;
if ($_SESSION['role'] !== 'admin') {
  header('Location: index.php');
}

if (isset($_GET['edit'])) {
  $pid = $_GET['edit'];
  $query = $conn->query("SELECT * FROM `products` WHERE `pid` = '$pid'");
  $product = mysqli_fetch_assoc($query);
  $edit  = true;
}
?>

<title>Product Page</title>
</head>

<body>

  <form class="form-last1" action="" method="POST" enctype="multipart/form-data">
    <div class="add-sweet-form">
      <div class="add-sweet-heading">
        <h2 style="color: black; padding: 15px;"><?php echo $edit == true ? 'Update Product' : 'Add Product' ?></h2>
      </div>
      <div class="add-sweet-detail">
        <div class="sweet-name1">
          <!-- <div class="sweet-flex"> -->
            <div class="flex-div">
              <label for="addsweet">Sweet Name</label>
              <input type="text" name="name" id="addsweet" required placeholder="Add Sweet Name" value="<?php if (!empty($product['pName'])) echo $product['pName']; ?>" />
              <label for="category">Select Category</label>
              <select required name="category" name="category">
                <option value="" selected hidden>Select Category</option>

                <?php
                $cats = $conn->query("SELECT * FROM `categories`");
                foreach ($cats as $cat) { ?>
                  <option value="<?php echo $cat['cid'] ?>"><?php echo $cat['cName'] ?></option>
                <?php
                }
                ?>

              </select>
            </div>


            <div class="price-flex">
              <label for="addsweet">Price</label>
              <input type="text" name="price" id="addsweet" required placeholder="Add Sweet Price" value="<?php if (!empty($product['pPrice'])) echo $product['pPrice']; ?>" />
              
              <div class="flexdiv2">
              <label for="quantity">Quantity</label>
              <input required type="number" name="quantity" id="quantity" required placeholder="Quantity" value="<?php if (!empty($product['pQuantity'])) echo $product['pQuantity']; ?>" />
              </div>
              </div>

            <div class="chose-img">
              <label for="chooseimage">Choose Image</label>
              <input type="file" name="image" id="chooseimage" required>
            </div>
          </div>
        </div>
        <div class="add-sweet-btn">
          <button name="add"><?php echo $edit == true ? 'Update' : 'Add Product' ?> </button>
        </div>
      </div>
  </form>

  <?php
  if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $cid = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $file = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    $location = './assets/images/' . $image;

    if (isset($_GET['edit'])) {
      $query = $conn->query("UPDATE `products` SET `cid` = '$cid', `pName` = '$name', `pPrice` = '$price',  `pQuantity` = '$quantity', `pImage` = '$image' WHERE `pid` = '$pid'");
      move_uploaded_file($file, $location);
      navigate("Product Updated Successfully.", "products.php");
    } else {
      $query = $conn->query("INSERT INTO `products`(`cid`, `pName`, `pPrice`, `pQuantity`, `pImage`) VALUES('$cid', '$name', '$price', '$quantity', '$image')");
      move_uploaded_file($file, $location);
      navigate("Product added Successfully.", "products.php");
    }
  }
  ?>

  <?php
  include 'footer.php';
  ?>