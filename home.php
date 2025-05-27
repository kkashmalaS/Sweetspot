<?php 
    include 'navbar.php';
    if($_SESSION['role'] !== 'admin')
    {
        header('Location: index.php');
    }
?>


<title>Home</title>
</head>
<body>
    <div class="admin-panel">
        <h1>Admin Panel</h1>
    </div>
    
<?php 
    include 'footer.php';
?>