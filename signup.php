<?php 
    include 'header.php';
    if(isset($_SESSION['id']))
    {
        header('Location: home.php');
    }
?>

<title>Signup Page</title>
</head>
<body>
<header>
    <div class="logo">
    <h1>Online Sweets Spot</h1>
    </div>
      <nav>
        <ul>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="index.php">Shop</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>   
      </nav>
</header>

<form class="form-sign-up" action="" method="POST">
      <div class="heading">
        <h1>Sign up Form</h1>
      </div>
      <div class="content">
        <label for="name" class="email">Name</label><br />
        <input
          type="name"
          name="name"
          id="name"
          required
          placeholder="Enter Name"
        /><br />
        <label for="email" class="password">Email</label><br />
        <input
          type="email"
          name="email"
          id="email"
          required
          placeholder="Enter Adress"
        />
        <br />
        <label for="password" class="email">Password</label><br />
        <input
          type="password"
          name="password"
          id="password"
          required
          placeholder="Enter password"
        /><br />
    
        <div class="btn">
          <button name = "signup">Sign Up</button>
          <p>or</p>
          <a href="login.php">Login</a>
        </div>
      </div>
</form>

<?php
    if(isset($_POST['signup']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $conn->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES('$name', '$email', '$password')");
        if($query)
        {
            navigate("Account Created Successfully.", "login.php");
        }
    }

?>

<?php 
    include 'footer.php';
?>