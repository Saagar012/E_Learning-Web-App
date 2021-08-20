<?php
session_start();
?>
<?php

// function checkout1()
// {
//     // echo checkout1();
//     if(isset($_POST['makePayment'])){
//         $cardNo = $_POST['cardNo'];
//         $cardHolder = $_POST['cardHolderName'];
//         $expDate=$_POST['expDate'];
//         $CVV=$_POST['CVV'];

//         if($cardNo=="9816190656" && $cardHolder=="Saagar"&& $expDate=="1/10/2021" && $CVV=="656" ){
//             $_SESSION['cardHolder']=$cardHolder;
//             $_SESSION['cardNo']=$cardNo;
//             $_SESSION['expDate']=$expDate;
//             $_SESSION['CVV']=$CVV;
//             $_SESSION['payment'] = true;
//             echo "<script>  alert('Payment Successful') </script>";
//             echo "<script>window.open('/e_learning/index1.php','_self')</script>";
//             //echo course_details();
//         }
//     else{
//         echo "<script>  alert('Invalid Payment Details.') </script>";
//     }

//     }

// }

function array_course()
{
    try {
        include("inc/db1.php");
        // $id = $_GET['course_edit'];


        foreach ($_GET as $key => $data) {
            $id = $_GET[$key] = base64_decode(urldecode($data));
        }
        $get_relatedCourses = $con->prepare("select * from courses where not c_id=$id  LIMIT 3");
        $get_relatedCourses->setFetchMode(PDO::FETCH_ASSOC);
        $get_relatedCourses->execute();


        $get_cat = $con->prepare("select * from courses where c_id=$id");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();

        $ip = getIp();
        $get_cart_item = $con->prepare("select * from courses where payment_status='True'");
        $get_cart_item->setFetchMode(PDO::FETCH_ASSOC);
        $get_cart_item->execute();
        $count_cart = $get_cart_item->rowCount();
        $num = 0;
        // $row1 = $get_cart_item->fetch();

        $cart = array();

        while ($row1 = $get_cart_item->fetch()) {

            array_push($cart, $row1['c_id']);
        }
        //  $cart = array('782', '783');
        try {
            if (isset($_SESSION['payment']) && $id == in_array("$id", $cart)) {
                if ($_SESSION['payment'] == true || isset($_SESSION['payment'])) {

                    echo '<div id="crumb">
    <span><a href="index1.php">Home</a></span> <b>></b>
    <span> My Cart</span>
</div>
<div id="course_left">

    <img src="imgs/courses/' . $row['course_img'] . '"/>
    <div id="course_share">
        <center>
        <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i> Facebook</button></a>
        <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i> Twitter</button></a>
        <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i> Linkedin</button></a>
        <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i> WhatsApp</button></a>
        </center>
    </div>
</div>
<div id="course_right">
    <h2>' . $row['c_name'] . '  </h2>
    <table> 
        <tr> 
            <td> Instructor</td>
            <td> ' . $row['instructor'] . '</td>
        </tr>
        <tr> 
            <td> Enrolled Students</td>
            <td> 100</td>
        </tr>
        <tr> 
            <td> Level</td>
            <td> Beginner</td>
        </tr>
        <tr> 
            <td> Language</td>
            <td> Engish</td>
        </tr>
        <tr> 
            <td> Lectures</td>
            <td> 20</td>
        </tr>
    </table>
    <div id="price">
        <h3> Price: $' . ((int)$row['price'] - (int)$row['discount'] / 100 * $row['price']) . ' <span> $' . $row['price'] . '</span> <b> ' . $row['discount'] . ' % </b>  Saving $' . $row['discount'] / 100 * $row['price'] . '    </h3>
    </div>
    <form method="post"> 
        <input type="hidden" value="1" name="course_id" />
        <button id="b1" name="cart_btn"> <i class="fa fa-cart-plus" style="font-size:24px"></i> Add to Cart </button>
        <a href="#">  <button id="b2" name="buyNow"> <i class="fa fa-bolt" style="font-size:24px"></i> Buy Now </button></a>
    </form>
</div><br clear="All"/>
<div id="c_desc">
    <h2> Course Details</h2>
    <p> 
    ' . $row['course_desc'] . '
    </p>
    <h2> What will I learn? </h2>
    <p> ' . $row['after_course'] . ' </p>
    <h2> Before Starting</h2>
    <p> ' . $row['before_course'] . ' </p>
    <h2> Instructor </h2>
    <div id="ins_image">
        <img src="imgs/instructor/' . $row['inst_image'] . '"/>
    </div>
    <p>' . $row['about_inst'] . ' </p>
    <div id="course_share">
        <center>
            <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i></button></a>
            <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i></button></a>
            <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i></button></a>
            <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i></button></a>
        </center>
    </div><br clear="All"/>
        <h2> Curriculum </h2>
    <form method="post">
    <ul>
        <li><i class="fa fa-video-camera" id="trailer" style="font-size:20px"></i><span> 1.  ' . $row['course_title'] . ' </span>
        </li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Watch Intro</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 2. Quick OverView </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Quick OverView</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 3. Importance of Communication </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Brief Explanation</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 4. Connection With Database </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Database and Storage</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 5. Effects on other Sectors </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;margin-bottom: 7%;
        background: whitesmoke;font-family: cursive;"> Digital marketing and its Influence</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
    </ul>
    </form>
</div>
    <div id="c_rel">
        <h2> Related Courses</h2>';
                    while ($row12 = $get_relatedCourses->fetch()) {
                        $encrypt_12 = $row12['c_id'];
                        $link = "course_details.php?course_edit=" . urlencode(base64_encode($encrypt_12));
                        echo '<ul>
         <li>    
             <a href="' . $link . '">
             <img src="imgs/courses/' . $row12['course_img'] . '"/>
             <p>' . $row12['c_name'] . '</p>
             </a>
         </li><br clear="All"/>
     </ul>';
                    }
                    echo '   
    </div><br clear="All"/>
';
                } else {
                    echo '<div id="crumb">
                <span><a href="index1.php">Home</a></span> <b>></b>
                <span> My Cart</span>
            </div>
            <div id="course_left">
  
                <img src="imgs/courses/' . $row['course_img'] . '"/>
                <div id="course_share">
                    <center>
                    <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i> Facebook</button></a>
                    <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i> Twitter</button></a>
                    <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i> Linkedin</button></a>
                    <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i> WhatsApp</button></a>
                    </center>
                </div>
            </div>
            <div id="course_right">
                <h2>' . $row['c_name'] . '  </h2>
                <table> 
                    <tr> 
                        <td> Instructor</td>
                        <td> ' . $row['instructor'] . '</td>
                    </tr>
                    <tr> 
                        <td> Enrolled Students</td>
                        <td> 100</td>
                    </tr>
                    <tr> 
                        <td> Level</td>
                        <td> Beginner</td>
                    </tr>
                    <tr> 
                        <td> Language</td>
                        <td> Engish</td>
                    </tr>
                    <tr> 
                        <td> Lectures</td>
                        <td> 20</td>
                    </tr>
                </table>
                <div id="price">
                    <h3> Price: $' . ((int)$row['price'] - (int)$row['discount'] / 100 * $row['price']) . ' <span> $' . $row['price'] . '</span> <b> ' . $row['discount'] . ' % </b>  Saving $' . $row['discount'] / 100 * $row['price'] . '    </h3>
                </div>
                <form method="post"> 
                    <input type="hidden" value="1" name="course_id" />
                    <button id="b1" name="cart_btn"> <i class="fa fa-cart-plus" style="font-size:24px"></i> Add to Cart </button>
                    <a href="#">   <button id="b2" name="buyNow"> <i class="fa fa-bolt" style="font-size:24px"></i> Buy Now </button></a>
                </form>
            </div><br clear="All"/>
            <div id="c_desc">
                <h2> Course Details</h2>
                <p> 
                ' . $row['course_desc'] . '
                </p>
                <h2> What will I learn? </h2>
                <p> ' . $row['after_course'] . ' </p>
                <h2> Before Starting</h2>
                <p> ' . $row['before_course'] . ' </p>
                <h2> Instructor </h2>
                <div id="ins_image">
                    <img src="imgs/instructor/' . $row['inst_image'] . '"/>
                </div>
                <p>' . $row['about_inst'] . ' </p>
                <div id="course_share">
                    <center>
                        <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i></button></a>
                        <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i></button></a>
                        <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i></button></a>
                        <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i></button></a>
                    </center>
                </div><br clear="All"/>
                    <h2> Curriculum </h2>
                <form method="post">
                <ul>
                    <li><i class="fa fa-video-camera" id="trailer" style="font-size:20px"></i><span> 1. ' . $row['course_title'] . ' </span>
                    </li>
                    <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
                    padding: 3px 3px 3px 3px;
                    background: whitesmoke;font-family: cursive;"> Watch Intro</summary>
                        <video width="500" height="350" controls style="outline:none; margin-top:-4%">
                        <source src="' . $row["video"] . '" type="video/mp4">
                        </video>
                    </details>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 2. Quick OverView </span></li>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 3. Creating Important Folders </span></li>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 4. Connection With Database </span></li>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 5. Designing HomePage </span></li>
                </ul>
                </form>
            </div>
                <div id="c_rel">
                    <h2> Related Courses</h2>';
                    while ($row12 = $get_relatedCourses->fetch()) {
                        $encrypt_13 = $row12['c_id'];
                        $link1 = "course_details.php?course_edit=" . urlencode(base64_encode($encrypt_13));
                        echo '<ul>
                        <li>    
                            <a href="' . $link1 . '">
                            <img src="imgs/courses/' . $row12['course_img'] . '"/>
                            <p>' . $row12['c_name'] . '</p>
                            </a>
                        </li><br clear="All"/>
                    </ul>';
                    }
                    echo '   
                   </div><br clear="All"/>
               ';
                }
            } else {
                echo '<div id="crumb">
                        <span><a href="index1.php">Home</a></span> <b>></b>
                        <span> My Cart</span>
                    </div>
                    <div id="course_left">
          
                        <img src="imgs/courses/' . $row['course_img'] . '"/>
                        <div id="course_share">
                            <center>
                            <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i> Facebook</button></a>
                            <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i> Twitter</button></a>
                            <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i> Linkedin</button></a>
                            <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i> WhatsApp</button></a>
                            </center>
                        </div>
                    </div>
                    <div id="course_right">
                        <h2>' . $row['c_name'] . '  </h2>
                        <table> 
                            <tr> 
                                <td> Instructor</td>
                                <td> ' . $row['instructor'] . '</td>
                            </tr>
                            <tr> 
                                <td> Enrolled Students</td>
                                <td> 100</td>
                            </tr>
                            <tr> 
                                <td> Level</td>
                                <td> Beginner</td>
                            </tr>
                            <tr> 
                                <td> Language</td>
                                <td> Engish</td>
                            </tr>
                            <tr> 
                                <td> Lectures</td>
                                <td> 20</td>
                            </tr>
                        </table>
                        <div id="price">
                            <h3> Price: $' . ((int)$row['price'] - (int)$row['discount'] / 100 * $row['price']) . ' <span> $' . $row['price'] . '</span> <b> ' . $row['discount'] . ' % </b>  Saving $' . $row['discount'] / 100 * $row['price'] . '    </h3>
                        </div>
                        <form method="post"> 
                            <input type="hidden" value="1" name="course_id" />
                            <button id="b1" name="cart_btn"> <i class="fa fa-cart-plus" style="font-size:24px"></i> Add to Cart </button>
                            <a href="#">   <button id="b2" name="buyNow"> <i class="fa fa-bolt" style="font-size:24px"></i> Buy Now </button></a>
                        </form>
                    </div><br clear="All"/>
                    <div id="c_desc">
                        <h2> Course Details</h2>
                        <p> 
                        ' . $row['course_desc'] . '
                        </p>
                        <h2> What will I learn? </h2>
                        <p> ' . $row['after_course'] . ' </p>
                        <h2> Before Starting</h2>
                        <p> ' . $row['before_course'] . ' </p>
                        <h2> Instructor </h2>
                        <div id="ins_image">
                            <img src="imgs/instructor/' . $row['inst_image'] . '"/>
                        </div>
                        <p>' . $row['about_inst'] . ' </p>
                        <div id="course_share">
                            <center>
                                <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i></button></a>
                                <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i></button></a>
                                <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i></button></a>
                                <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i></button></a>
                            </center>
                        </div><br clear="All"/>
                            <h2> Curriculum </h2>
                        <form method="post">
                        <ul>
                            <li><i class="fa fa-video-camera" id="trailer" style="font-size:20px"></i><span> 1. ' . $row['course_title'] . ' </span>
                            </li>
                            <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
                            padding: 3px 3px 3px 3px;
                            background: whitesmoke;font-family: cursive;"> Watch Intro</summary>
                                <video width="500" height="350" controls style="outline:none; margin-top:-4%">
                                <source src="' . $row["video"] . '" type="video/mp4">
                                </video>
                            </details>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 2. Quick OverView </span></li>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 3. Creating Important Folders </span></li>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 4. Connection With Database </span></li>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 5. Designing HomePage </span></li>
                        </ul>
                        </form>
                    </div>
                        <div id="c_rel">
                            <h2> Related Courses</h2>';
                while ($row12 = $get_relatedCourses->fetch()) {
                    $encrypt_14 = $row12['c_id'];
                    $link2 = "course_details.php?course_edit=" . urlencode(base64_encode($encrypt_14));
                    echo '<ul>
                                <li>    
                                    <a href="' . $link2 . '">
                                    <img src="imgs/courses/' . $row12['course_img'] . '"/>
                                    <p>' . $row12['c_name'] . '</p>
                                    </a>
                                </li><br clear="All"/>
                            </ul>';
                }
                echo '   
                           </div><br clear="All"/>
                       ';
            }
        } catch (Exception $e) {
            header("Location: index.php?status=error");
            exit();
        }
    } catch (Exception $e) {
        header("Location: index.php?status=error");
        exit();
    }
}

