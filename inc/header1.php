<?php 
    include("inc/function1.php");
?>
<div id="header">
    <div id="up_head">
        <div id="link">
            <?php
                echo head_link();
            ?>
        </div>
        <div id="date"> <p><?php echo date('l, d F Y'); ?> </p> </div>
        <div id="slog"> <p>Learning Never Stops</p></div>
    </div>

    <div id="title">
         <h2> <a href="admin/index.php">CAVEONTECH</a></h2>
    </div>

    <div id="menu"> 
        <h2><i class="fa fa-navicon"></i></h2>
        <?php  include("inc/cat_menu.php") ?>
    </div>

 
    <div id="head_search">
        <form method="post" enctype="multipart/form-data">
            <input type="search" name="query" placeholder="Search Courses from here" required/>
            <button name="search_btn"><i class="fa fa-search" style="font-size:20px"></i></button>
        </form>
    </div>

    <div id="head_cart">
        <a href="cart.php"><i class="fa fa-cart-plus"></i> <?php echo cart_count() ?></a>
    </div>

    <div id="head_login">
        <p>
        <i class="fa fa-user" family: "Lucida Console", Courier, monospace;></i>
        <span> Login </span>
        </p>
            <form  method="post" enctype="multipart/form-data">
                <center>
                    <h3><i class="fa fa-user-circle-o" style="font-size:40px"></i></h3>
                    <h4>Login</h4>
                </center>
                    <div id="input_f">
                        <i class="fa fa-envelope" style="font-size:17px"></i>
                        <input type="text" name="u_email" placeholder="Enter User Email" required>
                    </div>
                    <div id="input_f">
                        <i class="fa fa-lock" style="font-size:24px"></i>
                        <input type="password" name="u_pass" placeholder="Enter User Password" required>
                    </div>
                    <h5> Forget Password? </h5><br clear="All"/>
                <center> <button name="u_login">Login</button> </center>     
            </form>  
    </div>



    <div id="head_signup">
        <p>
        <i class="fa fa-user-plus" font-family: "Lucida Console", Courier, monospace;></i> 
        <span> SignUp </span>
        </p>
            <form method="post"enctype="multipart/form-data">
                <center>
                    <h3><i class="fa fa-user-plus" style="font-size:40px;"></i></h3>
                    <h4>Sign Up</h4>
                </center>
                <div id="input_f">
                    <i class="fa fa-user" style="font-size:22px"></i>
                    <input type="text" name="u_name" placeholder="Enter Your Name" required>
                </div>
                <div id="input_f">
                    <i class="fa fa-envelope" style="font-size:20px"></i>
                    <input type="text" name="u_email" placeholder="Enter Your Email" required>
                </div>
                <div id="input_f">
                    <i class="fa fa-phone" style="font-size:24px"></i>
                    <input type="text" name="u_phone" placeholder="Enter Your Phone No." required>
                </div>
                <div id="input_f">
                    <i class="fa fa-lock" style="font-size:24px"></i>
                    <input type="password" name="u_pass1" placeholder="Enter Your Password" required>
                </div>
                <div id="input_f">
                    <i class="fa fa-eye" style="font-size:24px"></i>
                    <input type="password" name="u_pass2" placeholder="ReEnter User Password" required>
                </div>
                <br clear="All"/>
            <center><button name="u_signup"> Sign Up</button></center> 
        </form>
    </div>
</div>
 <?php
 include("inc/db1.php");
if(isset($_POST['search_btn'])){
    session_start();
    $_SESSION['filterCourse']=true;
    $_SESSION['searchCourse']=$_POST['query'];
    
}
?> 



<!--
Child is also a part of a parent so if we are styling the parent 
the same goes for the child as well if the parent gets styled from the
top of the document then the child is also styled from the top of the
document.
Here in our case, up_head section of the header has overlapped header section.
Note that the child section always overlaps the parent or they come over the parent 
in html css.
-->