<?php
session_start();

if ( isset($_SESSION["loggedin"])) {
    // echo "<h2> Please Checkout to Proceed.</h2>";
    //echo $_SESSION['email'];
    // echo  $_SESSION['u_pass'];
    //echo  $_SESSION['loggedin'];
} else {
    echo "<script>  alert(' You are not logged in. Please login to CheckOut') </script>";
    echo "<script> location.href='http://localhost/e_learning/index1.php' </script>";
}

if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
    echo "<script> location.href='http://localhost/e_learning/index1.php' </script>";
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Payment CheckOut </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            text-decoration: none;
            font-family: 'Josefin Sans', sans-serif;
        }

        Body {
            /* font-family: Calibri, Helvetica, sans-serif; */
            /* background-color: #4baebe; */
            background-image:url('imgs/slider/13.jpg');
        }

        .wrappers {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 350px;
        }

        .wrappers .checkout_wrapper {
            width: 100%;
            height: 110%;
            display: flex;
        }

        .wrappers .checkout_wrapper .product_info {
            width: 45%;
            background: #e85c4d;
            border-top-left-radius: 20px;
            position: relative;

        }

        .wrappers .checkout_wrapper .product_info img {
            width: 225px;
            margin-top: 40px;
            /* margin-left: 5px; */
        }

        .wrappers .checkout_wrapper .product_info .content {
            text-align: center;
            margin-top: 25px;
            color: #fff;
            text-transform: uppercase;
        }

        .wrappers .checkout_wrapper .product_info .content h3 {
            font-size: 18px;
            line-height: 18px;
            letter-spacing: 3px;
        }

        .wrappers .checkout_wrapper .checkout_form {
            width: 100%;
            background: #fff;
            /* border-top-right-radius: 20px;
        border-bottom-right-radius: 20px; */
            padding: 50px 30px;
            height: 100%;
        }

        .wrappers .checkout_wrapper .checkout_form p {
            font-size: 25px;
            text-transform: uppercase;
            margin-top: 25px;
        }

        .wrappers .checkout_wrapper .checkout_form .section input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #dddddd;

        }

        .wrappers .checkout_wrapper .checkout_form .section input[type="text"]:focus {
            border-color: #e85c4d;
        }

        .wrappers .checkout_wrapper .checkout_form .last_section {
            display: flex;
        }

        /* .wrappers .checkout_wrapper .checkout_form .last_section .item{
        width: 50%;
    } */
        .wrappers .checkout_wrapper .checkout_form button {
            background: #e85c4d;
            padding: 10px;
            border-radius: 25px;
            text-align: center;
            margin-top: 17px;
          
        }

        .wrappers .checkout_wrapper .checkout_form button:hover {
            
        letter-spacing: 2px;
        display: block;
        cursor: pointer; 
        background: #dddddd;
        color: red;

        }


        button {
            background-color: #4CAF50;
            width: 100%;
            color: white;
            font-weight: bold;
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
        }

        

        button:hover {
            opacity: 0.7;
            /* color: black; */
        }

        .container {
            margin-top: 6px;
            padding: 25px;
            /* background-color: lightblue; */
            /* border: 3px solid wheat; */
        }
    </style>
</head>

<body>
    <div class="wrappers">
        <div class="checkout_wrapper">
            <div class="product_info">
                <img src="/e_learning/imgs/courses/8.jpg" alt="">
                <div class="content">
                    <h3> Courses <br />CheckOut</h3>
                    <p> Fill In the details</p>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="checkout_form">
                    <p> Payment Section</p>
                    <div class="details">
                        <div class="section">
                            <input type="text" name="cardNo" placeholder="Card Number">
                        </div>
                        <div class="section">
                            <input type="text" name="cardHolderName" placeholder="Cardholder Name">
                        </div>
                        <div class="section last_section">
                            <div class="item">
                                <input type="text" name="expDate" placeholder="Expiry date">
                            </div>
                            <div class="item">
                                <input type="text" name="CVV" placeholder="CVV">
                            </div>
                        </div>
                        <button name="makePayment">Pay</button>
                        <!-- <div class="btn" name= "makePayment">Pay </div> -->
                        <?php
                       // include("inc/function1.php");
                        echo checkout();
                        ?>

                    </div>
                </div>
            </form>
        </div>

    </div>
    

    <?php
    function getIp()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
    
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    
        return $ip;
    }
    function checkout()
    {
        // echo checkout1();
        
        if(isset($_POST['makePayment'])){
            $cardNo = $_POST['cardNo'];
            $cardHolder = $_POST['cardHolderName'];
            $expDate=$_POST['expDate'];
            $CVV=$_POST['CVV'];

            if($cardNo=="9816190656" && $cardHolder=="Saagar"&& $expDate=="1/10/2021" && $CVV=="656" ){
                $_SESSION['cardHolder']=$cardHolder;
                $_SESSION['cardNo']=$cardNo;
                $_SESSION['expDate']=$expDate;
                $_SESSION['CVV']=$CVV;
                $_SESSION['payment'] = true;
                  
                include("inc/db1.php");
                $ip = getIp();
                $get_cart_item = $con->prepare("select * from cart where ip_add='$ip'");
                $get_cart_item->setFetchMode(PDO::FETCH_ASSOC);
                $get_cart_item->execute();
                // $count_cart = $get_cart_item->rowCount();
                while($row1 = $get_cart_item->fetch()){
                $id1= $row1['c_id'];
                $up = $con->prepare("update courses set payment_status='True' where c_id='$id1'");
                $up->execute();
                }
                echo "<script>  alert('Payment Successful') </script>"; 
                echo "<script>window.open('/e_learning/index1.php','_self')</script>";
                //echo course_details();

                
            }
        else{
            echo "<script>  alert('Invalid Payment Details.') </script>";
        }

        }

   }
    ?>

    <form action="" method="POST">
        <div class="container">
            <center>
                <!-- <h1> CheckOut Form </h1> -->
            </center>
            <!-- <input type="submit" value="Logout" name="logout"> </input> -->
        </div>
    </form>
</body>

</html>