if (isset($_POST['buyNow'])) {

    echo "<script> location.href='checkout.php' </script>";
}

function course_details()
{
    include("inc/db1.php");
    // $id = $_GET['course_edit'];
    foreach ($_GET as $key => $data) {
        $id = $_GET[$key] = base64_decode(urldecode($data));
    }
    $get_cat = $con->prepare("select * from courses where c_id=$id");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    $row = $get_cat->fetch();

    // $cart = array();
    // while($row = $get_cart_item->fetch()){

    //    array_push($cart,$row['c_id'] );
    // }
    // $ip = getIp();
    // // $get_cart_item = $con->prepare("select * from cart where ip_add='$ip'");
    // $get_cart_item = $con->prepare("select * from cart where ip_add='$ip'");
    // $get_cart_item->setFetchMode(PDO::FETCH_ASSOC);
    // $get_cart_item->execute();
    // // $count_cart = $get_cart_item->rowCount();
    // // $num = 0;

    // $cart = array();
    // while($row = $get_cart_item->fetch()){

    //    array_push($cart,$row['c_id'] );
    // }
    // j=0;
    // while($num < $count_cart){
    //     $courses_id=$row['c_id']; && $id==$courses_id

    //  <img src="imgs/courses/' . $row['course_img'] . '"/>
    // && $id==in_array("$id", $cart) 
    // && $id==in_array("$id", $cart)
    //  && $id==in_array("$id", $cart)
    $cart = array('782', '783');
    if (isset($_SESSION['payment']) && $id != in_array("$id", $cart)) {
        if ($_SESSION['payment'] == true || isset($_SESSION['payment'])) {

            echo '<div id="crumb">
    <span><a href="index1.php">Home</a></span> <b>></b>
    <span> My Cart</span>
</div>
<div id="course_left">

    <img src="imgs/courses/' . $row['course_img'] . '"/>
    <div id="course_share">
        <center>
        <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i> Facebook</button></a>
        <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i> Twitter</button></a>
        <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i> Linkedin</button></a>
        <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i> WhatsApp</button></a>
        </center>
    </div>
</div>
<div id="course_right">
    <h2>' . $row['c_name'] . '  </h2>
    <table> 
        <tr> 
            <td> Instructor</td>
            <td> ' . $row['instructor'] . '</td>
        </tr>
        <tr> 
            <td> Enrolled Students</td>
            <td> 100</td>
        </tr>
        <tr> 
            <td> Level</td>
            <td> Beginner</td>
        </tr>
        <tr> 
            <td> Language</td>
            <td> Engish</td>
        </tr>
        <tr> 
            <td> Lectures</td>
            <td> 20</td>
        </tr>
    </table>
    <div id="price">
        <h3> Price: $' . ((int)$row['price'] - (int)$row['discount'] / 100 * $row['price']) . ' <span> $' . $row['price'] . '</span> <b> ' . $row['discount'] . ' % </b>  Saving $' . $row['discount'] / 100 * $row['price'] . '    </h3>
    </div>
    <form method="post"> 
        <input type="hidden" value="1" name="course_id" />
        <button id="b1" name="cart_btn"> <i class="fa fa-cart-plus" style="font-size:24px"></i> Add to Cart </button>
        <a href="#">   <button id="b2"> <i class="fa fa-bolt" style="font-size:24px"></i> Buy Now </button></a>
    </form>
</div><br clear="All"/>
<div id="c_desc">
    <h2> Course Details</h2>
    <p> 
    ' . $row['course_desc'] . '
    </p>
    <h2> What will I learn? </h2>
    <p> ' . $row['after_course'] . ' </p>
    <h2> Before Starting</h2>
    <p> ' . $row['before_course'] . ' </p>
    <h2> Instructor </h2>
    <div id="ins_image">
        <img src="imgs/instructor/' . $row['inst_image'] . '"/>
    </div>
    <p>' . $row['about_inst'] . ' </p>
    <div id="course_share">
        <center>
            <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i></button></a>
            <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i></button></a>
            <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i></button></a>
            <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i></button></a>
        </center>
    </div><br clear="All"/>
        <h2> Curriculum </h2>
    <form method="post">
    <ul>
        <li><i class="fa fa-video-camera" id="trailer" style="font-size:20px"></i><span> 1.  ' . $row['course_title'] . ' </span>
        </li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Watch Intro</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 2. Quick OverView </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Quick OverView</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 3. Importance of Communication </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Brief Explanation</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 4. Connection With Database </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;
        background: whitesmoke;font-family: cursive;"> Database and Storage</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
        <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 5. Effects on other Sectors </span></li>
        <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
        padding: 3px 3px 3px 3px;margin-bottom: 7%;
        background: whitesmoke;font-family: cursive;"> Digital marketing and its Influence</summary>
            <video width="500" height="350" controls style="outline:none; margin-top:-4%">
            <source src="' . $row["video"] . '" type="video/mp4">
            </video>
        </details>
    </ul>
    </form>
</div>
    <div id="c_rel">
        <h2> Related Courses</h2>
        <ul>
            <li>    
                <a href="#">
                <img src="imgs/courses/2.jpg"/>
                <p>Digital Marketing With Social Medias</p>
                </a>
            </li><br clear="All"/>
            <li>    
                <a href="#">
                <img src="imgs/courses/4.jpg"/>
                <p>Android Development Tutorial For Beginners With Java</p>
                </a>
            </li><br clear="All"/>
            <li>    
                <a href="#">
                <img src="imgs/courses/7.jpg"/>
                <p>Web Development Tutorial For Beginners</p>
                </a>
            </li>

        </ul>
    </div><br clear="All"/>
';
        } else {
            echo '<div id="crumb">
                <span><a href="index1.php">Home</a></span> <b>></b>
                <span> My Cart</span>
            </div>
            <div id="course_left">
  
                <img src="imgs/courses/' . $row['course_img'] . '"/>
                <div id="course_share">
                    <center>
                    <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i> Facebook</button></a>
                    <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i> Twitter</button></a>
                    <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i> Linkedin</button></a>
                    <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i> WhatsApp</button></a>
                    </center>
                </div>
            </div>
            <div id="course_right">
                <h2>' . $row['c_name'] . '  </h2>
                <table> 
                    <tr> 
                        <td> Instructor</td>
                        <td> ' . $row['instructor'] . '</td>
                    </tr>
                    <tr> 
                        <td> Enrolled Students</td>
                        <td> 100</td>
                    </tr>
                    <tr> 
                        <td> Level</td>
                        <td> Beginner</td>
                    </tr>
                    <tr> 
                        <td> Language</td>
                        <td> Engish</td>
                    </tr>
                    <tr> 
                        <td> Lectures</td>
                        <td> 20</td>
                    </tr>
                </table>
                <div id="price">
                    <h3> Price: $' . ((int)$row['price'] - (int)$row['discount'] / 100 * $row['price']) . ' <span> $' . $row['price'] . '</span> <b> ' . $row['discount'] . ' % </b>  Saving $' . $row['discount'] / 100 * $row['price'] . '    </h3>
                </div>
                <form method="post"> 
                    <input type="hidden" value="1" name="course_id" />
                    <button id="b1" name="cart_btn"> <i class="fa fa-cart-plus" style="font-size:24px"></i> Add to Cart </button>
                    <a href="cart.php">   <button id="b2"> <i class="fa fa-bolt" style="font-size:24px"></i> Buy Now </button></a>
                </form>
            </div><br clear="All"/>
            <div id="c_desc">
                <h2> Course Details</h2>
                <p> 
                ' . $row['course_desc'] . '
                </p>
                <h2> What will I learn? </h2>
                <p> ' . $row['after_course'] . ' </p>
                <h2> Before Starting</h2>
                <p> ' . $row['before_course'] . ' </p>
                <h2> Instructor </h2>
                <div id="ins_image">
                    <img src="imgs/instructor/' . $row['inst_image'] . '"/>
                </div>
                <p>' . $row['about_inst'] . ' </p>
                <div id="course_share">
                    <center>
                        <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i></button></a>
                        <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i></button></a>
                        <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i></button></a>
                        <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i></button></a>
                    </center>
                </div><br clear="All"/>
                    <h2> Curriculum </h2>
                <form method="post">
                <ul>
                    <li><i class="fa fa-video-camera" id="trailer" style="font-size:20px"></i><span> 1. ' . $row['course_title'] . ' </span>
                    </li>
                    <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
                    padding: 3px 3px 3px 3px;
                    background: whitesmoke;font-family: cursive;"> Watch Intro</summary>
                        <video width="500" height="350" controls style="outline:none; margin-top:-4%">
                        <source src="' . $row["video"] . '" type="video/mp4">
                        </video>
                    </details>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 2. Quick OverView </span></li>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 3. Creating Important Folders </span></li>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 4. Connection With Database </span></li>
                    <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 5. Designing HomePage </span></li>
                </ul>
                </form>
            </div>
                <div id="c_rel">
                    <h2> Related Courses</h2>
                    <ul>
                        <li>    
                            <a href="#">
                            <img src="imgs/courses/2.jpg"/>
                            <p>Digital Marketing With Social Medias</p>
                            </a>
                        </li><br clear="All"/>
                        <li>    
                            <a href="#">
                            <img src="imgs/courses/4.jpg"/>
                            <p>Android Development Tutorial For Beginners With Java</p>
                            </a>
                        </li><br clear="All"/>
                        <li>    
                            <a href="#">
                            <img src="imgs/courses/7.jpg"/>
                            <p>Web Development Tutorial For Beginners</p>
                            </a>
                        </li>

                    </ul>
                </div><br clear="All"/>
            ';
        }
    } else {
        echo '<div id="crumb">
                        <span><a href="index1.php">Home</a></span> <b>></b>
                        <span> My Cart</span>
                    </div>
                    <div id="course_left">
          
                        <img src="imgs/courses/' . $row['course_img'] . '"/>
                        <div id="course_share">
                            <center>
                            <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i> Facebook</button></a>
                            <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i> Twitter</button></a>
                            <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i> Linkedin</button></a>
                            <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i> WhatsApp</button></a>
                            </center>
                        </div>
                    </div>
                    <div id="course_right">
                        <h2>' . $row['c_name'] . '  </h2>
                        <table> 
                            <tr> 
                                <td> Instructor</td>
                                <td> ' . $row['instructor'] . '</td>
                            </tr>
                            <tr> 
                                <td> Enrolled Students</td>
                                <td> 100</td>
                            </tr>
                            <tr> 
                                <td> Level</td>
                                <td> Beginner</td>
                            </tr>
                            <tr> 
                                <td> Language</td>
                                <td> Engish</td>
                            </tr>
                            <tr> 
                                <td> Lectures</td>
                                <td> 20</td>
                            </tr>
                        </table>
                        <div id="price">
                            <h3> Price: $' . ((int)$row['price'] - (int)$row['discount'] / 100 * $row['price']) . ' <span> $' . $row['price'] . '</span> <b> ' . $row['discount'] . ' % </b>  Saving $' . $row['discount'] / 100 * $row['price'] . '    </h3>
                        </div>
                        <form method="post"> 
                            <input type="hidden" value="1" name="course_id" />
                            <button id="b1" name="cart_btn"> <i class="fa fa-cart-plus" style="font-size:24px"></i> Add to Cart </button>
                            <a href="cart.php">   <button id="b2"> <i class="fa fa-bolt" style="font-size:24px"></i> Buy Now </button></a>
                        </form>
                    </div><br clear="All"/>
                    <div id="c_desc">
                        <h2> Course Details</h2>
                        <p> 
                        ' . $row['course_desc'] . '
                        </p>
                        <h2> What will I learn? </h2>
                        <p> ' . $row['after_course'] . ' </p>
                        <h2> Before Starting</h2>
                        <p> ' . $row['before_course'] . ' </p>
                        <h2> Instructor </h2>
                        <div id="ins_image">
                            <img src="imgs/instructor/' . $row['inst_image'] . '"/>
                        </div>
                        <p>' . $row['about_inst'] . ' </p>
                        <div id="course_share">
                            <center>
                                <a href="#"><button id="fa"><i class="fa fa-facebook" style="font-size:20px;color:white"></i></button></a>
                                <a href="#"><button id="tw"><i class="fa fa-twitter" style="font-size:20px;color:white"></i></button></a>
                                <a href="#"><button id="ln"><i class="fa fa-linkedin-square" style="font-size:20px;color:white"></i></button></a>
                                <a href="#"><button id="wa"><i class="fa fa-whatsapp" style="font-size:20px;color:white"></i></button></a>
                            </center>
                        </div><br clear="All"/>
                            <h2> Curriculum </h2>
                        <form method="post">
                        <ul>
                            <li><i class="fa fa-video-camera" id="trailer" style="font-size:20px"></i><span> 1. ' . $row['course_title'] . ' </span>
                            </li>
                            <details style="display: inline; outline:none;margin-left:2%"><summary style="outline: none;width: fit-content;
                            padding: 3px 3px 3px 3px;
                            background: whitesmoke;font-family: cursive;"> Watch Intro</summary>
                                <video width="500" height="350" controls style="outline:none; margin-top:-4%">
                                <source src="' . $row["video"] . '" type="video/mp4">
                                </video>
                            </details>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 2. Quick OverView </span></li>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 3. Creating Important Folders </span></li>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 4. Connection With Database </span></li>
                            <li><i class="fa fa-video-camera" style="font-size:20px"></i><span> 5. Designing HomePage </span></li>
                        </ul>
                        </form>
                    </div>
                        <div id="c_rel">
                            <h2> Related Courses</h2>
                            <ul>
                                <li>    
                                    <a href="#">
                                    <img src="imgs/courses/2.jpg"/>
                                    <p>Digital Marketing With Social Medias</p>
                                    </a>
                                </li><br clear="All"/>
                                <li>    
                                    <a href="#">
                                    <img src="imgs/courses/4.jpg"/>
                                    <p>Android Development Tutorial For Beginners With Java</p>
                                    </a>
                                </li><br clear="All"/>
                                <li>    
                                    <a href="#">
                                    <img src="imgs/courses/7.jpg"/>
                                    <p>Web Development Tutorial For Beginners</p>
                                    </a>
                                </li>
        
                            </ul>
                        </div><br clear="All"/>
                    ';
    }
}


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

