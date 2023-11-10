<?php 
    include './components/connect.php'; 
    session_start();
    
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        // $get_id=$_GET['get_id'];
    }else {
        $user_id = '';
    }
 

        // Placed order
        if(isset($_POST['place_order'])) {
            if($user_id != '') {
                $id = unique_id();
                $name = $_POST['name'];
                $name = filter_var($name, FILTER_SANITIZE_STRING);
                $number = $_POST['number'];
                $number = filter_var($number, FILTER_SANITIZE_STRING);
                $email = $_POST['email'];
                $email = filter_var($email, FILTER_SANITIZE_STRING);
                $address = $_POST['flat'].', '.$_POST['street'].', '.$_POST['city'].', '.$_POST['country'].', '.$_POST['pincode'];
              
                $address = filter_var($address, FILTER_SANITIZE_STRING);
                $address_type = $_POST['address_type'];
                $address_type = filter_var($address_type, FILTER_SANITIZE_STRING);

                $method = $_POST['method'];
                $method = filter_var($method, FILTER_SANITIZE_STRING);

                date_default_timezone_set('asia/ho_chi_minh');
                $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $verify_cart->execute([$user_id]);

                if($verify_cart->rowCount() > 0) {
                    while($fetch_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)){

                        $get_product = $conn->prepare("SELECT * FROM `products` WHERE id=?");
                        $get_product->execute([$fetch_cart['product_id']]);

                        if($get_product->rowCount() > 0) {
                            while($fetch_p = $get_product->fetch(PDO::FETCH_ASSOC)) {
                                $insert_order = $conn->prepare("INSERT INTO `orders` (id,user_id,name,number,email,address,address_type,
                                method,product_id,price,qty) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                                $insert_order->execute([$id, $user_id, $name, $number, $email, $address, $address_type, $method, $fetch_p['id'], $fetch_p['price'], $fetch_cart['qty']]);
                                header('location: order.php');
                            }
                        }else {
                            $warning_msg[] = 'something went wrong';
                        }
                    }

                }elseif($verify_cart->rowCount() > 0) {
                    while($f_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)) {
                        $get_product = $conn->prepare("SELECT * FROM `products` WHERE id=?");
                        // $get_product->execute([$_GET['get_id']]);
                        $get_product->execute([$fetch_cart['product_id']]);

                        if($get_product->rowCount() > 0) {$insert_order = $conn->prepare("INSERT INTO `orders` (id,user_id,name,number,email,address,address_type,
                            method,product_id,price,qty) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                            $insert_order->execute([$id, $user_id, $name, $number, $email, $address, $address_type, $method, $f_cart['id'], $f_cart['price'], $f_cart['qty']]);
                            header('location: order.php');
                        }
                    }if($insert_order) {
                        $delete_cart_id = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
                        $delete_cart_id->execute([$user_id]);
                        header('location: order.php');
                    }
                }else {
                    $warning_msg[] = 'something went wrong';
                }
            } else {
                $warning_msg[] = 'Please login First';
            }
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
    
    <title>Restautrant Checkout Pages</title>
