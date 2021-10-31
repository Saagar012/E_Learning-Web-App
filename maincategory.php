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
    <?php
// function getIp()
// {
//         $ip = $_SERVER['REMOTE_ADDR'];

//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }

//     return $ip;
// }

    ?>
        <?php 
    //     include("inc/db1.php");
    //     // $ip = getIp();
    //      $get_cart = $con->prepare("select * from courses where ip_add='$ip' ");
    //     // $get_cart->setFetchMode(PDO::FETCH_ASSOC);
    //      //$get_cart->execute();
    //      $cart_empty=$get_cart->rowCount();
    //      if($cart_empty==0){
    //          echo"
    //          <div id='crumb'>
    //          <span><a href='index1.php'>Home</a></span> <b>></b>
    //          <span> My Cart</span>
    //          </div> <br clear='All'/>
    //          <h1 style='position:relative;margin-top: 35px;margin-left: 35%;'> No Courses are added </h1> <br clear='All'/>";
    //         //  include("inc/header1.php");
    //          include("inc/footer.php");
    //      }
    //    else{
        include("inc/header1.php");
        include("inc/db1.php");
        $cat_id=$_GET['cat_edit'];
        $get_cat = $con->prepare("select * from courses where cat_id=$cat_id");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $rowCount=$get_cat->rowCount();
        $row = $get_cat->fetch();
        
        $get_cat1 = $con->prepare("select * from cat where cat_id=$cat_id");
        $get_cat1->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat1->execute();
        $row1 = $get_cat1->fetch();

        $get_subcat = $con->prepare("select * from sub_cat where cat_id=$cat_id");
        $get_subcat->setFetchMode(PDO::FETCH_ASSOC);
        $get_subcat->execute();
        $row2 = $get_subcat->fetch();


        echo '
        <div id="wrap">
            <div id="maincategory_l">
            <h1>Category</h1>
            <ul>
            <b style="font-size:15px">
                <li>' . $row1["cat_icon"] . ' <a href="#" style="font-size:17px; margin-left:3px">' . $row1['cat_name'] . ' </a>('.$rowCount.')</li></b>
                <!-- <li><a href="#"><i class="fa fa-user-circle-o" style="font-size:20px"></i> Change Password</a></li>
                <li><a href="#"><i class="fa fa-user-circle-o" style="font-size:20px"></i> My Courses</a></li> -->

            </ul>
            <h1>Sub Category</h1>
           
            <ul>
                <li><a href="#"><i class="fa fa-circle-thin" aria-hidden="true"></i>' . $row2['sub_cat_name'] . '</a></li>

                <!-- <li><a href="#"><i class="fa fa-user-circle-o" style="font-size:20px"></i> Change Password</a></li>
                <li><a href="#"><i class="fa fa-user-circle-o" style="font-size:20px"></i> My Courses</a></li> -->

            </ul>
        
            </div>
            <div id="crumb2">
                <span><a href="index1.php" style="color: cornflowerblue;
                font-size: 20px;">Home</a></span> <b>></b>
                <span style="font-size: 19px;"> Profile</span>
                <!-- <h2> Web Development</h2>  -->
            </div>
            <div id="dash1">
            <h1> ' . $row1['cat_name'] . '</h1>
            <form method="post">
                <div id="c_form1">
                <input type="text" name="c_name" placeholder="Enter Course Name Here"/>
                <button name="addcourse">Search Course</button>
                </div>
            </form><br clear="All"/>
        ';?>
            <div id="maincategory_r">
            <?php   
                include("inc/top_course1.php");
            ?>
            </div>
            <?php
                include("inc/footer1.php");
      // }
            ?>
        </div>
    </body>
</html>