<header>
    <div class="logo">
        <a href="home.php">
            <img src="../images/logo.png" width="200"/>
        </a>
    </div>

    <div class="right">
        <div class="bx bxs-user" id="user-btn"></div>
        <div class="toggle-btn"><i class="bx bx-menu"></i></div>
    </div>

    <div class="profile-detail">
        <?php 
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id=?");
            $select_profile->execute([$admin_id]);
            if($select_profile->rowCount() > 0) {
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="profile">
            <img src="../uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-img" width="100"/>
            <p><?= $fetch_profile['name']; ?></p>
        </div>

        <div class="flex-btn">
            <a href="update_profile.php" class="btn">Update Profile</a>
            <!-- <a href="../components/admin_logout.php?dangxuat=1" onclick="return confirm('logout from this website')" class="btn">
                Logout
            </a> -->
            <a href="../components/admin_logout.php" onclick="return confirm('logout from this website')" class="btn">
                Logout
            </a>
        </div>
        <?php 
            }
        ?>
    </div>
</header>

<!-- side -->
<div class="side-container">
    <div class="sidebar">
        <?php 
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id=?");
            $select_profile->execute([$admin_id]);
            if($select_profile->rowCount() > 0) {
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="profile">
            <img src="../uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-img" width="100"/>
            <p><?= $fetch_profile['name']; ?></p>
        </div>
        <?php 
            }
        ?>

        <h5>menu</h5>
        <div class="navbar">
            <ul>
                <li><a href="dashboard.php"><i class="bx bxs-home-smile"></i>dashboard</a></li>
                <li><a href="add_posts.php"><i class="bx bxs-shopping-bags"></i>add products</a></li>
                <li><a href="view_posts.php"><i class="bx bxs-food-menu"></i>view products</a></li>
                <li><a href="user_accounts.php"><i class="bx bxs-user-detail"></i>accounts</a></li>
                <li>
                    <a href="../components/admin_logout.php" onclick="return confirm('logout from this website')">
                        <i class="bx bx-log-out"></i>Logout
                     </a>
                </li>
            </ul>
        </div>

        <h5>find us</h5>
        <div class="social-links">
            <i class="bx bxl-facebook"></i>
            <i class="bx bxl-instagram-alt"></i>
            <i class="bx bxl-linkedin"></i>
            <i class="bx bxl-twitter"></i>
            <i class="bx bxl-pinterest-alt"></i>
        </div>
    </div>
</div>