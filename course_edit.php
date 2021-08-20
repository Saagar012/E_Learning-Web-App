<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin | Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include("inc/header.php");
    ?>
    <div id="wrap">
        <div id="c_edit_l">
            <h1>Course Management</h1>
            <ul>
                <li><i class="fa fa-grav" style="font-size:20px"></i><a href="/e_learning/admin/titleImg.php"> Title and Image</a></li>
                <li><i class="fa fa-mortar-board" style="font-size:20px"></i><a href="/e_learning/admin/course_goal.php"> Course Goal</a></li>
                <li><i class="fa fa-navicon" style="font-size:20px"></i><a href="/e_learning/admin/course_details.php"> Course Details</a></li>
                <li><i class="fa fa-money" style="font-size:20px"></i><a href="/e_learning/admin/course_price.php"> Course Basic Information</a></li>
                <li><i class="fa fa-book" style="font-size:20px"></i><a href="/e_learning/admin/instructor.php"> Instructor</a></li>
            </ul>
            <button>Submit For Review</button>
        </div>
        <div id="c_edit_r">
        <?php
        echo " <div id='bodyright1'>
        <h3> OverView </h3>
    </div>"
        ?>

        </div>
    </div>
    <?php
    // add_course();

    ?>
</body>

</html>