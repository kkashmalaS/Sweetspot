<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Online Sweet Shop</h3>
            <p>Your one-stop destination for authentic Pakistani, Arabian, and Turkish sweets. We deliver happiness in every bite!</p>
            <div class="social-links">
                <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Contact Info</h3>
            <ul class="contact-info">
                <li><i class="fas fa-map-marker-alt"></i> 123 Sweet Street, City, Country</li>
                <li><i class="fas fa-phone"></i> +92 123 4567890</li>
                <li><i class="fas fa-envelope"></i> info@onlinesweetshop.com</li>
                <li><i class="fas fa-clock"></i> Mon-Sat: 9:00 AM - 9:00 PM</li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="email-box">
            <input type="email" placeholder="Enter your email">
        </div>
        <p>&copy; <?php echo date('Y'); ?> Online Sweet Shop. All Rights Reserved.</p>
    </div>
</footer>

<style>
.footer {
    background: linear-gradient(135deg, #b31b1b 0%, #3a4280 100%);
    color: #fff;
    padding: 30px 0;
    margin-top: 50px;
    width: 100%;
    height: 350px;
    position: relative;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    padding: 0 40px;
    height: 100%;
}

.footer-section {
    padding: 15px 0;
}

.footer-section h3 {
    color: #ffd700;
    margin-bottom: 15px;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.footer-section p {
    margin-bottom: 12px;
    line-height: 1.5;
    font-size: 0.9rem;
    color: #fff;
}

.social-links {
    display: flex;
    gap: 12px;
    margin-top: 15px;
}

.social-icon {
    color: #ffd700;
    font-size: 1.3rem;
    transition: all 0.3s ease;
    background: rgba(255,255,255,0.1);
    padding: 8px;
    border-radius: 50%;
}

.social-icon:hover {
    color: #fff;
    background: #ffd700;
    transform: translateY(-3px);
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 8px;
}

.footer-section ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
    font-size: 0.9rem;
}

.footer-section ul li a:hover {
    color: #ffd700;
}

.contact-info li {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    color: #fff;
    font-size: 0.9rem;
}

.contact-info i {
    color: #ffd700;
    font-size: 0.9rem;
}

.subscribe-form,
.subscribe-form input,
.subscribe-form button {
    display: none;
}

.footer-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    padding: 15px 0;
    border-top: 1px solid rgba(255,255,255,0.1);
    background: rgba(0,0,0,0.2);
}

.email-box {
    margin-bottom: 10px;
}

.email-box input {
    padding: 6px 10px;
    border: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.1);
    color: #fff;
    border-radius: 4px;
    font-size: 13px;
    width: 200px;
}

.email-box input::placeholder {
    color: rgba(255,255,255,0.7);
}

@media (max-width: 1024px) {
    .footer-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }
}

@media (max-width: 768px) {
    .footer {
        height: auto;
        padding: 25px 0;
    }
    
    .footer-container {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .footer-section {
        text-align: center;
    }
    
    .social-links {
        justify-content: center;
    }
    
    .email-box input {
        width: 100%;
    }
}
</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>