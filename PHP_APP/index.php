 <?php include "database/connection.php" ?>
 <?php $page_title = "Register" ?>

 <!------------------code to crate user account --------------->

 
 <?php include "Components/header.php" ?>

 <?php

 if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_no'];
  $password = $_POST['password'];


if($name != null && $email != null  && $password != null){
  $time = date("Y/m/d");
  $time = $time."  " .date("h:i:sa");

  $checkEmail = "SELECT email FROM `users` WHERE email = '$email'";
  $verify = mysqli_query($connection,$checkEmail);
  //isEmail contains array of emails
  $isEmail = mysqli_fetch_all($verify,MYSQLI_ASSOC); //this get data in form of array
  if(count($isEmail) !== 0){
    $error = "This email is already in use. Try another email id.";   
 }
 else{
  $sql = "INSERT INTO `users` (name,email,password,phone_number,last_login_time)
  VALUES( '$name','$email','$password','$phone_number','$time')";
$result = mysqli_query($connection,$sql);
if($result){
  $sucess = "Account Created Sucessfull. Now you can login";
  //showing message for account creation
  echo '<div class="overlay">
  <div class="sucess">
      <img src="images/tick.png" alt="sucess">
      <p>Your account has been created sucessfully, You are being redirected to login page.</p>
  </div>
</div>';
  echo "<script>setTimeout(\"location.href = 'login.php';\",3000);</script>";
}
else{
 $error = "Some error in database occured, try again";
}

}

  

}
else 
   $error = "Enter Valid information!!!";

}
 ?>
    <main class="SignUp">
      <div class="sign_up">
        <h2>Create New Account</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

     <p style="color: red; font-size:small;">  <?php echo $error ?? null; ?> </p>
     <p style="color: green; font-size:small;"> <?php echo $sucess ?? null; ?> </p>

    <label for="name" class="required">Name:</label>
    <div class="input_feild">
    <i class="fa fa-user-circle"></i> 
    <input type="text" name="name" placeholder="Enter your name">
    </div>

    <label for="email" class="required">Email:</label>
    <div class="input_feild">
    <i class="fa fa-envelope"></i>
    <input type="email" name="email" placeholder="Enter your email">
    </div>

    <label for="phone_no">Phone No. :</label>
    <div class="input_feild">
    <i class="fa fa-phone"></i>
    <input type="number" name="phone_no" placeholder="Enter your phone no.">
    </div>

    <label for="password" class="required">Password: </label>
    <div class="input_feild">
    <i class="fa fa-lock"></i> 
    <input type="password" name="password" placeholder="Set your password" autocomplete="off">
    <?php include "Components/eyeicon.php" ?>
    </div>

    <input type="submit" value="Submit" name="submit">

    </form>
      
    <div class="login_message">
      <h3>Already an user?</h3>
       <input type="submit" value="Log in" onclick="pagechange()">
    </div>
    
    </div>   
    </main>
    <?php include "Components/footer.php" ?>
   
