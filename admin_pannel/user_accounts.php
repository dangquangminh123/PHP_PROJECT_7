<?php 
    include '../components/connect.php'; 
    session_start();
    
    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)) {
        header('location:admin_login.php');
    }

    // delete message
    if(isset($_POST['delete_msg'])) {
        $delete_id = $_POST['delete_id'];
        $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

        $verify_delete= $conn->prepare("SELECT * FROM `message` WHERE id=?");
        $verify_delete->execute([$delete_id]);

        if($verify_delete->rowCount() > 0) {
            $delete_message = $conn->prepare("DELETE FROM `message` WHERE id =?");
            $delete_message->execute([$delete_id]);
            $success_msg[] = 'message deleted successfully!';
        }else {
            $warning_msg[] = 'message already deleted';
        }
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
    
    <title>Admin - unread message page</title>
</head>
<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="accounts">
            <h1 class="heading">registered user's</h1>
            <div class="box-container">
                <?php 
                    $select_users = $conn->prepare("SELECT * FROM `users`");
                    $select_users->execute();
                    if($select_users->rowCount() > 0) {
                        while($fetch_users =$select_users->fetch(PDO::FETCH_ASSOC)) {
                            $user_id = $fetch_users['id'];
                ?>

                <div class="box">
                    <img src="../uploaded_img/<?= $fetch_users['profile']; ?>"/>
                    <p>User id: <span><?= $user_id; ?></span></p>
                    <p>User Name: <span><?= $fetch_users['name']; ?></span></p>
                    <p>User email: <span><?= $fetch_users['email']; ?></span></p>
                </div>

                <?php 
                        }
                    }else {
                        echo'<div class="empty">
                            <p>no User accounts yet!</p>
                        </div>';
                    }
                ?>
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