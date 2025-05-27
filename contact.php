<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Online Sweet Shop</title>
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

        .contact-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .contact-header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .contact-header p {
            color: #666;
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .contact-info {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .phone-number {
            background: #e74c3c;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .phone-number:hover {
            transform: scale(1.05);
        }

        .phone-number i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .phone-number h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .phone-number p {
            font-size: 1.2rem;
            margin-bottom: 0;
        }

        .contact-details {
            margin-top: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .contact-item i {
            color: #e74c3c;
            font-size: 1.5rem;
            margin-right: 15px;
            width: 30px;
        }

        .contact-item h3 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .contact-item p {
            color: #666;
        }

        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #c0392b;
        }

        @media (max-width: 768px) {
            .contact-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>Have questions or need assistance? We're here to help!</p>
        </div>

        <div class="contact-content">
            <div class="contact-info">
                <div class="phone-number">
                    <i class="fas fa-phone-alt"></i>
                    <h2>Call Us</h2>
                    <p>+92 123 4567890</p>
                </div>

                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Address</h3>
                            <p>123 Sweet Street, City, Country</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p>info@onlinesweetshop.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Working Hours</h3>
                            <p>Mon-Sat: 9:00 AM - 9:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html> 