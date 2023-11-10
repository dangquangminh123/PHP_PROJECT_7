<?php 
    include './components/connect.php'; 
    session_start();
    
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else {
        $user_id = '';
    }

    // Booking table
   
    
        if(isset($_POST['book_table'])) {
            if($user_id != '') {
                $date = $_POST['date'];
                $currentDateTime = date('Y-m-d H:i:s');
                print_r($currentDateTime) . '<br>';
                $date = filter_var($date, FILTER_SANITIZE_STRING);
                if($currentDateTime > $date) {
                    $warning_msg[] = 'Vui lòng đặt bàn sau ngày hôm nay!';
                } 
                else {
                    $id= unique_id();
                    $name = $_POST['name'];
                    $name = filter_var($name, FILTER_SANITIZE_STRING);
                    $email = $_POST['email'];
                    $email = filter_var($email, FILTER_SANITIZE_STRING);
                    $number = $_POST['number'];
                    $number = filter_var($number, FILTER_SANITIZE_STRING);
                    $select = $_POST['select'];
                    $select = filter_var($select, FILTER_SANITIZE_STRING);
                    $time = $_POST['time'];
                    $time = filter_var($time, FILTER_SANITIZE_STRING);
                    $comment = $_POST['comment'];
                    $comment = filter_var($comment, FILTER_SANITIZE_STRING);
                    $reserve_table = $conn->prepare("INSERT INTO `reservation`(id,user_id,name,email,number,select_one,date,time,comment)
                    VALUES(?,?,?,?,?,?,?,?,?)");
                    $reserve_table->execute([$id,$user_id,$name,$email,$number,$select,$date,$time,$comment]);
                    if($reserve_table) {
                        $success_msg[]= "table booked!";
                    }else {
                        $warning_msg[] = 'Something went wrong';
                    }
                }
            }  else {
                $warning_msg[] = 'Please login first!';
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
    
    <title>Restautrant Reservation Pages</title>
</head>
<body>
    <?php include './components/user_header.php'; ?>
    
    <div class="banner">
        <div class="detail">
            <h1>reserve your table</h1>
            <a href="home.php">Home</a><span><i class="bx bx-right-arrow-alt"></i>reservation</span>
        </div>
    </div>

    <div class="reservation-container">
        <img src="images/table.png"/>
        <div class="form-container">
            <form action="" method="post">
                <div class="title">
                    <span>RESERVATION</span>
                    <h1>Book A Table</h1>
                    <p>Just A Few Click To Make The Reservation Online For Saving Your Time And Money</p>
                </div>
                <div class="input-field">
                    <label>name <sup>*</sup></label>
                    <input type="text" name="name" required placeholder="Enter Your Name"/>
                </div>
                <div class="input-field">
                    <label>email <sup>*</sup></label>
                    <input type="email" name="email" required placeholder="Enter Your email"/>
                </div>
                <div class="input-field">
                    <label>Phone Number <sup>*</sup></label>
                    <input type="text" name="number" required placeholder="Type Your Phone Number"/>
                </div>
                <div class="input-field">
                    <label>Select One <sup>*</sup></label>
                    <select name="select">
                        <option value="select one">Select One</option>
                        <option value="select two">Select Two</option>
                        <option value="select three">Select Three</option>
                        <option value="select four">Select Four</option>
                    </select>
                </div>

                <div class="input-field">
                    <label>Date <sup>*</sup></label>
                    <input type="date" name="date" required placeholder="select a date"/>
                </div>

                <div class="input-field">
                    <label>Time <sup>*</sup></label>
                    <select name="time">
                        <option value="7 AM">7 AM</option>
                        <option value="8 AM">8 AM</option>
                        <option value="9 AM">9 AM</option>
                        <option value="10 AM">10 AM</option>
                    </select>
                </div>

                <div class="input-field">
                    <label>Comment <sup>*</sup></label>
                    <textarea name="comment" cols="30" rows="10" required placeholder="add any comment you think necessary">
                    </textarea>
                </div>
                <input type="submit" name="book_table" value="book table" class="btn"/>
            </form>
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