<div class="head">
    <header>
        <div class="logo">
            <a href="home.php">
                <img src="./images/logo.png"/>
            </a>
        </div>
        <div class="logo1">
            <div class="bx bxs-user" id="user-btn"></div>
            <div class="bx bx-menu" id="menu-btn"></div>
            <?php 
                $count_wishlist_item = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id=?");
                $count_wishlist_item->execute([$user_id]);
                $total_wishlist_item = $count_wishlist_item->rowCount();
            ?>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i>
                <sup><?= $total_wishlist_item; ?></sup>
            </a>
            <?php 
                $count_cart_item = $conn->prepare("SELECT * FROM `cart` WHERE user_id=?");
                $count_cart_item->execute([$user_id]);
                $total_cart_item = $count_cart_item->rowCount();
            ?>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart"></i>
            <sup><?= $total_cart_item; ?></sup>
            </a>
        </div>

        <!-------- Profile details -------->
        <div class="profile-detail">
            <?php
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id=?");
                $select_profile->execute([$user_id]);
                if($select_profile->rowCount() > 0) {
                    $fetch_profile= $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="profile">
                <img src="uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-image">
                <p><?= $fetch_profile['name']; ?></p>
            </div>

            <div class="flex-btn">
                <a href="update_profile.php" class="btn" style="width: 200px;">Update Profile</a>
                <!-- <a href="components/user_logout.php?dangxuat=1" onclick="return confirm('logout from this website')" class="btn">
                    Logout
                </a> -->
                <a href="components/user_logout.php" onclick="return confirm('logout from this website')" class="btn">
                    Logout
                </a>
            </div>
            <?php  } else { ?>
                <p class="name">Please Login Or Register First!</p>
                <div class="flex-btn">
                    <a href="login.php" class="btn">Login</a>
                    <a href="register.php" class="btn">Register</a>
                </div>
            <?php } ?>
        </div>

        <!-- Side Bar -->
        <div class="sidebar">
            <?php
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id=?");
                $select_profile->execute([$user_id]);
                if($select_profile->rowCount() > 0) {
                    $fetch_profile= $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="profile">
                <img src="uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-image">
                <p><?= $fetch_profile['name']; ?></p>
            </div>
            <?php  } else { ?>
                <div class="profile">
                    <img src="images/user.jpg" class="logo-image"/>
                    <p>User</p>
                </div>
            <?php } ?>

            <ul>
                <li><a href="home.php"><i class="bx bxs-home-smile"></i>Home</a></li>
                <li><a href="about.php"><i class="bx bxs-shopping-bags"></i>About</a></li>
                <li><a href="menu.php"><i class="bx bxs-food-menu"></i>Menu</a></li>
                <li><a href="contact.php"><i class="bx bxs-user-detail"></i>Contact</a></li>
                <li><a href="order.php"><i class="bx bxs-user-detail"></i>My Order</a></li>
                <li><a href="register.php"><i class="bx bxs-user-detail"></i>Register</a></li>
                <li><a href="home.php" onclick="return confirm('Logout from this website');">
                <i class="bx bx-log-out"></i>Home</a></li>
            </ul>

            <h5>find us</h5>
            <div class="social-links">
                <i class="bx bxl-facebook"></i>
                <i class="bx bxl-instagram-alt"></i>
                <i class="bx bxl-linkedin"></i>
                <i class="bx bxl-twitter"></i>
                <i class="bx bxl-pinterest-alt"></i>
            </div>
        </div>
    </header>
</div>