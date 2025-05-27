<?php 
    include 'header.php';
    if(isset($_SESSION['id']))
    {
        header('Location: home.php');
    }
?>

<title>Login Page</title>
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
          <li><a href="signup.php">Sign up</a></li>
        </ul>
      </nav>
    </header>
<form action="" method="POST">
      <div class="heading">
        <h1>Login Form</h1>
      </div>
      <div class="content">
        <label for="email" class="email">Email</label><br />
        <input
          type="email"
          name="email"
          id="email"
          required
          placeholder="Enter mail"
        /><br />
        <label for="password" class="password">Password</label><br />
        <input
          type="password"
          name="password"
          id="password"
          required
          placeholder="Enter Password"
        />
        <div class="btn-21">
          <button name = "login">Login</button>
          <p>or</p>
          <a href="signup.php">Sign Up</a>
        </div>
      </div>
    </form>

<?php 
    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $conn->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
        if(mysqli_num_rows($query) > 0)
        {
            $user = mysqli_fetch_assoc($query);

            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name'];

            $page = '';
            $role = $_SESSION['role'];
            if($role == 'admin')
            {
                $page = 'home.php';
            }
            else if($role == 'customer')
            {
                $page = 'index.php';

            }

            header('Location:' . $page);
        }
        else
        {
            navigate("Credentials miss match");
        }
    }
?>
<?php 
    include 'footer.php';
?>