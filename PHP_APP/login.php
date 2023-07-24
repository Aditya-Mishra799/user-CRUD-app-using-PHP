<?php include "database/connection.php" ?>
<?php $page_title = "Login" ?>
<?php include "Components/header.php";

//php code to login th user
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $fetch_query= "SELECT * FROM `users` WHERE email = '$email'";
  $result1 = mysqli_query($connection,$fetch_query);
  $fetch_data = mysqli_fetch_all($result1,MYSQLI_ASSOC);
 if($result1  && count($fetch_data) !== 0  && $fetch_data[0]['password'] == "$password" ){
    $sucess = "You sucessfully  logged in.";
   //updating last_login_time
   $time = date("Y/m/d");
   $time = $time."  " .date("h:i:sa");  //update time to i sa h
   $id = $fetch_data[0]['id'];
   $update_time_query = "UPDATE users SET last_login_time = '$time' WHERE id = '$id'; ";
   $update_time = mysqli_query($connection,$update_time_query);
   $logged_in = true;
   session_start();
   $_SESSION["user_data"] = $fetch_data[0];
   header("Location: profile.php");
 }
 else{
  $error = "Invalid username or password !!!";
 }
}
?>

<main>

<div class="login alignpage">
  <div class="inner desktop_tab">
    <div class="head">
    <h1>Login to your account.</h1>
    </div>
    <div class="content">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<div class="<?php if(isset($error)) echo "error_box"; else echo "hide"; ?>" id="error_box">
<p><?php echo $error ?? null ; ?></p>
<i class="fa fa-times" onclick="close_feild(this.parentElement)"></i> 
</div>

<label for="email" class="required">Email:</label>
<div class="input_feild">
<i class="fa fa-envelope"></i>
<input type="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email ??null); ?>">
</div>



<label for="password" class="required">Password: </label>
<div class="input_feild">
<i class="fa fa-lock"></i> 
<input type="password" name="password" placeholder="Enter your password" autocomplete="off" >
<?php include "Components/eyeicon.php" ?>
</div>

<input type="submit" value="Submit" name="submit">

</form>
  
<div class="login_message">
  <h3>Not a user?</h3>
   <input type="submit" value="Register" onclick='location.href ="index.php"'>
</div>

</div>
</div>
</main>

<?php include "Components/footer.php" ?>
