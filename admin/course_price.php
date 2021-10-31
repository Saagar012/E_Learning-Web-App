<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/courseBasic_responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
     session_start();
     if (isset($_SESSION['adminLoggedIn'])) {
         if ($_SESSION['adminLoggedIn'] == true || isset($_SESSION['adminLoggedIn'])) {
    include("inc/header.php");
    include('inc/db.php');
    // if (isset($_POST['submit'])) {
    //     $itemArr = $_POST['name'];
    //     foreach ($itemArr as $list) {
    //         if ($list != '') {
    //             $sql = "insert into dynamic_field(name) values('$list')";
    //             $stmt = $con->prepare($sql);
    //             $stmt->execute();
    //         }
    //     }  
    //}

    ?>
    <?php
    include("inc/db1.php");
    // when someone clicks on the button whose name is add_cat
    $get_course = $con->prepare("select * from courses ORDER BY c_id DESC LIMIT 1");
    // the below sets the fetch mode  in the form of array.
    // even though the whole table is returned but in the form of array.
    $get_course->setFetchMode(PDO::FETCH_ASSOC);
    $get_course->execute();
    $row = $get_course->fetch();
    $encrypt_1=$row['c_id'];
    $link="/e_learning/admin/titleImg.php?course_edit=".urlencode(base64_encode($encrypt_1));
    $link1="/e_learning/admin/course_details.php?course_edit=".urlencode(base64_encode($encrypt_1));
    $link2="/e_learning/admin/course_goal.php?course_edit=".urlencode(base64_encode($encrypt_1));
    $link3="/e_learning/admin/course_price.php?course_edit=".urlencode(base64_encode($encrypt_1));
    $link4="/e_learning/admin/instructor.php?course_edit=".urlencode(base64_encode($encrypt_1));
    ?>

    <div id="wrap">
        <div id="c_edit_l">
            <h1>Course Management</h1>
            <ul>
                <li><i class="fa fa-grav" style="font-size:20px"></i><a href="<?=$link;?>"> Title and Image</a></li>
                <li><i class="fa fa-mortar-board" style="font-size:20px"></i><a href="<?=$link2;?>"> Course Goal</a></li>
                <li><i class="fa fa-navicon" style="font-size:20px"></i><a href="<?=$link1;?>"> Course Details</a></li>
                <li><i class="fa fa-money" style="font-size:20px"></i><a href="<?=$link3;?>"> Course Basic Information</a></li>
                <li><i class="fa fa-book" style="font-size:20px"></i><a href="<?=$link4;?>"> Instructor</a></li>
            </ul>
            <button>Submit For Review</button>
        </div>
        <div id="c_price">
            <p>Select price of your course below and click 'Save'. Once Selected you will be able to create instructor
                coupons based on your selected price. To create a free course, select a price of free.
            </p>
            <h2>Price and Policy</h2>
            <form method="post" enctype="multipart/form-data">
                <div id="course_price">
                    <center>
                        <select name="language" id="language">
                            <option value=""> Select Language </option>
                            <!-- <option value="English">English</option>
                            <option value="Nepali">Nepali</option> -->
                            <?php echo select_lang() ?>
                        </select>
                        <select name="levels" id="levels">
                            <option value=""> Select Level </option>
                            <option value="All Level">All Level</option>
                            <option value="Begineer Level">Begineer Level</option>
                            <option value="Intermediate Level">Intermediate Level</option>
                            <option value="Expert Level">Expert Level</option>
                        </select>
                        <select name="category1" id="category">
                            <option value=""> Select Category </option>
                            <!-- <option value="volvo">Coding</option>
                            <option value="saab">Business</option>
                            <option value="opel">Design</option>
                            <option value="audi">Sales</option>
                            <option value="audi">Marketing</option> -->
                            <?php echo select_cat() ?>
                        </select>
                        <!-- <input type="text" name="sub_cat_name" placeholder="Enter Sub Category Name" required/> -->
                        <select name="subcategory" id="category">
                        <option value=""> Select SubCategory  </option>
                            <!-- <option value="Advertisement">Advertisement</option>  -->
                            <?php echo select_sub_cat1() ?>
                        </select>
                        <!-- <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Photoshop">Photoshop</option>
                            <option value="Enterpreneurship">Enterpreneurship</option>
                            <option value="Branding">Branding</option>
                            <option value="Wordpress">Wordpress</option> 
                            <option value="Illustrator">Illustrator</option>
                         </select>    -->

                    </center>

                    <button name="btn_cat"> Save</button>
                </div>

                <h2> Upload Video</h2>
                <input id="upload_video" type="text" name="title" placeholder="Enter the Title of the Lecture"/>
                <input id="c_video" class="form-control" type="file" name="file" />
                <input id="video_details" type="submit" name="upload" value="Upload">

                <?php
                echo update_category();
    }
}
else{
    header("location: /e_learning/admin/Admin_login.php");
}
                ?>

        </div>
        </form>

    <!-- </div> -->
    <!-- <form method="post"> -->
        <!-- <div id="wrap"> -->
            <!-- <div class="my_box"> -->
                <!-- <input id="upload_video" type="textbox" name="name[]" placeholder="Enter the Title of the Lecture" />  -->
                <!-- <div class="field_box"><input type="textbox" name="title" placeholder="Enter the Title of the Lecture" id="upload_video"></div> -->
                <!-- <input id="c_video" class="form-control" type="file" name="file" /> -->
                <!-- <div class="button_box"><input type="button" style="margin-top:15%" name="add_btn" value="Add More" onclick="add_more()"></div> -->
                <!-- <input id="video_details" type="submit" name="upload" value="Upload"> -->
                <!-- <input type="hidden" id="box_count" value="1"> -->
                <?php
                // echo update_category();
                ?>
            <!-- </div> -->
        <!-- </div> -->
        <!-- <input type="submit" style="margin-left: 49%;" value="Add Record" name="submit"> -->


    <!-- </form> -->
    <!-- <style>
        .my_box {
            width: 100%;
            padding-bottom: 36px;
        }

        .field_box {
            margin-left: 35%;
            width: 80%;
        }

        .button_box {
            margin-left: 49%;
        }
    </style> -->
    <!-- <script src="jquery-1.4.1.min.js"></script> -->
    <!-- <script>
        function add_more() {
            var box_count = jQuery("#box_count").val();
            box_count++;
            jQuery("#box_count").val(box_count);
            jQuery("#wrap").append('<div class="my_box" id="box_loop_' + box_count + '"><div class="field_box"><input type="textbox" name="title" id="upload_video' + box_count + '" placeholder="Enter the Title of the Lecture" ></div> <input id="c_video' + box_count + '" class="form-control" type="file" name="file" /> <div class="button_box"> <input type="button" style="margin-top: 8%;" name="submit" id="submit" value="Remove" onclick=remove_more("' + box_count + '")></div></div>');
        }

        function remove_more(box_count) {
            jQuery("#box_loop_" + box_count).remove();
            var box_count = jQuery("#box_count").val();
            box_count--;
            jQuery("#box_count").val(box_count);
        }
    </script> -->

    <?php
    //echo update_category();
    ?>
</body>

</html>