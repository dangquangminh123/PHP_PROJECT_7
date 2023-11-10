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
    
    <title>Restautrant View Product Pages</title>
</head>
<body>
    <?php include './components/user_header.php'; ?>
    
    <div class="banner">
        <div class="detail">
            <h1>View product</h1>
            <a href="home.php">Home</a><span><i class="bx bx-right-arrow-alt"></i>View product</span>
        </div>
    </div>

    <section class="view_page">
        <?php 
            if(isset($_GET['pid'])) {
                $pid = $_GET['pid'];
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = '$pid'");
                $select_products->execute();
                if($select_products->rowCount() > 0) {
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
        ?>

        <form action="" method="post" class="box">
            <img src="uploaded_img/<?= $fetch_products['image']; ?>"/>
            <div class="detail">
                <p class="price">$ <?= $fetch_products['price']; ?>/-</p>
                <div class="name"><?= $fetch_products['name']; ?></div>
                <p class="product-detail"><?= $fetch_products['product_detail']; ?></p>
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>"/>
                <div class="button">
                    <button type="submit" name="add_to_wislist" class="btn">add to wishlist <i class="bx bx-heart"></i></button>
                    <input type="hidden" name="qty" value="1" min="0" class="quantity"/>
                    <button type="submit" name="add_to_cart" class="btn">add to cart <i class="bx bx-cart"></i></button>
                </div>
            </div>
        </form>

        <?php 
                    }
                }
            }
        ?>
    </section>
            
    <section class="products">
        <div class="title">
            <h1>similar products</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi cupiditate iste beatae,
                 voluptate nihil magni. Ipsam assumenda ea ut facere.</p>
        </div>
        <?php include 'components/shop.php'; ?>
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