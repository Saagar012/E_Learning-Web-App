<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E Learning | CourseDetails</title>
        <link rel="stylesheet" href="css/style1.css"/>
        <link rel="stylesheet" href="css/courseResponsive.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php 
        include("inc/header1.php");
        ?>
    
        <div id="wrap">
            <?php
                echo array_course();
                // echo course_details();
                include("inc/footer.php");
                echo add_cart();
            ?>
        </div>
<!--       
        <video controls playsinline id="player" width="100%">
        <script type="text/javascript">
        document.getElementById('trailer').onclick = function () {
            document.getElementById('trailer').onclick = function () {
            document.getElementById("player").style.display = "block";
            video.setAttribute('src', 'trailer.mp4');
            video.play();
          }
        }
        document.getElementById("player").style.display = "none";
          </script> -->
    </body>
</html>