<?php 
    include 'navbar.php';
    $uid = '';
    $edit = false;
    if($_SESSION['role'] !== 'admin')
    {
        header('Location: index.php');
    }
   

    if(isset($_GET['edit']))
    {
        $cid = $_GET['edit'];
        $query = $conn->query("SELECT * FROM `categories` WHERE `cid` = '$cid'");
        $category = mysqli_fetch_assoc($query);
        $edit  = true;
    }
?>

<title>Category Page</title>
</head>
<body>
<form action="" method="POST" class="form-last-2">
      <div class="last-form-2">
        <div class="last-form-2-heading">
          <h2><?php echo $edit == true ? 'Update Category' : 'Add Category'?></h2>
        </div>
        <div class="last-form-2-detail">
          <label for="catagory">Category Name</label>
          <input
            type="text"
            name="catagory"
            id="catagory"
            required
            placeholder="Enter Category Name"
            value = "<?php if(!empty($category['cName'])) echo $category['cName']; ?>"
          />
        </div>
        <div class="add-sweet-btn">
          <button name="add"><?php echo $edit == true ? 'Update' : 'Add Category'?></button>
        </div>
      </div>
    </form>


<?php
    if(isset($_POST['add']))
    {
        $name = $_POST['catagory'];

        if(isset($_GET['edit']))
        {
            $query = $conn->query("UPDATE `categories` SET `cName` = '$name' WHERE `cid` = '$cid'");
            navigate("Category Updated Successfully.", "categories.php");
        }
        else
        {
            $query = $conn->query("INSERT INTO `categories`(`cName`) VALUES('$name')");
            navigate("Category Created Successfully.", "categories.php");
        }
    }
?>

<?php 
    include 'footer.php';
?>