function add_cart()
{
    include("inc/db1.php");
    if (isset($_POST['cart_btn'])) {
        //$id = $_POST['course_id'];
        $id = $_GET['course_edit'];
        $ip = getIp();
        $check_cart = $con->prepare("SELECT * from cart where c_id='$id' AND ip_add='$ip'");
        $check_cart->execute();
        $row_check = $check_cart->rowCount();
        if ($row_check == 1) {
            echo "<script> alert('This course is already Added in the Cart.');</script>";
        } else {
            $add_cart = $con->prepare("insert into cart(c_id,ip_add) values('$id','$ip')");
            if ($add_cart->execute()) {

                //cart_count();
                //  echo "<script> alert('This course is Added in the Cart.');</script>";
                //  echo "<script>  window.location.reload();</script>";
                // header("location:course_details.php?course_edit='$id'");
                echo "<script> location.href='http://localhost/e_learning/cart.php' </script>";
            } else {
                echo "<script> alert('Try Again!!!');</script>";
            }
        }
    }
}

function cart_count()
{
    include("inc/db1.php");
    $ip = getIp();
    $get_cart_item = $con->prepare("select * from cart where ip_add='$ip'");
    $get_cart_item->execute();
    $count_cart = $get_cart_item->rowCount();
    return $count_cart;
}
function delete_cart_items()
{
    include("db1.php");
    if (isset($_GET['delete_id'])) {
        $c_id = $_GET['delete_id'];
        $delete_course = $con->prepare("delete from cart where c_id='$c_id'");
        if ($delete_course->execute()) {
            echo "<script> alert ('Product Removed From Cart Successfully')</script>";
            echo "<script> window.open('/e_learning/cart.php','_self'); </script>";
        }
    }
}
// function checkout(){
//     session_start();
//     if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
//         header("location:/e_learning/index1.php");
//         exit;
//     }

