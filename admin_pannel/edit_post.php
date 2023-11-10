<?php 
    include '../components/connect.php'; 
    session_start();
    
    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)) {
        header('location:admin_login.php');
    }

    //Delete products from database
    //$get_id = $_GET['post_id'];

   if(isset($_POST['save'])) {
        $product_id = $_POST['post_id'];

        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
        $content = $_POST['content'];
        $content = filter_var($content, FILTER_SANITIZE_STRING);

        $category = $_POST['category'];
        $category = filter_var($category, FILTER_SANITIZE_STRING);
        $status = $_POST['status'];
        $status = filter_var($status, FILTER_SANITIZE_STRING);

        $update_post = $conn->prepare("UPDATE `products` SET name = ?, price = ?, product_detail = ?,
            category = ?, status = ? WHERE id = ?");
        $update_post->execute([$title, $price, $content, $category, $status, $product_id]);

        $success_msg[] = 'Product updated!';

        $old_image = $_POST['old_image'];
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_img/'.$image;

        //Cách 1 xóa hình ảnh cũ trong folder 
        // $delete_image = $conn->prepare("SELECT * FROM `products` WHERE id=?");
        // $delete_image->execute([$product_id]);
        // $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
        // if($old_image!= '') {
        //     unlink('../uploaded_img/'.$old_image);
        // }
        // $delete_post = $conn->prepare("DELETE FROM `products` WHERE id=?");
        // $delete_post->execute([$p_id]);

        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND id = ?");
        $select_image->execute([$image, $product_id]);

        //Kiểm tra hình ảnh mới 
        if(!empty($image)) {
            if($image_size > 2000000) {
                $warning_msg[] = 'image size too large';
            }elseif($select_image->rowCount() > 0 AND $image != '') {
                $warning_msg[] = 'Please rename your image';
            }else {
                move_uploaded_file($image_tmp_name, $image_folder);
                if($old_image != $image AND $old_image != '') {
                    unlink('../uploaded_img/'.$old_image);
                }
                $update_image = $conn->prepare("UPDATE `products` SET image = ? WHERE id=?");
                $update_image->execute([$image, $product_id]);
                $success_msg[] = 'image Updated';
            }
        }
   }

    //Delete Products
    if(isset($_POST['delete_post'])) {
        $post_id = $_POST['post_id'];
        $post_id = filter_var($post_id, FILTER_SANITIZE_STRING);
        $delet_image = $conn->prepare("SELECT * FROM `products` WHERE id=?");
        $delet_image->execute([$post_id]);
        $fetch_delete_image = $delet_image->fetch(PDO::FETCH_ASSOC);
        if($fetch_delete_image['image'] != '') {
            unlink('../uploaded_img/'.$fetch_delete_image['image']);
        }

        $delete_post = $conn->prepare("DELETE FROM `products` WHERE id =?");
        $delete_post->execute([$post_id]);
        $success_msg[] = 'Products deleted successfully!';
    }    

    // Người admin muốn xóa riêng images 
    if(isset($_POST['delete_image'])) {
        $empty_image = '';
        $product_id = $_POST['post_id'];
        $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
        $delet_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $delet_image->execute([$product_id]);
        $fetch_delet_image = $delet_image->fetch(PDO::FETCH_ASSOC);
        if($fetch_delet_image['image'] != '') {
            unlink('../uploaded_img/'.$fetch_delet_image['image']);
        }
        $unset_image = $conn->prepare("UPDATE `products` SET image=? WHERE id=?");
        $unset_image->execute([$empty_image, $product_id]);
        $success_msg[] = 'image deleted successfully!';
    }
?>

<style>
    <?php 
        include 'admin_style.css';
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
    
    <title>admin Edit Post</title>
</head>
<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="post-editor">
            <h1 class="heading">edit product</h1>
            <div class="box-container">
               <?php 
                    $post_id = $_GET['id'];
                    $select_post = $conn->prepare("SELECT * FROM `products` WHERE id=?");
                    $select_post->execute([$post_id]);
                    if($select_post->rowCount() > 0) {
                        while($fetch_post = $select_post->fetch(PDO::FETCH_ASSOC)) {
               ?>
               <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="old_image" value="<?= $fetch_post['image']; ?>">
                        <input type="hidden" name="post_id" value="<?= $fetch_post['id']; ?>">
                        <div class="input-field">
                            <label>Products Status <sup>*</sup></label>
                            <select name="status">
                                <option value="<?= $fetch_post['status']; ?>" selected>
                                    <?= $fetch_post['status']; ?>
                                </option>

                                <option value="active">active</option>
                                <option value="deactive">deactive</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>product name<sup>*</sup></label>
                            <input type="text" name="title" value="<?= $fetch_post['name']; ?>"/>
                        </div>
                        <div class="input-field">
                            <label>product price<sup>*</sup></label>
                            <input type="number" name="price" value="<?= $fetch_post['price']; ?>"/>
                        </div>
                        <div class="input-field">
                            <label>product details<sup>*</sup></label>
                            <textarea name="content"><?= $fetch_post['product_detail']; ?></textarea>
                        </div>

                        <div class="input-field">
                            <label>product category<sup>*</sup></label>
                            <select name="category" required>
                                <option selected><?= $fetch_post['category']; ?></option>
                                <option value="what's hot">what's hot</option>
                                <option value="burgers">burgers</option>
                                <option value="chiken and salads">chiken and salads</option>
                                <option value="tacos, fries and sides">tacos, fries and sides</option>
                                <option value="breakfast">breakfast</option>
                                <option value="family dinner">family dinner</option>
                                <option value="shakes and desserts">shakes and desserts</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>product image<sup>*</sup></label>
                            <input type="file" name="image" accept="image/*" />
                            <?php if($fetch_post['image'] != ''){ ?>
                                <img src="../uploaded_img/<?= $fetch_post['image']; ?>" class="image"/>
                                <div class="flex-btn">
                                    <input type="submit" name="delete_image" class="btn" value="delete image" />
                                    <a href="view_posts.php" class="btn" style="width: 49%; text-align: center; height: 3rem;
                                    margin-top: .7rem;">Go Back</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="flex-btn">
                            <input type="submit" name="save" value="save product" class="btn">
                            <input type="submit" name="delete_post" value="delete product" class="btn">
                        </div>
                    </form>
               </div>
               <?php 
                    }
                } else {
                    echo'<div class="empty">
                        <p>No Products added yet! <br><a href="add_posts.php" class="btn" style="margin-top: 1.5rem">
                            Add Products
                        </a></p>
                    </div>';
                
               ?>
                <div class="flex-btn">
                    <a href="view_posts.php" class="btn">view product</a>
                    <a href="add_posts.php" class="btn">add product</a>
                </div>
                <?php } ?>
            </div>
        </section>
    </div>
   
     <?php include '../components/dark.php'; ?>

    <!-- sweetalert cdn 2.1.2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js link -->
    <script type="text/javascript" src="script.js"></script>

    <?php include '../components/alert.php'; ?>
</body>
</html>