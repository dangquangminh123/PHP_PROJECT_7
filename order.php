<?php 
    include './components/connect.php'; 
    session_start();
    
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        
    }else {
        $user_id = '';
    }
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
    
    <title>Restautrant My Order Pages</title>
</head>
<body>
    <?php include './components/user_header.php'; ?>
    
    <div class="banner">
        <div class="detail">
            <h1>My Order</h1>
            <a href="home.php">Home</a><span><i class="bx bx-right-arrow-alt"></i>My Order</span>
        </div>
    </div>
    <div class="orders">
        <div class="title">
            <h1>My Orders</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam adipisci saepe similique! Earum, dignissimos quisquam.</p>
        </div>
        <div class="box-container">
            <?php 
                $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id=?");
                $select_orders->execute([$user_id]);
                if($select_orders->rowCount() > 0) {
                    while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
                        $product_id = $fetch_orders['product_id']; 
                        $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                        $select_products->execute([$fetch_orders['product_id']]);
                        if($select_products->rowCount() > 0){
                            $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC); 
            ?>    
            <div class="box" <?php if($fetch_products['status']=='cancele') {echo 'style="border: 2px; solid red;"';} ?>>
                <a href="view_order.php?get_id=<?= $product_id; ?>">
                    <p class="date"><i class="bx bxs-calendar-alt"></i><span><?= $fetch_orders['date']; ?></span></p>
                    <img src="uploaded_img/<?= $fetch_products['image']; ?>" class="image"/>
                    <div class="row">
                        <h3 class="name"><?= $fetch_products['name']; ?></h3>
                        <p class="price">Price: $<?= $fetch_products['price']; ?>/-</p>
                        <p class="status" style="color: <?php if($fetch_orders['status']=='delivered') {echo "green";} 
                        elseif($fetch_orders['status']=='canceled') {echo "red";}
                        else { echo "orange";} ?>"><?= $fetch_orders['status']; ?></p>
                    </div>
                </a>
                <a href="add_review.php?get_id=<?= $product_id; ?>" class="btn">Add Reviews</a>
            </div>
            <?php 
                            
                        }
                }
                }else {
                    echo '<p class="empty">No order takes placed yet!</p>';
            }    
            ?>
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