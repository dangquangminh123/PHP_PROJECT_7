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
    
    <title>Restautrant Menu Pages</title>
</head>
<body>
    <?php include './components/user_header.php'; ?>
    
    <div class="banner">
        <div class="detail">
            <h1>Our menu</h1>
            <a href="home.php">Home</a><span><i class="bx bx-right-arrow-alt"></i>Our Menu</span>
        </div>
    </div>

    <section class="products">
        <?php if(isset($_GET['category'])) { 
                    $category =$_GET['category'];
                    $category = filter_var($category, FILTER_SANITIZE_STRING);
        ?>
        <div class="box-container">
                <h1>Toàn bộ sản phẩm <?= $_GET['category']; ?></h1>
                <?php
                   $select_products = $conn->prepare("SELECT * FROM `products` WHERE category ='$category' AND status ='active'");
                   $select_products->execute();
                    if($select_products->rowCount() > 0) {
                        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                ?>

            <form action="" method="post" class="box">
            
                <img src="./uploaded_img/<?= $fetch_products['image']; ?>" class="image">
                <div class="button">
                        <div><h3 class="name"><?= $fetch_products['name']; ?></h3></div>    
                    <div>
                        <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                        <button type="submit" name="add_to_wislist"><i class="bx bx-heart"></i></button>
                        <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="bx bxs-show"></a>
                    </div>
                </div>
                <p class="price">Price $<?= $fetch_products['price']; ?></p>
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>"/>
                <div class="flex-btn">
                    <a href="checkout.php?get_id=<?= $fetch_products['id']; ?>" class="btn">Buy Now</a>
                    <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                </div>
            </form>
            <?php 
                    }
                } else {
                    echo '<div class="empty">
                        <p>No products added Yet!</p>
                    </div>';
                }
            ?>
        </div>
        <?php } else { ?>

            <div class="box-container">
                <h1>Toàn bộ sản phẩm</h1>
                <?php 
                   
                   $select_products = $conn->prepare("SELECT * FROM `products` WHERE status = ?");
                   $select_products->execute(['active']);
                    if($select_products->rowCount() > 0) {
                        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                ?>

            <form action="" method="post" class="box">
            
                <img src="./uploaded_img/<?= $fetch_products['image']; ?>" class="image">
                <div class="button">
                        <div><h3 class="name"><?= $fetch_products['name']; ?></h3></div>    
                    <div>
                        <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                        <button type="submit" name="add_to_wislist"><i class="bx bx-heart"></i></button>
                        <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="bx bxs-show"></a>
                    </div>
                </div>
                <p class="price">Price $<?= $fetch_products['price']; ?></p>
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>"/>
                <div class="flex-btn">
                    <a href="checkout.php?get_id=<?= $fetch_products['id']; ?>" class="btn">Buy Now</a>
                    <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                </div>
            </form>
            <?php 
                    }
                } else {
                    echo '<div class="empty">
                        <p>No products added Yet!</p>
                    </div>';
                }
            ?>
        </div>
        <?php } ?>
    </section>
   

    <?php include './components/footer.php'; ?>
     <?php include './components/dark.php'; ?>

    <!-- sweetalert cdn 2.1.2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js link -->
    <script type="text/javascript" src="script.js"></script>

    <?php include './components/alert.php'; ?>
</body>
</html>