//     echo"<h2> Please Checkout to Proceed.</h2>";

// }
function head_link()
{
    include("inc/db1.php");
    $get_link = $con->prepare("select * from contact");
    $get_link->setFetchMode(PDO::FETCH_ASSOC);
    $get_link->execute();
    $row = $get_link->fetch();
    echo '
        <ul>
            <li> <a href="' . $row['fb'] . '" target="_blank"> <i class="fa fa-facebook-square" style="font-size:20px" ></i> </a></li>
            <li><a href="' . $row['tw'] . '" target="_blank"> <i class="fa fa-twitter" style="font-size:20px"></i> </a></li>
            <li><a href="' . $row['gp'] . '" target="_blank"> <i class="fa fa-google-plus" style="font-size:20px"></i> </a></li>
            <li><a href="' . $row['yt'] . '" target="_blank"> <i class="fa fa-youtube-play" style="font-size:20px"></i> </a></li>
            <li><a href="' . $row['link'] . '" target="_blank"> <i class="fa fa-linkedin-square" style="font-size:20px"></i> </a></li>
        </ul>';
}
function menu_cat()
{
    include("inc/db1.php");
    $get_cat = $con->prepare("select * from cat");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();

    while ($row = $get_cat->fetch()) :
        echo '<li> <a href="maincategory.php?cat_edit=' . $row['cat_id'] . '">' . $row["cat_icon"] . ' ' . $row["cat_name"] . ' </a></li>';
    endwhile;
}

