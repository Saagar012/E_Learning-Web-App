<?php
include("inc/db1.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin_css.css">
</head>

<body>
    <div class="login-form">
        <h2> ADMIN-LOGIN</h2>
        <form method="POST">
            <div class="input-field">
                <i class="fa fa-user"></i>
                <input type="text" placeholder="UserName" name="adminName">
            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Password" name="adminPass">
            </div>
            <button type="submit" name="login"> Log In</button>
            <div class="extra">
                <a href="#"> Forgot Password ?</a>
                <!-- <a href="#">Create an Account</a> -->
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['login'])){
        // echo 'Clicked';
        $name = $_POST["adminName"];
        $pass = $_POST["adminPass"];
        $sql = $con->prepare("SELECT COUNT(*) total FROM admin_login WHERE admin_name= '$name' AND admin_pass= '$pass'");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        
        $count = $row['total'];
        if ($count == 1) {
        session_start();
        $_SESSION['adminLoggedIn']=true;
        $_SESSION['AdminLoginId']=$_POST['adminName'];
        echo "<script>  alert(' Login SucessFul')</script>";
        header("location: /e_learning/admin/");
        // echo "correct";
        }
    else{
        echo "<script>  alert('Invalid Credentials')</script>";
       
    }
}
    ?>
</body>
</html>