<?php include "database/connection.php";?>

<?php
session_start();
if(isset($_SESSION["user_data"])){
$profile_image = $_SESSION["user_data"]["image_file_name"];
$id = $_SESSION["user_data"]["id"];
$name =$_SESSION["user_data"]["name"];
$email =$_SESSION["user_data"]["email"];
$phone =$_SESSION["user_data"]["phone_number"];
}
else{
    header("Location: login.php");
}

?>

<?php
if(isset($_POST["submit"])){
   $new_name = $_POST["name"];
   $new_num = $_POST["phone_no"];
   $entered_pass = $_POST["password"];
   $query = "SELECT * FROM `users` WHERE id = $id";
   $res = mysqli_query($connection,$query);
   $password = mysqli_fetch_all($res,MYSQLI_ASSOC)[0]["password"];
   $error = array();
   if(ctype_digit($name) || strlen($name) < 6){
    array_push($error,"Name should not contain numeric values and must have 5 or more characters.");
   }
   elseif(strlen($new_num) !== 10){
    array_push($error,"Phone No. should contain only 10 digits");
   }
   elseif($entered_pass !== $password){
    array_push($error,"Enterd Password is incorrect ");
    unset($password);
   }
   else{
    $new_num = (int)$_POST["phone_no"];
    $new_query = "UPDATE users
    SET name = '$new_name', phone_number = '$new_num'
    WHERE id = $id;";
    $res = mysqli_query($connection,$new_query);
    if($res){
        //again fetching data to update our profile
            $fetch_query= "SELECT * FROM `users` WHERE id = '$id'";
            $res1 = mysqli_query($connection,$fetch_query);
            $fetch_data = mysqli_fetch_all($res1,MYSQLI_ASSOC);

            session_destroy();
            session_start();
            $_SESSION["user_data"] = $fetch_data[0];

            $id = $_SESSION["user_data"]["id"];
            $name =$_SESSION["user_data"]["name"];
            $email =$_SESSION["user_data"]["email"];
            $phone =$_SESSION["user_data"]["phone_number"];
            echo '<div class="overlay">
            <div class="sucess">
                <img src="images/tick.png" alt="sucess">
                <p>Your Details are updated sucessfully, You are being redirected.</p>
            </div>
         </div>';
            echo "<script>setTimeout(\"location.href = 'profile.php';\",3000);</script>";

    }
   }
}
?>
<?php $page_title = "Update Profile" ?>
<?php include "Components/header.php" ?>
<main>
                <div class="update_details alignpage">
                <div class="inner desktop_tab">

                 

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    
                        <h2>Update your details:</h2>
                        <hr>
                     <?php if(isset($error))
                          for($i = 0; $i<count($error); $i++): ?>
                        <div class="<?php if(isset($error)) echo "error_box"; else echo "hide"; ?>" id="error_box">
                        <p><?php echo $error[$i] ?? null ; ?></p>
                        <i class="fa fa-times" onclick="close_feild(this.parentElement)"></i> 
                        </div>
                    <?php endfor; ?>
                        <div class="update_info" >
                        <label for="name" class="required">Update name: </label> <span tool-tip = "Check to edit feilds"><input type="checkbox" name="" id="" onchange="editable(this, this.parentElement.parentElement)"> </span>
                        <div class="input_feild">
                        <i class="fa fa-envelope"></i>
                        <input type="text" name="name" placeholder="Update your email" readonly  value="<?php echo $name ?? null  ?>"  locked >
                        </div>
                        </div>

                        <div class="update_info">
                        <label for="phone_no">Update Phone No. : </label> <span tool-tip = "Check to edit feilds"><input type="checkbox" name="" id="" onchange="editable(this, this.parentElement.parentElement)"> </span>
                        <div class="input_feild">
                        <i class="fa fa-phone"></i>
                        <input type="number" name="phone_no" placeholder="Update your phone no." readonly  value="<?php echo $phone ?? null  ?>"  locked >
                        </div>
                        </div>
                        <label for="phone_no">Enter Password:</label>
                        <div class="input_feild">
                        <i class="fa fa-lock"></i> 
                        <input type="password" name="password" placeholder="Enter your password" autocomplete="off">
                        <?php include "Components/eyeicon.php" ?>
                        </div>
                         <hr>

                    <input type="submit" name="submit" style="width: 80% ; height: 2.5em;" value="submit"  class="upt_btn">
                </form>
                </div>
</div>
</main>
<?php include "Components/footer.php" ?>