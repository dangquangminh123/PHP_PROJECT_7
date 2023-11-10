<?php 
    include './components/connect.php'; 
    session_start();
    
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else {
        $user_id = '';
    }

    $get_id = $_GET['get_id'];
    
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
    
    <title>Restautrant About Pages</title>
</head>
<body>
    <?php include './components/user_header.php'; ?>
    
    <div class="banner">
        <div class="detail">
            <h1>About Us</h1>
            <a href="home.php">Home</a><span><i class="bx bx-right-arrow-alt"></i>About Us</span>
        </div>
    </div>

    <div class="about-us">
        <div class="box-container">
            <div class="box">
                <span>Our short Story</span>
                <h1>Dedicated To Delight</h1>
                <p>We Bring To You The UnForgetable Moment With Our Delicious Dishes. All Of Our PRoducts
                    Are Made From
                        Scratch Using Family
                        Recipes With Only The Highest Quality Ingredients. We Sell Fresh Food Daily To Ensure
                        Only The Best
                        Products Are Sold To
                        Our Customers.</p>
                    <span>Our Services</span>
                    <div class="service">
                        <div class="img-box">
                            <div class="img">
                                <img src="images/icon-13.png"/>
                            </div>
                            <p>Reservation</p>
                        </div>

                        <div class="img-box">
                            <div class="img">
                                <img src="images/icon-14.png"/>
                            </div>
                            <p>Private Event</p>
                        </div>

                        <div class="img-box">
                            <div class="img">
                                <img src="images/icon-15.png"/>
                            </div>
                            <p>Online Order</p>
                        </div>
                    </div>
            </div>
            <div class="box">
                <img src="images/about.png"/>
            </div>
        </div>
    </div>


    <div class="process">
        <div class="box-container">
            <div class="box">
                <img src="images/process.png"/>
            </div>
            <div class="box">
                <span>Experience The Best Food</span>
                <h1>How To Order ?</h1>
                <p>Follow The Step</p>
                <div class="steps">
                    <div class="img-box">
                        <div style="display: flex; align-items: center;">
                            <div class="img">
                                <img src="images/icon-16.png"/>
                            </div>
                            <div>
                                <img src="images/icon-19.png"/>
                            </div>
                        </div>
                            <span>1</span>
                            <p>Make Your Order</p>
                    </div>

                    <div class="img-box">
                        <div style="display: flex; align-items: center;">
                            <div class="img">
                                <img src="images/icon-17.png"/>
                            </div>
                            <div>
                                <img src="images/icon-19.png"/>
                            </div>
                        </div>
                            <span>2</span>
                            <p>Food Is On The Way</p>
                    </div>

                    <div class="img-box">
                        <div style="display: flex; align-items: center;">
                            <div class="img">
                                <img src="images/icon-18.png"/>
                            </div>
                        </div>
                            <span>3</span>
                            <p>Eat & Enjoy !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team">
        <div class="title">
            <span>We Make Special</span>
            <h1>Meet Our Chef</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus
                 similique repellendus perspiciatis ea perferendis? Impedit, est quis. Itaque,
                  aliquid corrupti.</p>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="img-box">
                    <img src="images/team-1.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box">
                    <img src="images/team-2.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box">
                    <img src="images/team-3.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box">
                    <img src="images/team-4.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box">
                    <img src="images/team-5.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box">
                    <img src="images/team-6.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box">
                    <img src="images/team-7.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box">
                    <img src="images/team-8.png"/>
                </div>
                <div class="detail">
                    <h1>Allen Solly</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="reviews">
        <div class="title">
            <h1>The Best Food In Town</h1>
        </div>
        <div class="box-container">
            <div class="img-box">
                <img src="images/client.png"/>
            </div>
            <div class="reviews-container">
                <?php 
                    $select_reviews = $conn->prepare("SELECT * FROM `reviews` WHERE user_id = ? LIMIT 3");
                    // $select_reviews->execute([$get_id]);
                    $select_reviews->execute([$user_id]);
                    
                    if($select_reviews->rowCount() > 0) {
                        while($fetch_reviews = $select_reviews->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="box" <?php if($fetch_reviews['user_id']==$user_id) {echo 'style="order:-1"';} ?>>
                        <?php 
                            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id=?");
                            $select_user->execute([$fetch_reviews['user_id']]);
                            while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="user">
                                <?php if($fetch_user['profile'] != ''){ ?>
                                    <img src="uploaded_img/<?= $fetch_user['profile']; ?>">
                                <?php } else { ?>
                                    <h3><?= substr($fetch_user['name'], 0,1); ?></h3>
                                <?php } ?>
                                <div>
                                    <p><?= $fetch_user['name']; ?></p>
                                    <span><?= $fetch_reviews['date']; ?></span>
                                </div>
                            </div>
                        <?php } ?>
                            <div class="ratings">
                                <?php if($fetch_reviews['rating'] == 1){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 2){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 3){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 4){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 5){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                            </div>
                        <h3 class="title"><?= $fetch_reviews['title']; ?></h3>
                        <?php if($fetch_reviews['description'] != '') { ?> 
                            <p class="description"><?= $fetch_reviews['description']; ?></p>
                        <?php } ?>
                    </div>
                <?php 
                        }
                    }else {
                        echo '<div class="empty">
                            <p>No reviews added yet!</p>
                        </div>';
                    }
                ?>
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