function u_login()
{
    //   session_start();
    if (isset($_POST['u_login'])) {
        if (!isset($_SESSION['u_email'])) {
            if (isset($_REQUEST['u_email']) || isset($_REQUEST['u_pass'])) {
                $u_email = $_REQUEST["u_email"];
                $password = $_REQUEST["u_pass"];
                // $passH = password_hash($password, PASSWORD_DEFAULT);
                include("inc/db1.php");
                // $sql = $con->prepare("SELECT COUNT(*) total FROM users where email= '$u_email'");
                $sql = $con->prepare("SELECT * FROM users where email= '$u_email'");
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                // while ($row = $get_cat->fetch()) :
                // $count = $row['total'];
                $count = $sql->rowCount();
                if ($count == 1) {
                    while ($row = $sql->fetch()) {
                        if (password_verify($password, $row['password'])) {
                            // if ($password == $row['password']) {
                            $_SESSION['email'] = $u_email;
                            $_SESSION['u_pass'] = $password;
                            $_SESSION["loggedin"] = true;
                            echo "<script>  alert(' You are now logged in') </script>";
                         //  echo '<script> swal("Good job!", "You are now logged in !", "success") </script>';
                            echo "<script>window.open('index1.php','_self')</script>";
                            // echo "<script> location.href='http://localhost/e_learning/checkout.php' </script>";
                        } else {

                            echo "<script>  alert(' Invalid password verify') </script>";
                            echo "<script>window.open('index1.php','_self')</script>";
                        }
                    }
                } else {
                    echo ' <script>
                    swal("Invalid Credentials!", "Please Try Again!", "error");
                    </script>';
                    //echo "<script>  alert(' Invalid Credentials') </script>";
                    echo "<script>window.open('index1.php','_self')</script>";
                }
            }
        } else {
            echo "<script> location.href='http://localhost/e_learning/checkout.php' </script>";
        }
    }
}



