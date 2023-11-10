<?php 
    include './components/connect.php'; 
    session_start();
    
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else {
        $user_id = '';
    }

    include './components/add_wishlist.php'; 
    include './components/add_cart.php';
?>

<style>
    <?php 
        include 'style.css';
    ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- box icons cdn -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.2/css/transformations.min.css' rel='stylesheet'>
    
    <title>Restautrant Project</title>
</head>
<body>
    <?php include './components/user_header.php'; ?>
    <!-- Hero Slider Start -->
    <div class="slider-container">
        <div class="slider">
            <!-- Slide start -->
            <div class="slideBox active">
                <div class="textBox">
                    <h1>extra spicy pizza</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quas dignissimos ab corrupti nulla quos?</p>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">view menu</a>
                        <a href="menu.php" class="btn">order now</a>
                    </div>
                </div>

                <div class="imgBox">
                    <img src="images/slider-1.png">
                </div>
            </div>
            <!-- Slide End -->

            <!-- Slide start -->
            <div class="slideBox">
                <div class="textBox">
                    <h1>Test some unique</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quas dignissimos ab corrupti nulla quos?</p>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">view menu</a>
                        <a href="menu.php" class="btn">order now</a>
                    </div>
                </div>

                <div class="imgBox">
                    <img src="images/slider-2.png">
                </div>
            </div>
            <!-- Slide End -->

            <!-- Slide start -->
            <div class="slideBox">
                <div class="textBox">
                    <h1>extra spicy pizza</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quas dignissimos ab corrupti nulla quos?</p>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">view menu</a>
                        <a href="menu.php" class="btn">order now</a>
                    </div>
                </div>

                <div class="imgBox">
                    <img src="images/slider-3.png">
                </div>
            </div>
            <!-- Slide End -->

            <!-- Slide start -->
            <div class="slideBox">
                <div class="textBox">
                    <h1>extra spicy pizza</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quas dignissimos ab corrupti nulla quos?</p>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">view menu</a>
                        <a href="menu.php" class="btn">order now</a>
                    </div>
                </div>

                <div class="imgBox">
                    <img src="images/slider-4.png">
                </div>
            </div>
            <!-- Slide End -->

            <!-- Slide start -->
            <div class="slideBox">
                <div class="textBox">
                    <h1>the aroma of bread! Enjoy the smell of sandwiches</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.?</p>
                    <div class="flex-btn">
                        <a href="menu.php" class="btn">view menu</a>
                        <a href="menu.php" class="btn">order now</a>
                    </div>
                </div>

                <div class="imgBox">
                    <img src="images/slider.png" style="height: 550px;">
                </div>
            </div>
            <!-- Slide End -->
        </div>

        <div class="controls">
            <li onclick="nextSlide();"><i class="bx bx-right-arrow-alt"></i></li>
            <li onclick="prevSlide();"><i class="bx bx-left-arrow-alt"></i></li>
        </div>
    </div>
    <!-- Hero Slider End -->

    <!-- Category section -->
    <div class="category">
        <div class="title">
            <h1>top categories</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius commodi repudiandae officiis!
                 Veritatis maiores voluptatum hic earum. Facilis, debitis omnis?</p>
        </div>
        <div class="box-container">

            <a href="menu.php?category='what's hot'">
                <div class="box">
                    <div class="img-box">
                        <img src="./images/food-36.png"/> 
                    </div>
                    <p>what's hot</p>
                </div>
            </a>

            <?php $category2='burgers'; ?>
            <a href="menu.php?category=<?= $category2; ?>">
            <div class="box">
                <div class="img-box">
                    <img src="./images/4.png"/> 
                </div>
                <p>Burger</p>
            </div>
            </a>

            <?php $category3='chiken and salads'; ?>
            <a href="menu.php?category=<?= $category3; ?>">
            <div class="box">
                <div class="img-box">
                    <img src="./images/food-35.png"/> 
                </div>
                <p>chicken and salads</p>
            </div>
            </a>

            <?php $category4='tacos, fries and sides'; ?>
            <a href="menu.php?category=<?= $category4; ?>">
            <div class="box">
                <div class="img-box">
                    <img src="./images/food-37.png"/> 
                </div>
                <p>tacos, fries and sides</p>
            </div>
            </a>

            <?php $category5='breakfast'; ?>
            <a href="menu.php?category=<?= $category5; ?>">
            <div class="box">
                <div class="img-box">
                    <img src="./images/food-27.png"/> 
                </div>
                <p>breakfast</p>
            </div>
            </a>

            <?php $category6='family dinner'; ?>
            <a href="menu.php?category=<?= $category6; ?>">
            <div class="box">
                <div class="img-box">
                    <img src="./images/food-36.png"/> 
                </div>
                <p>family dinner</p>
            </div>
            </a>

            <?php $category7='shakes and desserts'; ?>
            <a href="menu.php?category=<?= $category7; ?>">
            <div class="box">
                <div class="img-box">
                    <img src="./images/food-42.png"/> 
                </div>
                <p>shakes and desserts</p>
            </div>
            </a>

        </div>
    </div>

    <div class="container">
        <div class="box-container">
            <div class="box">
                <span>Healty Food</span>
                <h1>Save Up to 50% off</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                 Ea quod ex ut impedit obcaecati, officia soluta reprehenderit nam exercitationem asperiores.
                 Ea quod ex ut impedit obcaecati, officia soluta reprehenderit nam exercitationem asperiores.
                 Ea quod ex ut impedit obcaecati, officia soluta reprehenderit nam exercitationem asperiores.</p>

                 <div class="flex-btn">
                    <a href="menu.php" class="btn">discover more</a>
                 </div>
            </div>
            <div class="box">
                <img src="images/inner.png" alt="">
            </div>
        </div>
    </div>
    <!-- Products section -->
    <section class="products">
        <div class="title">
            <h1>top categories</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius commodi repudiandae officiis!
                 Veritatis maiores voluptatum hic earum. Facilis, debitis omnis?</p>
        </div>
        <?php include 'components/shop.php'; ?>
    </section>
    <!-- Products end -->

    <div class="container">
        <div class="box-container">
            <div class="box">
                <img src="images/client.png"/>
            </div>
            <div class="box">
                <span>Healty Food</span>
                <h1>Save Up to 50% off</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                 Ea quod ex ut impedit obcaecati, officia soluta reprehenderit nam exercitationem asperiores.
                 Ea quod ex ut impedit obcaecati, officia soluta reprehenderit nam exercitationem asperiores.
                 Ea quod ex ut impedit obcaecati, officia soluta reprehenderit nam exercitationem asperiores.</p>

                 <div class="flex-btn">
                    <a href="menu.php" class="btn">visit our menu</a>
                 </div>
            </div>
        </div>
    </div>

    <div class="client">
        <div class="box-container">
            <div class="box">
                <img src="images/client.webp">
            </div>
            <div class="box">
                <img src="images/client0.webp">
            </div>
            <div class="box">
                <img src="images/client1.webp">
            </div>
            <div class="box">
                <img src="images/client2.webp">
            </div> 
        </div>
    </div>

    <?php include './components/footer.php'; ?>
     <?php include './components/dark.php'; ?>

    <!-- sweetalert cdn 2.1.2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js link -->
    <script type="text/javascript" src="script.js"></script>

    <?php include './components/alert.php'; ?>
</body>
</html>