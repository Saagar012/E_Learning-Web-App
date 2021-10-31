<!--
This is the index file for the user side page or the first page, user sees in the screen.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E Learning | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style1.css"/>
        <link rel="stylesheet" href="css/phone.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="inc/js/sweetalert.js"></script>    
    </head>
    <body>
        <?php include("inc/header1.php");
         echo u_signup();
         echo u_login();
        
        ?>
        <div id="wrap">
            <?php
            // session_start();
            
                include("inc/slider.php");
                //The below home_cat.php file is made to create the user side category section.
                include("inc/home_cat.php");
                //The below top_course.php file is created for the course section in the user part.
                include("inc/top_course.php");
                include("inc/footer.php");

            ?>
        </div>
    </body>
</html>