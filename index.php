<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin | Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/index_responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['adminLoggedIn'])) {
        if ($_SESSION['adminLoggedIn'] == true || isset($_SESSION['adminLoggedIn'])) {
            include("inc/header.php");
            include("inc/bodyleft.php");
            include("inc/bodyright.php");
        }
       
    }
    else{
        header("location: /e_learning/admin/Admin_login.php");
    }
    ?>
</body>

</html>