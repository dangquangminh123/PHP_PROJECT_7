<?php 
     include 'components/connect.php'; 
     session_start();
     
     if(isset($_SESSION['user_id'])) {
         $user_id = $_SESSION['user_id'];
     }else {
         $user_id = '';
     }

    if(isset($_POST['submit'])) {
        //update name
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if(!empty($name)) {
            $select_name = $conn->prepare("SELECT * FROM `users` WHERE name=?");
            $select_name->execute([$name]);

            if($select_name->rowCount() > 0) {
                $warning_msg[] = 'username already exist';
            }else {
                $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id=?");
                $update_name->execute([$name, $user_id]);
                $success_msg[] = 'name updated successfully';
            }
        }

        //update email
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        if(!empty($email)) {
            $select_email = $conn->prepare("SELECT * FROM `users` WHERE email=?");
            $select_email->execute([$email]);

            if($select_email->rowCount() > 0) {
                $message[] = 'email already exist';
            }else {
                $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id=?");
                $update_email->execute([$email, $user_id]);
                $success_msg[] = 'email updated successfully';
            }
        }

        //update image
        $old_image = $_POST['old_image'];
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/'.$image;
        
        $update_image = $conn->prepare("UPDATE `users` SET profile = ? WHERE id=?");
        $update_image->execute([$image, $user_id]);
        move_uploaded_file($image_tmp_name, $image_folder);

        if($old_image != $image AND $old_image != '') {
            unlink('uploaded_img/'.$old_image);
        }
        $success_msg[] = 'image updated successfully!';

        //update password
        $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
        $select_old_pass = $conn->prepare("SELECT password FROM `users` WHERE id=?");
        $select_old_pass->execute([$user_id]);
        
        $fetch_prev_pass = $select_old_pass->fetch(PDO::FETCH_ASSOC);
        $prev_pass = $fetch_prev_pass['password'];

        $old_pass = sha1($_POST['old_pass']);
        $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);

        $new_pass = sha1($_POST['new_pass']);
        $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);

        $confirm_pass = sha1($_POST['cpass']);
        $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

        if($old_pass != $empty_pass) {
            if($old_pass != $prev_pass) {
                $warning_msg[] = 'old password not matched';
            }elseif ($new_pass != $confirm_pass) {
                $warning_msg[] = 'confirm password not matched';
            }else {
                if($new_pass != $empty_pass) {
                    $update_pass = $conn->prepare("UPDATE `users` SET password=? WHERE id=?");
                    $update_pass->execute($confirm_pass, $user_id);
                    $success_msg[] = 'password updated successfully';
                }
                else {
                    $warning_msg[] = 'please enter a new password';
                }
            }
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
    <title>Restautrant - user update profile page</title>
</head>
<body>
        <?php include 'components/user_header.php'; ?>
        <section class="form-container">
            
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="profile">
                        <img src="uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-img">
                    </div>

                    <h3>update profile</h3>
                    <input type="hidden" name="old_image" value="<?= $fetch_profile['profile']; ?>"/>
                    <div class="input-field">
                        <label>User name<sup>*</sup></label>
                        <input type="text" name="name" maxlength="20" placeholder="Enter User Name"
                        oninput="this.value.replace(/\s/g,'')" value="<?= $fetch_profile['name']; ?>"/>
                    </div>

                    <div class="input-field">
                        <label>User email<sup>*</sup></label>
                        <input type="email" name="email" maxlength="25" placeholder="Enter User Email"
                        oninput="this.value.replace(/\s/g,'')" value="<?= $fetch_profile['email']; ?>"/>
                    </div>

                    <div class="input-field">
                        <label>old Password<sup>*</sup></label>
                        <input type="password" name="old_pas" maxlength="20" placeholder="Enter Your password"
                        oninput="this.value.replace(/\s/g,'')"/>
                    </div>

                    <div class="input-field">
                        <label>new password<sup>*</sup></label>
                        <input type="password" name="new_pass" maxlength="20" placeholder="Confirm Your Password"
                        oninput="this.value.replace(/\s/g,'')"/>
                    </div>

                    <div class="input-field">
                        <label>confirm password<sup>*</sup></label>
                        <input type="password" name="cpass" maxlength="20" placeholder="Confirm Your Password"
                        oninput="this.value.replace(/\s/g,'')"/>
                    </div>

                    <div class="input-field">
                        <label>upload profile<sup>*</sup></label>
                        <input type="file" name="image" accept="image/*"/>
                    </div>

                    <input type="submit" name="submit" value="Update Profile" class="btn" />

                </form>
            
        </section>
    </div>

    <?php include 'components/dark.php'; ?>
</body>
</html>