function u_signup()
{
    include("inc/db1.php");
    if (isset($_POST['u_signup'])) {
        $username = $_POST['u_name'];
        $email = $_POST["u_email"];
        $regex = '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^';
        $phone = $_POST["u_phone"];
        $password = $_POST["u_pass1"];
        $cpassword = $_POST["u_pass2"];
        $exists = false;
        //check whether this email exists or not.
        $existSQL = $con->prepare("SELECT * FROM `users` WHERE `email`='$email'");
        $existSQL->setFetchMode(PDO::FETCH_ASSOC);
        $existSQL->execute();
        $existSQLCount = $existSQL->rowCount();
        if (empty($phone)) {
            echo '<script>alert("Mobile Number field Empty...!!!!!!");</script>';
        } else if (!preg_match("/^\d{10}+$/", $phone)) {
            echo '<script>alert("Only Numbers with 10 Digits required");</script>';
        } else {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email1 = $email;

                if ($existSQLCount > 0) {
                    echo ' <script>
            swal("Sign Up UnSucessful!", "Email Already Exists", "error");
            </script>';
                    // echo "<script>  alert('Email Already Exists') </script>";
                } else {
                    if ($password == $cpassword) {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        //  $hash = substr( $hash, 0, 60 );
                        $add_user = $con->prepare("INSERT INTO `users` ( `username`, `email`, `password`, `phone`, `date`) VALUES ('$username', '$email1', '$hash', '$phone', current_timestamp())");
                        if ($add_user->execute()) {
                            // echo "<script> alert('Sign Up Sucessful. You can now Login')</script>";
                            echo ' <script>
                    swal("Sign Up Sucessful!", "You can now Login!", "success");
                    </script>';
                            // echo "<script>window.open('index1.php','_self')</script>";
                        } else {
                            echo ' <script>
                    swal("Sign Up UnSucessful!", "Please Try Again!", "error");
                    </script>';
                            // echo "<script> alert('Sign Up UnSucessful. Please Try Again!')</script>";

                        }
                    } else {
                        echo "<script>  alert('Passwords donot match') </script>";
                    }
                }
            } else {
                echo ' <script>
        swal("Invalid Email", "Please Try Again!", "error");
        </script>';
                // echo "<script>  alert('Invalid Email') </script>";
            }
        }
    }
}
function logOut()
{
}

