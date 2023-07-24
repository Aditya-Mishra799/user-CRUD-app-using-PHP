<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? "unkown_page";?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="scss/main.css">
</head>
<body>
   <div class="main_container">
    <header>
     <nav>
        <div class="upper_block">
       
     <div class="logo">
       <img src="images/logo.png" alt="Company logo" >
       <h3 class="company_name">PearCo</h3>
     </div>

     <div class="menu_button" tool-tip = "Open Menu" id="menu_button" onclick="showMenu();">
            <i class="fa fa-bars"  id="menu-toggle-btn"></i>  
        </div>
     </div>
    
     <div class="hide_menu" id="menu">
        <ul>
            <div class="nav_icons">
            <i class ='fa fa-home'></i>
           <a href="#"><li>Home</li></a>
           </div>

           <div class="nav_icons">
            <i class ='fa fa-plus-circle'></i> 
           <a href="#"><li>About us</li></a>
           </div>
           

           <div class="nav_icons">
            <i class ='fa fa-user-circle'></i>
           <a href="profile.php"><li>Profile</li></a>
           </div>

           <div class="nav_icons">
            <i class ='fa fa-arrow-circle-left'></i>
           <a href="index.php"><li>Login/register</li></a>
           </div>

           <div class="nav_icons">
            <i class ='fa fa-arrow-circle-right'></i> 
           <a href="logout.php"><li>Log out</li></a>
           </div>
           
           <div class="nav_icons">
            <i class ='fa fa-gears'></i>
           <a href="#"><li>Settings</li></a>
           </div>
        </ul>
     </div>

     </nav>

    </header>
