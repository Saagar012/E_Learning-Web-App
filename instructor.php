<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin | Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/instructor_responsive.css" />
</head>

<body>
    <?php
    include("inc/header.php");
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
            <button>Submit </button>
        </div>
        <div id="c_edit_r">
            <?php echo instructor_edit(); ?>

        </div>
    </div>
    <?php
    // add_course();

    ?>
</body>

</html>