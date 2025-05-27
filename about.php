<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Online Sweet Shop</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .about-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .about-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .about-header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .about-header p {
            color: #666;
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }

        .about-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .about-text {
            padding: 20px;
        }

        .about-text h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .about-text p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .about-content {
                grid-template-columns: 1fr;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="about-container">
        <div class="about-header">
            <h1>About Our Sweet Shop</h1>
            <p>Welcome to our world of delicious sweets, where tradition meets innovation in every bite.</p>
        </div>

        <div class="about-content">
            <img src="assets/images/sweet.jpg" alt="Our Sweet Shop" class="about-image">
            <div class="about-text">
                <h2>Our Story</h2>
                <p>Founded with a passion for authentic sweets, our shop brings together the finest traditions of Pakistani, Turkish, and Arabian desserts. We believe in preserving traditional recipes while adding our unique touch to create unforgettable experiences.</p>
                <p>Our journey began with a simple mission: to share the joy of authentic sweets with everyone. Today, we're proud to serve customers who appreciate quality, tradition, and innovation in every bite.</p>
                <p>We source only the finest ingredients and maintain strict quality standards to ensure that every sweet we make is a masterpiece of flavor and texture.</p>
            </div>
        </div>

        <div class="features">
            <div class="feature-card">
                <i class="fas fa-heart feature-icon"></i>
                <h3>Quality Ingredients</h3>
                <p>We use only the finest, freshest ingredients to create our sweets, ensuring premium quality in every bite.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-award feature-icon"></i>
                <h3>Traditional Recipes</h3>
                <p>Our sweets are made using authentic recipes passed down through generations, preserving the true flavors.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-truck feature-icon"></i>
                <h3>Fast Delivery</h3>
                <p>We ensure quick and safe delivery of our sweets, so you can enjoy them fresh and delicious.</p>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html> 