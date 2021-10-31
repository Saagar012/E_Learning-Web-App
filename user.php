<!--
This is the index file for the user side page or the first page, user sees in the screen.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E Learning | Profile</title>
        <link rel="stylesheet" href="css/style1.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php include("inc/header1.php");
        ?>
        <div id="wrap">
            <div id="user_l">

            <center> <img src="imgs/users/sagar.jpg" alt=""></center>
            <h1>Profile</h1>
            <ul>
                <li><a href="#"><i class="fa fa-user-circle-o" style="font-size:20px"></i> My Account</a></li>
                <li><a href="#"><i class="fa fa-user-circle-o" style="font-size:20px"></i> Change Password</a></li>
                <li><a href="#"><i class="fa fa-user-circle-o" style="font-size:20px"></i> My Courses</a></li>

            </ul>
            
            </div>
            <div id="crumb2">
                <span><a href="index.php">Home</a></span> <b>></b>
                <span> Profile</span>
            </div>

            <div id="user_r">
                <h1>My Account</h1>
                <ul>
                    <li><i class="fa fa-user-circle-o" style="font-size:20px"></i>Update Your Name
                    <input type="text" name="c_name" />
                </li>
                    <li><i class="fa fa-user-circle-o" style="font-size:20px"></i>Update Your Phone No.
                    <input type="text" name="c_phone" /></li>
                    <li><i class="fa fa-user-circle-o" style="font-size:20px"></i>Update Your Picture
                    <input id="c_img1" type="file" name="c_picture"/></li>
                </ul>
                <button> Update</button> 
               
            
            </div>
        </div>
    </body>
</html>