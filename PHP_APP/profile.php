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
if(isset($_SESSION["user_data"])){
if(isset($_POST["upload"])  && isset($_FILES["image"])){

$valid_ext =['jpg', 'jpeg', 'png']; //this are valid exts

$folder = "profile_images/";
$file_name = $_FILES["image"]["name"];
$file_size = $_FILES["image"]["size"];
$file_tmp_name =$_FILES["image"]["tmp_name"];
//getting  file ext
$file_ext = explode(".",$file_name);  //this might give many parts
$file_ext = strtolower(end($file_ext)); // this will take last value of array and convert it to lower case
$file_destination = $folder.$file_name;

if(!in_array($file_ext,$valid_ext)){// checking if file is invalid
echo "<script>alert('Invalid extension ($file_ext) of image.')</script>";
}
else if($file_size > 1000000){
    echo "<script>alert('Image is too large (Allowed size less than 1,MB).')</script>";
}
else{
    $newimage = uniqid(); //this will generate unique ids
    $newimage = $newimage.".".$file_ext; // createing new image name to store
     //moving file to its destination
move_uploaded_file($file_tmp_name,$folder.$newimage);
$query = "UPDATE users
SET image_file_name = '$newimage'
WHERE id = $id;";
$res = mysqli_query($connection,$query);
unset($_FILES["image"]);
if(isset($profile_image)){
    unlink("profile_images/".$profile_image);
}

//again fetching data to update our profile
$fetch_query= "SELECT * FROM `users` WHERE id = '$id'";
$res1 = mysqli_query($connection,$fetch_query);
$fetch_data = mysqli_fetch_all($res1,MYSQLI_ASSOC);

session_destroy();
session_start();
$_SESSION["user_data"] = $fetch_data[0];
$profile_image = $_SESSION["user_data"]["image_file_name"];
$id = $_SESSION["user_data"]["id"];
$name =$_SESSION["user_data"]["name"];
$email =$_SESSION["user_data"]["email"];
$phone =$_SESSION["user_data"]["phone_number"];
$unset = true;
echo "<script>alert(\"Profile image added sucessfully.\")</script>";

echo '<script>
if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
}
</script>
';
}
}

}
else
{
    header("Location: login.php");
}

?>


<?php $page_title = "Profile" ?>
<?php include "Components/header.php" ?>

<main>
    
    <div class="profilePage alignpage">
        <div class="inner desktop_tab">
            <div class="profile_pic">
            <img src="<?php if(  ($profile_image !== "") && isset($profile_image) ){
                               $image = "profile_images/".$profile_image;
                               //echo "$image" ;
                               echo "$image";
                             } 
                             else{
                                echo "images/logo.png";
                             }?>" alt="<?php echo $image; ?>">
             <span tool-tip = "update profile image"  onclick="upload_image_to_db()" class="edit_icon" ><img src="images/edit.svg" alt="edit profile pic"></span>
            </div>

            <div class="data_display_feilds">
                <i class="fa fa-user-circle"></i> 
                <div class="inner_feild">
                <span>Name:  </span>
                <h3> <?php echo $name ?? null  ?></h3>
                </div>
            </div>

            <div class="data_display_feilds">
            <i class="fa fa-envelope"></i>
            <div class="inner_feild">
            <span>Email: </span>
            <h3> <?php echo $email ?? null  ?></h3>
            </div>
            </div>

            <div class="data_display_feilds">
                <i class="fa fa-phone"></i>
                <div class="inner_feild">
                <span> Phone No.: </span> 
                <h3><?php echo $phone ?? null  ?></h3>
                </div>
            </div>
            <button class="upt_btn" onclick="location.href = 'update_details.php'">Update Profile</button>


                <div class = "hide" >
                <div class="overlay" onclick="close_feild(this.parentElement);"></div>
                <div class="upload_img">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                <label for="img" class="required">Upload Image:</label>
                <div class="image_upload">
                <i class="fa fa-image"></i> 
                <input type= "file" name="image" placeholder="Enter your email" accept=".jpg, .jpeg, .png">
                </div>
                <input type="submit" name="upload" style="width: 80% ; height: 2.5em;" value="Upload" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                </form>
                </div>
                </div>
     
        </div>
    </div>
</main>

<?php
if(isset($unset)){
    if($unset){
$_FILES["image"] = null;
$_POST["upload"] = null;
$unset = false;
    }
}
?>

<?php include "Components/footer.php" ?>