//This is to add the category in the user panel dynamically.
function home_cat()
{
    include("inc/db1.php");
    $get_cat = $con->prepare("select * from cat");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    while ($row = $get_cat->fetch()) :
        $cat_id = $row['cat_id'];
        $get_sub_cat = "SELECT COUNT(*) FROM sub_cat where cat_id=$cat_id";
        $res = $con->query($get_sub_cat);
        $count = $res->fetchColumn();
        echo ' 
            <li> 
                <a href="maincategory.php?cat_edit=' . $row['cat_id'] . '">
                    <center> 
                       <div class="container" > ' . $row["cat_icon"] . ' </div>
                        <h4> ' . $row['cat_name'] . ' </h4>
                        <p>' . $count . '</p>
                    </center>
                </a>    
            </li>';
    endwhile;
}

function top_course()
{
    include("inc/db1.php");
    //    session_start();


    if (isset($_SESSION['filterCourse'])) {
        if ($_SESSION['filterCourse'] == true || isset($_SESSION['filterCourse'])) {
            $search_key = $_SESSION['searchCourse'];
            // $get_course = $con->prepare('Select * from courses where c_name LIKE %"'.$search_key.'"%');
            $get_course = $con->prepare('Select * from courses where c_name ="' . $search_key . '"');
            $get_course->setFetchMode(PDO::FETCH_ASSOC);
            $get_course->execute();
            // <a href="course_details.php?course_edit=' . $row['c_id'] . '">
            while ($row = $get_course->fetch()) :
                $encrypt_1 = $row['c_id'];
                $link = "course_details.php?course_edit=" . urlencode(base64_encode($encrypt_1));
                echo ' 
                <li>             
                    <a href="=' . $link . '">
                        <img src="imgs/courses/' . $row['course_img'] . '" alt=""/>
                        <h3>' . $row['c_name'] . ' </h3>
                        <h4>Price : ' . $row['price'] . ' </h4>
                        <h5>Teacher Name : ' . $row['instructor'] . '</h5>
                    </a>
                </li>';
            endwhile;
            session_unset();
            session_destroy();
            $course_empty = $get_course->rowCount();
            if ($course_empty == 0) {
                // session_unset();
                //session_destroy();
                echo '<script> alert("Sorry, This Course is not available now. ")</script>';
                echo '<script type="text/javascript">
               if (location.href.indexOf("reload")==-1)
               {
                window.open("/e_learning/index1.php","_self")
            }
               </script>';
            }
            // session_unset();
            // session_destroy();

        }
    } else {

        include("inc/db1.php");
        $get_course = $con->prepare("select * from courses");
        $get_course->setFetchMode(PDO::FETCH_ASSOC);
        $get_course->execute();
        // <a href="course_details.php?course_edit=' . $row['c_id'] . '">
        while ($row = $get_course->fetch()) :
            $encrypt_1 = $row['c_id'];
            $link = "course_details.php?course_edit=" . urlencode(base64_encode($encrypt_1));
            echo ' 
        <li>
                <a href="' . $link . '">
                <img src="imgs/courses/' . $row['course_img'] . '" alt=""/>
                <h3>' . $row['c_name'] . ' </h3>
                <h4>Price : ' . $row['price'] . ' </h4>
                <h5>Teacher Name : ' . $row['instructor'] . '</h5>
            </a>
        </li>';
        endwhile;
    }
}

