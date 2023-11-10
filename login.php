<?php   
    include 'components/connect.php'; 
    session_start();
    
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else {
        $user_id = '';
    }
    echo "Tài khoản: userphp@gmail.com <br>";
    echo "Mật khẩu: userphp";
    if(isset($_POST['submit'])) {
        
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $pass = sha1($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $select_user->execute([$email, $pass]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);

        if($select_user->rowCount() > 0) {
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
        }else {
            $warning_msg[] = 'incorrect password or username';
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
    <title>User - register page</title>
</head>
<body>
        <section>
            <div class="form-container" id="admin_login">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>register now</h3>

                    <div class="input-field">
                        <label>User email<sup>*</sup></label>
                        <input type="email" name="email" maxlength="25" required placeholder="Enter User Email"
                        oninput="this.value.replace(/\s/g,'')"/>
                    </div>

                    <div class="input-field">
                        <label>User Password<sup>*</sup></label>
                        <input type="password" name="pass" maxlength="20" required placeholder="Enter Your password"
                        oninput="this.value.replace(/\s/g,'')"/>
                    </div>

                    <input type="submit" name="submit" value="login now" class="btn" />
                    <p>Do not have account ?<a href="register.php">Register now</a></p>
                </form>
            </div>
        </section>

    <?php include 'components/dark.php'; ?>

    <!-- sweetalert cdn 2.1.2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js link -->
    <script type="text/javascript" src="script.js"></script>

    <?php include 'components/alert.php'; ?>
</body>
</html>