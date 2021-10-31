<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E Learning | Home</title>
        <link rel="stylesheet" href="css/style1.css"/>
        <link rel="stylesheet" href="css/cart_responsive.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php 
       
            include("inc/header1.php");
            echo cart();
            echo u_signup();
            echo u_login();
            include("inc/footer.php");
        
       
        ?>
    </body>
</html>