function top_course1()
{
    include("inc/db1.php");

    $id = $_GET['cat_edit'];
    $get_course = $con->prepare("select * from courses where cat_id=$id");
    $get_course->setFetchMode(PDO::FETCH_ASSOC);
    // <a href="course_details.php?course_edit=' . $row['c_id'] . '">
    $get_course->execute();
    while ($row = $get_course->fetch()) :
        $encrypt_1 = $row['c_id'];
        $link = "course_details.php?course_edit=" . urlencode(base64_encode($encrypt_1));
        echo ' 
        <li>
            <a href="' . $link . '">
                <img src="imgs/courses/' . $row['course_img'] . '" alt=""/>
                <h3>' . $row['c_name'] . ' </h3>
                <h4>Price : ' . $row['price'] . ' </h4>
                <h5>Teacher Name : ' . $row['instructor'] . '</h5>
            </a>
        </li>';
    endwhile;
    if ($get_course->rowCount() == 0) {
        echo ' <h1 style="margin-top:-10px; margin-left:26%" >No Category Found  </h1> ';
    }
}

try {
    function cart()
    {
        include("inc/db1.php");
        $ip = getIp();
        $get_cart = $con->prepare("select * from cart where ip_add='$ip'");
        $get_cart->setFetchMode(PDO::FETCH_ASSOC);
        $get_cart->execute();
        $cart_empty = $get_cart->rowCount();
        $net_total = 0;

        if ($cart_empty == 0) {

            echo "
        <div id='crumb'>
        <span><a href='index1.php'>Home</a></span> <b>></b>
        <span> My Cart</span>
        </div> <br clear='All'/>
        <h1 style='position:relative;margin-top: 35px;margin-left: 35%;'> No Products found in Cart </h1> <br clear='All'/>";
        } else {
            try {
                echo '<div id="crumb">
        <span><a href="index1.php">Home</a></span> <b>></b>
        <span> My Cart</span>
    </div> <br clear="All"/>
    <div id="cart">
                    <table cellspacing="0">
                        <tr>
                            <th id="cart_f"> Name</th>
                            <th> Instructor</th>
                            <th> Lectures</th>
                            <th>Language </th>
                            <th> Price</th>
                        </tr>
    ';
                while ($row = $get_cart->fetch()) :
                    $course_id = $row['c_id'];
                    $get_course = $con->prepare("select * from courses where c_id='$course_id' ");
                    $get_course->setFetchMode(PDO::FETCH_ASSOC);
                    $get_course->execute();
                    $row_course = $get_course->fetch();
                    $net_total = $net_total + $row_course["price"];
                    echo '    
                        <tr>
                          <td id="cart_f">  
                            <img src="imgs/courses/' . $row_course["course_img"] . '"/>
                            <span> <a href="#">' . $row_course["c_name"] . ' tutorials for beginners</a> </span>
                            <b><i class="fa fa-trash-o"></i><a href="inc/delete.php?delete_id=' . $row_course["c_id"] . '">Remove</a></b>
                          </td>
                          <td> ' . $row_course["instructor"] . '</td>
                          <td> ' . $row_course["c_name"] . '</td>
                          <td> ' . $row_course["language"] . '</td>
                          <td>' . $row_course["price"] . '</td>
                        </tr>';

                endwhile;

                echo '
                        <tr>
                        <td> 
                        <a href="index1.php"><button> Keep Shopping</button></a>
                                <a href="checkout.php">  <button> Check Out </button></a>

                        </td>
                        <td>    
                        <form action="https://uat.esewa.com.np/epay/main" method="POST">
                            <input value=' . $net_total . ' name="tAmt" type="hidden">
                            <input value=' . $net_total . ' name="amt" type="hidden">
                            <input value="0" name="txAmt" type="hidden">
                            <input value="0" name="psc" type="hidden">
                            <input value="0" name="pdc" type="hidden">
                            <input value="EPAYTEST" name="scd" type="hidden">
                            <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                            <input value="http://localhost/e_learning/esewa_payment_success.php" type="hidden" name="su">
                            <input value="http://merchant.com.np/page/esewa_payment_failed.php" type="hidden" name="fu">
                            
                        
                        <input id= "esewa" type="image" src="imgs/payment/esewa.png"/>
                            </form>
                        </td>
                        <td> </td>
                        
                        <td style="text-align:right">Amount Payable :</td>
                        <td>' . $net_total . '</td>
                        </tr>
                    </table>
                </div><br ="clear">
        ';
            } catch (Exception $e) {
                header("Location: index1.php?status=error");
                exit();
            }
        }
    }
} catch (Exception $e) {
    header("Location: dashboard.php?status=error");

    exit();
}

function intro()
{
}


?>