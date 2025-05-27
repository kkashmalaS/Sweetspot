<?php
include 'navbar.php';
if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
}
$categories = $conn->query("SELECT * FROM `categories` WHERE cid IN (1,2,3)");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Online Sweet Shop</title>
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

        .categories-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .categories-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .categories-header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .category-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .category-info {
            padding: 20px;
            text-align: center;
        }

        .category-title {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .category-description {
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .categories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="categories-container">
        <div class="categories-header">
            <h1>Our Sweet Categories</h1>
            <p>Explore our wide range of authentic sweets from different regions</p>
        </div>

        <div class="categories-grid">
            <?php
            $categoryImages = [
                1 => 'assets/images/pakistani_sweets.jpg',
                2 => 'assets/images/arabian_sweets.jpg',
                3 => 'assets/images/turkish_sweets.jpg'
            ];
            
            $categoryLinks = [
                1 => 'pakistani_sweets.php',
                2 => 'arabian_sweets.php',
                3 => 'turkish_sweets.php'
            ];
            
            foreach ($categories as $category) {
                $image = $categoryImages[$category['cid']] ?? 'assets/images/default_sweet.jpg';
                $link = $categoryLinks[$category['cid']] ?? '#';
            ?>
                <a href="<?php echo $link; ?>" class="category-card">
                    <img src="<?php echo $image; ?>" alt="<?php echo $category['cName']; ?>" class="category-image">
                    <div class="category-info">
                        <h2 class="category-title"><?php echo $category['cName']; ?></h2>
                        <p class="category-description">
                            <?php
                            switch($category['cid']) {
                                case 1:
                                    echo "Experience the rich flavors of traditional Pakistani sweets and desserts.";
                                    break;
                                case 2:
                                    echo "Discover the exotic flavors of Arabian desserts and sweets.";
                                    break;
                                case 3:
                                    echo "Indulge in authentic Turkish delights and baklava.";
                                    break;
                            }
                            ?>
                        </p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>