</head>
<body>
    <?php include './components/user_header.php'; ?>
    
    <div class="banner">
        <div class="detail">
            <h1>Checkout</h1>
            <a href="home.php">Home</a><span><i class="bx bx-right-arrow-alt"></i>Checkout</span>
        </div>
    </div>
   
    <section class="checkout">
        <div class="title">
            <h1>Checkout summary</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit distinctio ea iste nemo earum 
                exercitationem tenetur dolorum!</p>
        </div>
        <div class="row">
            <form action="" method="post" class="form">
                <h3>Billing details</h3>
                <div class="flex">
                    <div class="box">
                        <div class="input-field">
                            <p>Your Name<span>*</span></p>
                            <input type="text" name="name" required maxlength="50" placeholder="Enter Your Name" class="input"/>
                        </div>
                        <div class="input-field">
                            <p>Your number<span>*</span></p>
                            <input type="number" name="number" required maxlength="10" placeholder="Enter Your Number" class="input"/>
                        </div>
                        <div class="input-field">
                            <p>Your Email<span>*</span></p>
                            <input type="email" name="email" required maxlength="50" placeholder="Enter Your Email" class="input"/>
                            </div>

                        <div class="input-field">
                            <p>Payment method <span>*</span></p>
                            <select name="method" class="input">
                                <option value="cash on delivery">Cash on deliver</option>
                                <option value="credit or debit card">credit or debit card</option>
                                <option value="net banking">net banking</option>
                                <option value="UPI or RuPay">UPI or RuPay</option>
                                <option value="paytm">paytm</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <p>Address type<span>*</span></p>
                            <select name="address_type" class="input">
                                <option value="home">home</option>
                                <option value="office">office</option>
                            </select>
                        </div>
                    </div>

                    <div class="box">
                        <div class="input-field">
                            <p>Address line 1 <span>*</span></p>
                            <input type="text" name="flat" required maxlength="50" placeholder="e.g flat & building number" class="input" />
                        </div>

                        <div class="input-field">
                            <p>Address line 2 <span>*</span></p>
                            <input type="text" name="street" required maxlength="50" placeholder="e.g street name & number" class="input" />
                        </div>

                        <div class="input-field">
                            <p>city name <span>*</span></p>
                            <input type="text" name="city" required maxlength="50" placeholder="Enter Your city name" class="input" />
                        </div>

                        <div class="input-field">
                            <p>country name <span>*</span></p>
                            <input type="text" name="country" required maxlength="50" placeholder="Enter Your country name" class="input" />
                        </div>

                        <div class="input-field">
                            <p>pincode name <span>*</span></p>
                            <input type="number" name="pincode" required maxlength="50" placeholder="Enter Your pincode name" class="input" />
                        </div>
                    </div>
                </div>
                <button type="submit" name="place_order" class="btn">Place order</button>
            </form>

            <div class="summary">
                <h3>My Bag</h3>
                <div class="box-container">
                    <?php 
    
                    $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                    $verify_cart->execute([$user_id]);
                    $grand_total = 0;
                    if($verify_cart->rowCount() > 0) {
                        while($fetch_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)){
    
                            $get_product = $conn->prepare("SELECT * FROM `products` WHERE id=?");
                            $get_product->execute([$fetch_cart['product_id']]);
                            if($get_product->rowCount() > 0) {
                                while($fetch_get = $get_product->fetch(PDO::FETCH_ASSOC)) {
                                $sub_total = $fetch_get['price'] * $fetch_cart['qty'];
                                $grand_total += $sub_total;
                       
                           
                    ?>
                    <div class="flex">
                        <img src="uploaded_img/<?= $fetch_get['image']; ?>" class="image"/>
                        <div>
                            <h3 class="name"><?= $fetch_get['name']; ?></h3>
                            <p class="price">$<?= $fetch_get['price']; ?> * <?= $fetch_cart['qty'];?> /-</p>
                        </div>
                    </div>
                    <?php 
                          }
                        }
                           }
                        } else {
                            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                            $select_cart->execute([$user_id]);
                            if($select_cart->rowCount() > 0) {
                                while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                                    $select_products= $conn->prepare("SELECT * FROM `products` WHERE id=?");
                                    $select_products->execute([$fetch_cart['product_id']]);
                                    $fetch_product= $select_products->fetch(PDO::FETCH_ASSOC);
                                    $sub_total = ($fetch_cart['qty'] * $fetch_cart['price']);
                                    $grand_total += $sub_total;
                    ?>
                    <div class="flex">
                        <img src="uploaded_img/<?= $fetch_product['image']; ?>"/>
                        <div>
                            <h3 class="name"><?= $fetch_product['name']; ?></h3>
                            <p class="price">$<?= $fetch_product['price']; ?> X <?= $fetch_cart['qty']; ?>/-</p>
                        </div>
                    </div>
                    <?php 
                                }
                            } else {
                                echo '<p class="empty">Your cart is empty</p>';
                            }
                        }
                    ?>
                </div>

                <div class="grand-total">
                    <span>Total amount payable : $</span><p><?= $grand_total; ?></p>/-
                </div>
            </div>
            <!-- </form> -->
            </div>
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