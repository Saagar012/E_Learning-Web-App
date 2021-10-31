<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E Learning | Home</title>
        <link rel="stylesheet" href="css/style1.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php include("inc/header1.php");
        ?>
        <div id="wrap">
        <div id="crumb">
        <span><a href="index.php">Home</a></span> <b>></b>
            <span> My Cart</span>
        </div>
        <div id="dash">
            <h1> Instructor Dashboard</h1>
            <form method="post">
                <div id="c_form">
                <input type="text" name="c_name" placeholder="Enter Course Name Here"/>
                <button name="addcourse">Create Course</button>
                </div>
            </form><br clear="All"/>
            <table cellspacing="0">
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th>Course Type</th>
                    <th>Course Price</th>
                    <th>Course Status</th>
                    <th>Enrolled By</th>
                    <th>Total Earn</th>
                </tr>
                <tr>
                    <td><a href="#"><img src="imgs/courses/6.jpg"/></a></td>
                    <td>
                    <span>
                       <a href="#">Web Development tutorial for Beginner.</a>
                    </span></br>
                    <a href="#"> Edit</a>
                    </td>
                    <td>Paid</td>
                    <td>$0</td>
                    <td>Unpublish</td>
                    <td>0</td>
                    <td>$0</td>
                </tr>
                <tr>
                <td><a href="#"><img src="imgs/courses/6.jpg"/></a></td>
                    <td>
                    <span>
                       <a href="#">Web Development tutorial for Beginner.</a>
                    </span></br>
                    <a href="#"> Edit</a>
                    </td>
                    <td>Paid</td>
                    <td>$0</td>
                    <td>Unpublish</td>
                    <td>0</td>
                    <td>$0</td>
                </tr>

            </table>
        </div> 
        <?php
              
             include("inc/footer.php");
        ?>
        </div>
    </body>
</html>