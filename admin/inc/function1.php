<?php
// function getIp()
// {
//     $ip = $_SERVER['REMOTE_ADDR'];

//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }

//     return $ip;
// }
function add_lang()
{   include("inc/db1.php");
    if (isset($_POST['add_lang'])) {
        $lang_name = $_POST['lang_name'];
        //create the statement, it is done to check whether the language is already present or not.
        $check = $con->prepare("select * from lang where lang_name='$lang_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();
        if ($count == 1) {
            echo "<script>  alert('Language Already Added') </script>";
            echo "<script>window.open('index.php?lang','_self')</script>";
        } else {
            $add_lang = $con->prepare("insert into lang(lang_name) values('$lang_name')");
            //executing the statement
            if ($add_lang->execute()) {
                echo "<script>  alert('Language Added Sucesfully') </script>";
                echo "<script>window.open('index.php?lang','_self')</script>";
            } else {
                echo "<script>alert('Language Not Added ') </script>";
                echo "<script>window.open('index.php?lang','_self')</script>";
            }
        }
    }
}

function edit_lang()
{
    include("inc/db1.php");
    if (isset($_GET['edit_lang'])) {
        $id = $_GET['edit_lang'];
        $get_lang = $con->prepare("select * from lang where lang_id='$id'");
        $get_lang->setFetchMode(PDO::FETCH_ASSOC);
        $get_lang->execute();
        $row = $get_lang->fetch();
        echo "<h3>Edit Category</h3>
    <form id='edit_form' method='post' enctype='multipart/form-data'>
            <input type='text' name='lang_name' value='" . $row['lang_name'] . "' placeholder='Enter Language Name Here'/>
            <center><button name='edit_lang'>Edit Language</button></center> 
    </form>";
        if (isset($_POST['edit_lang'])) {
            $lang_name = $_POST['lang_name'];
            $check = $con->prepare("select * from lang where lang_name='$lang_name'");
            //it return the categories name in the array form.
            $check->setFetchMode(PDO::FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();
            if ($count == 1) {
                echo "<script>  alert('Language Already Updated') </script>";
            } else {
                $up = $con->prepare("update lang set lang_name='$lang_name' where lang_id='$id'");
                //executing the statement
                if ($up->execute()) {
                    echo "<script>  alert('Language Updated Sucesfully') </script>";
                    echo "<script>window.open('index.php?lang','_self')</script>";
                } else {
                    echo "<script>alert('Language Not Updated Sucesfully') </script>";
                    echo "<script>window.open('index.php?lang','_self')</script>";
                }
            }
        };
    }
}


function add_cat()
{
    include("inc/db1.php");
    // when someone clicks on the button whose name is add_cat
    if (isset($_POST['add_cat'])) {
        $cat_name = $_POST['cat_name'];
        $cat_icon = $_POST['cat_icon'];
        //creating the statement using prepared statement
        $check = $con->prepare("select * from cat where cat_name='$cat_name'");
        //it helps to set the fetch mode whether to fetch the datas in the form of
        //objets or whether in the form of array. Here it sets the fetchmode to 
        // fetch the datas in the form of array.
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        //Hence, i will be getting the datas in the form of table where the datas can be fetched 
        //providing the particular indexing.  
        $count = $check->rowCount();
        if ($count == 1) {
            echo "<script>  alert('Category Already Added') </script>";
        } else {
            //firing the queries to insert  datas in the database.
            $add_cat = $con->prepare("insert into cat(cat_name,cat_icon) values('$cat_name','$cat_icon')");
            //executing the statement
            if ($add_cat->execute()) {
                echo "<script>  alert('Category Added Sucesfully') </script>";
                echo "<script>window.open('index.php?cat','_self')</script>";
            } else {
                echo "<script>alert('Category Not Added Sucesfully') </script>";
                echo "<script>window.open('index.php?cat','_self')</script>";
            }
        }
    }
}
// function add_course(){
//     include("inc/db1.php");
//     // when someone clicks on the button whose name is add_cat
//     if (isset($_POST['add_course'])) {
//         $course_name = $_POST['c_name'];
//         // $cat_icon = $_POST['cat_icon'];
//         //creating the statement using prepared statement
//         $check = $con->prepare("select * from courses where c_name='$course_name'");
//         //it helps to set the fetch mode whether to fetch the datas in the form of
//         //objets or whether in the form of array. Here it sets the fetchmode to 
//         // fetch the datas in the form of array.
//         $check->setFetchMode(PDO::FETCH_ASSOC);
//         $check->execute();
//         //Hence, i will be getting the datas in the form of table where the datas can be fetched 
//         //providing the particular indexing.  
//         $count = $check->rowCount();
//         if ($count == 1) {
//             echo "<script>  alert('Course Already Added') </script>";
//         } else {
//             //firing the queries to insert  datas in the database.
//             $add_course = $con->prepare("insert into courses(c_name) values('$course_name')");
//             //executing the statement
//             if ($add_course->execute()) {
//                 echo "<script>  alert('Course Title Added Sucesfully') </script>";
//                 echo "<script>window.open('/e_learning/admin/course_edit.php','_self')</script>";
//             } else {
//                 echo "<script>alert('Course Title Not Added Sucesfully') </script>";
//                 echo "<script>window.open('/e_learning/admin/course_edit.php','_self')</script>";
//             }
//         }
//     }
// }
function edit_cat()
{
    include("inc/db1.php");
    if (isset($_GET['edit_cat'])) {
        $id = $_GET['edit_cat'];
        $get_cat = $con->prepare("select * from cat where cat_id='$id'");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();
        echo "<h3>Edit Category</h3>
<form id='edit_form' method='post' enctype='multipart/form-data'>
        <input type='text' name='cat_name' value='" . $row['cat_name'] . "' placeholder='Enter Category Name Here'/>
        <input type='text' name='cat_icon' value='" . $row['cat_icon'] . "'/>
        <center><button name='edit_cat'>Edit Category</button></center> 
</form>";
        if (isset($_POST['edit_cat'])) {
            $cat_name = $_POST['cat_name'];
            $cat_icon = $_POST['cat_icon'];
            // $check=$con->prepare("select * from cat where cat_name='$cat_name'");
            // //it return the categories name in the array form.
            // $check->setFetchMode(PDO::FETCH_ASSOC);
            // $check->execute();
            // $count=$check->rowCount();
            // if ($count==1){
            //     echo"<script>  alert('Category Already Added') </script>";
            // }
            // else{
            $up = $con->prepare("update cat set cat_name='$cat_name',cat_icon='$cat_icon' where cat_id='$id'");
            //executing the statement
            if ($up->execute()) {
                echo "<script>  alert('Category Updated Sucesfully') </script>";
                echo "<script>window.open('index.php?cat','_self')</script>";
            } else {
                echo "<script>alert('Category Not Updated Sucesfully') </script>";
                echo "<script>window.open('index.php?cat','_self')</script>";
            }
            //  }

        };
    }
}
function view_cat()
{
    include("inc/db1.php");
    $get_cat = $con->prepare("select * from cat");
    // the below sets the fetch mode  in the form of array.
    // even though the whole table is returned but in the form of array.
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    $i = 1;
    // the below returns the whole table.
    while ($row = $get_cat->fetch()) :
        echo "<tr>
            <td>" . $i++ . "</td>
            <td>" . $row['cat_icon'] . "" . $row['cat_name'] . "</td> 
            <td>
                 <a href='index.php?cat&edit_cat=" . $row['cat_id'] . "' title='Edit'><i class='fa fa-edit' style='color:blue'></i></a>
                 <a href='index.php?cat&del_cat=" . $row['cat_id'] . "' title='Delete'><i class='fa fa-trash' style='color:red'></i></a>
            </td>
            </tr>";
    endwhile;
    if (isset($_GET['del_cat'])) {
        $id = $_GET['del_cat'];
        $del = $con->prepare("delete from cat where cat_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('Category deleted Sucessfully')</script>";
            echo "<script>window.open('index.php?cat','_self')</script>";
        } else {
            echo "<script>alert('Category Not deleted')</script>";
            echo "<script>window.open('index.php?cat','_self')</script>";
        }
    }
}

// function view_course(){
//     include("inc/db1.php");
//     $get_cat = $con->prepare("select * from courses");
//     // the below sets the fetch mode  in the form of array.
//     // even though the whole table is returned but in the form of array.
//     $get_cat->setFetchMode(PDO::FETCH_ASSOC);
//     $get_cat->execute();
//     $i = 1;
//     // the below returns the whole table.
//     while ($row = $get_cat->fetch()) :
//         echo' <h2> Course Title</h2>
//         <form method="post">
//             <div id="c_edit_input">
//                 <input type="text" name="c_name" placeholder="Enter Course Name" />
//                 <p>100</p> <br clear="All" />
//             </div>
//             <h2> Course Image</h2>
//             <img src="/e_learning/imgs/courses/1.png" alt="" />
//             <span>'.$row["c_name"].'
//             </span>
//             <input id="c_img" type="file" name="c_img" />
//             <button name="add_course"> Save</button>
//         </form>';
//     endwhile;
// }









function edit_sub_cat()
{
    include("inc/db1.php");
    if (isset($_GET['edit_sub_cat'])) {
        $id = $_GET['edit_sub_cat'];
        $get_cat = $con->prepare("select * from sub_cat where sub_cat_id='$id'");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();

        $cat_id = $row['cat_id'];
        $get_c = $con->prepare("select * from cat where cat_id='$cat_id'");
        $get_c->setFetchMode(PDO::FETCH_ASSOC);
        $get_c->execute();
        $row_cat = $get_c->fetch();
        echo "<h3>Edit Sub Category</h3>
    <form id='edit_form' method='post' enctype='multipart/form-data'>
    <select name='cat_id' >
    <option value='" . $row_cat['cat_id'] . "'>" . $row_cat['cat_name'] . " </option>";
        echo select_cat();
        echo "</select>
        <input type='text' name='sub_cat_name' value='" . $row['sub_cat_name'] . "' placeholder='Enter SubCategory Name Here'/>
            <center><button name='edit_sub_cat'>Edit SubCategory</button></center> 
    </form>";
        if (isset($_POST['edit_sub_cat'])) {
            $cat_name = $_POST['sub_cat_name'];
            $cat_id = $_POST['cat_id'];
            $check = $con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
            //it return the categories name in the array form.
            $check->setFetchMode(PDO::FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();
            $up = $con->prepare("update sub_cat set sub_cat_name='$cat_name',cat_id='$cat_id' where sub_cat_id='$id'");
            //executing the statement
            if ($up->execute()) {
                echo "<script>  alert('Category Updated Sucesfully') </script>";
                echo "<script>window.open('index.php?sub_cat','_self')</script>";
            } else {
                echo "<script>alert('Category Not Updated Sucesfully') </script>";
                echo "<script>window.open('index.php?sub_cat','_self')</script>";
            }
        };
    }
}

//This is the function which helps to insert the datas into the sub category table in the 
//database where sub_cat_id autoincrements which means we don't have to add anything there 
//but we have to add in the 2 other columns sub_catname and cat_id.
function add_sub_cat()
{
    include("inc/db1.php");
    if (isset($_POST['add_sub_cat'])) {
        $sub_cat_name = $_POST['sub_cat_name'];
        //create the statement
        $check = $con->prepare("select * from sub_cat where sub_cat_name='$sub_cat_name'");
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();
        //whatever the user selects the item in the combobox we will be getting that particular
        // element id.
        $cat_id = $_POST['cat_id'];
        if ($count == 1) {
            echo "<script>  alert('SubCategory Already Added') </script>";
        } else {
            // finally whatever the category name user selects it will be giving a respective categoryid and that id is
            // gained from the select tag of the subcat.php file and inside which an option tag is there which has 
            // an attribute called as value from where the respective category id is extracted.
            $add_sub_cat = $con->prepare("insert into sub_cat(sub_cat_name, cat_id) values('$sub_cat_name','$cat_id')");
            //executing the statement
            if ($add_sub_cat->execute()) {
                echo "<script>  alert('SubCategory Added Sucesfully') </script>";
                echo "<script>window.open('index.php?sub_cat','_self')</script>";
            } else {
                echo "<script>alert('SubCategory Not Added Sucesfully') </script>";
                echo "<script>window.open('index.php?sub_cat','_self')</script>";
            }
        }
    }
}
function select_cat()
{
    include("inc/db1.php");
    $get_cat = $con->prepare("select * from cat");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    while ($row = $get_cat->fetch()) :
        echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
    endwhile;
}
function select_lang()
{
    include("inc/db1.php");
    $get_lang = $con->prepare("select * from lang");
    $get_lang->setFetchMode(PDO::FETCH_ASSOC);
    $get_lang->execute();
    while ($row = $get_lang->fetch()) :
        echo "<option value='" . $row['lang_id'] . "'>" . $row['lang_name'] . "</option>";
    endwhile;
}
function select_sub_cat1()
{
    include("inc/db1.php");
    // if(isset($_POST['category1'])) {
    //  $cat_id = $_POST['category1'];
    // $sub_cat_name=$_POST['subcategory'];
    //  $get_cat = $con->prepare("select * from sub_cat where cat_id= $cat_id");
    $get_cat = $con->prepare("select * from sub_cat");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    while ($row = $get_cat->fetch()) :
        echo "<option value='" . $row['sub_cat_id'] . "'>" . $row['sub_cat_name'] . "</option>";
    endwhile;
// }
}
function select_sub_cat()
{
    include("inc/db1.php");
    $cat_id = $_POST['category'];
    $get_cat = $con->prepare("select * from sub_cat where cat_id= $cat_id");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    while ($row = $get_cat->fetch()) :
        echo "<option value='" . $row['sub_cat_id'] . "'>" . $row['sub_cat_name'] . "</option>";
    endwhile;
}



function view_sub_cat()
{
    include("inc/db1.php");
    $get_cat = $con->prepare("select * from sub_cat");
    $get_cat->setFetchMode(PDO::FETCH_ASSOC);
    $get_cat->execute();
    $i = 1;
    while ($row = $get_cat->fetch()) :
        $id = $row['cat_id'];
        $get_c = $con->prepare("select * from cat where cat_id='$id'");
        $get_c->setFetchMode(PDO::FETCH_ASSOC);
        $get_c->execute();
        $row_cat = $get_c->fetch();
        echo "<tr>
                <td>" . $i++ . "</td>
                <td>" . $row['sub_cat_name'] . "</td> 
                <td>" . $row_cat['cat_name'] . "</td>
                <td> 
                    <a href='index.php?sub_cat&edit_sub_cat=" . $row['sub_cat_id'] . "' title'Edit'><i class='fa fa-edit' style='color:blue'></i></a>
                    <a href='index.php?sub_cat&del_sub_cat=" . $row['sub_cat_id'] . "' title='Delete'><i class='fa fa-trash' style='color:red'></i></a>
                </td>
                </tr>";
    endwhile;
    if (isset($_GET['del_sub_cat'])) {
        $id = $_GET['del_sub_cat'];
        $del = $con->prepare("delete from sub_cat where sub_cat_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('SubCategory deleted Sucessfully')</script>";
            echo "<script>window.open('index.php?sub_cat','_self')</script>";
        } else {
            echo "<script>alert('SubCategory Not deleted')</script>";
            echo "<script>window.open('index.php?sub_cat','_self')</script>";
        }
    }
}

function view_lang()
{
    include("inc/db1.php");
    $get_lang = $con->prepare("select * from lang");
    $get_lang->setFetchMode(PDO::FETCH_ASSOC);
    $get_lang->execute();
    $i = 1;
    while ($row = $get_lang->fetch()) :
        echo "<tr>
            <td>" . $i++ . "</td>
            <td>" . $row['lang_name'] . "</td> 
            <td> 
                <a href='index.php?lang&edit_lang=" . $row['lang_id'] . "' title='Edit'><i class='fa fa-edit' style='color:blue'></i></a>
                <a href='index.php?lang&del_lang=" . $row['lang_id'] . "' title='Delete'><i class='fa fa-trash' style='color:red'></i></a></td>
            </tr>";
    endwhile;
    if (isset($_GET['del_lang'])) {
        $id = $_GET['del_lang'];
        $del = $con->prepare("delete from lang where lang_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('Language deleted Sucessfully')</script>";
            echo "<script>window.open('index.php?lang','_self')</script>";
        } else {
            echo "<script>alert('Language Not deleted')</script>";
            echo "<script>window.open('index.php?lang','_self')</script>";
        }
    }
}


function add_term()
{
    //establish the connection with the database
    include("inc/db1.php");
    if (isset($_POST['add_term'])) {
        $term = $_POST['term'];
        $for_whom = $_POST['for_whom'];
        //create the statement
        $check = $con->prepare("select * from term where term='$term'");
        //it return the categories name in the array form.
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();
        if ($count == 1) {
            echo "<script>  alert('Term is Already Added') </script>";
            echo "<script>window.open('index.php?terms','_self')</script>";
        } else {
            $add_sub_cat = $con->prepare("insert into term(term, for_whom) values('$term','$for_whom')");
            //executing the statement
            if ($add_sub_cat->execute()) {

                echo "<script>  alert('Term Added Sucesfully') </script>";
                echo "<script>window.open('index.php?terms','_self')</script>";
            } else {
                echo "<script>alert('Term Not Added Sucesfully') </script>";
                echo "<script>window.open('index.php?terms','_self')</script>";
            }
        }
    }
}
function view_terms()
{
    include("inc/db1.php");
    $get_c = $con->prepare("select * from term");
    $get_c->setFetchMode(PDO::FETCH_ASSOC);
    $get_c->execute();
    $i = 1;
    while ($row_term = $get_c->fetch()) :
        echo "<tr>
            <td>" . $i++ . "</td>
            <td>" . $row_term['term'] . "</td> 
            <td>" . $row_term['for_whom'] . "</td>
            <td> 
                <a href='index.php?terms&edit_term=" . $row_term['t_id'] . "' title'Edit'><i class='fa fa-edit' style='color:blue'></i></a>
                <a href='index.php?terms&del_term=" . $row_term['t_id'] . "' title='Delete'><i class='fa fa-trash' style='color:red'></i></a>
            </td>
            </tr>";
    endwhile;
    if (isset($_GET['del_term'])) {
        $id = $_GET['del_term'];
        $del = $con->prepare("delete from term where t_id='$id'");
        if ($del->execute()) {
            echo "<script>alert('Term deleted Sucessfully')</script>";
            echo "<script>window.open('index.php?terms','_self')</script>";
        } else {
            echo "<script>alert('Term Not deleted')</script>";
            echo "<script>window.open('index.php?terms','_self')</script>";
        }
    }
}

function edit_term()
{
    include("inc/db1.php");
    if (isset($_GET['edit_term'])) {
        $id = $_GET['edit_term'];
        $get_term = $con->prepare("select * from term where t_id='$id'");
        $get_term->setFetchMode(PDO::FETCH_ASSOC);
        $get_term->execute();
        $row = $get_term->fetch();
        echo "<h3>Edit T&C</h3>
        <form id='edit_form' method='post' enctype='multipart/form-data'>
            <select name='for_whom' >
                <option value='Student'>Student</option>
                <option value='Teacher'>Teacher</option>";
        echo "</select>
                    <input type='text' name='term' value='" . $row['term'] . "' placeholder='Enter SubCategory Name Here'/>
                    <center><button name='edit_term'>Edit T&C</button></center> 
        </form>";
        if (isset($_POST['edit_term'])) {
            $term = $_POST['term'];
            $for_whom = $_POST['for_whom'];
            $up = $con->prepare("update term set term='$term',for_whom='$for_whom' where t_id='$id'");
            //executing the statement
            if ($up->execute()) {
                echo "<script>  alert('Term Updated Sucesfully') </script>";
                echo "<script>window.open('index.php?terms','_self')</script>";
            } else {
                echo "<script>alert('Term Not Updated ') </script>";
                echo "<script>window.open('index.php?terms','_self')</script>";
            }
        };
    }
}

function contact()
{
    include("inc/db1.php");
    //firing the query
    $get_con = $con->prepare("select * from contact");
    $get_con->setFetchMode(PDO::FETCH_ASSOC);
    $get_con->execute();
    $row = $get_con->fetch();
    echo '<form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Update Contact No.</td>
                <td> <input type="tel" name="phn" value="' . $row['phn'] . '"/></td>
            </tr>
            <tr>
                <td>Update  Email</td>
                <td> <input type="email" name="email" value="' . $row['email'] . '"/></td>
            </tr>
            <tr>
                <td>Update  Office Address Line1</td>
                <td> <input type="text" name="add1" value="' . $row['add1'] . '"/></td>
            </tr>
            <tr>
                <td>Update  Office Address Line2</td>
                <td> <input type="text" name="add2" value="' . $row['add2'] . '"/></td>
            </tr>
            <tr>
                <td>http://youtube.com/</td>
                <td> <input type="text" name="yt" value="' . $row['yt'] . '"/></td>
            </tr>
            <tr>
                <td>http://facebook.com/</td>
                <td> <input type="text" name="fb" value="' . $row['fb'] . '"/></td>
            </tr>
            <tr>
                <td>https://plus.google.com/</td>
                <td> <input type="text" name="gp" value="' . $row['gp'] . '"/></td>
            </tr>
            <tr>
                <td>https://twitter.com/</td>
                <td> <input type="text" name="tw" value="' . $row['tw'] . '"/></td>
            </tr>
            <tr>
                <td>https://linkedin.com/</td>
                <td> <input type="text" name="ln" value="' . $row['link'] . '"/></td>
            </tr>
        </table>
        <center><button name="up_con">Save</button></center>
        </form>';
    if (isset($_POST["up_con"])) {
        $phn = $_POST["phn"];
        $email = $_POST['email'];
        $add1 = $_POST['add1'];
        $add2 = $_POST['add2'];
        $yt = $_POST['yt'];
        $fb = $_POST['fb'];
        $gp = $_POST['gp'];
        $tw = $_POST['tw'];
        $ln = $_POST['ln'];
        $up = $con->prepare("update contact set phn='$phn', email='$email', add1='$add1', add2='$add2', yt='$yt',fb='$fb',gp='$gp',tw='$tw',link='$ln'");
        if ($up->execute()) {
            echo "<script> window.open('index.php?contact','_self') </script>";
        }
    }
}

function add_faqs()
{
    include("inc/db1.php");
    if (isset($_POST['add_faqs'])) {
        $qsn = $_POST['qsn'];
        $ans = $_POST['ans'];
        //create the statement
        $check = $con->prepare("select * from faqs where qsn='$qsn'");
        //it return the categories name in the array form.
        $check->setFetchMode(PDO::FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();
        if ($count == 1) {
            echo "<script>  alert('FAQs Already Added') </script>";
            echo "<script>window.open('index.php?faqs','_self')</script>";
        } else {
            $add_faq = $con->prepare("insert into faqs(qsn,ans) values('$qsn','$ans')");
            //executing the statement
            if ($add_faq->execute()) {
                echo "<script>  alert('FAQs Added Sucesfully') </script>";
                echo "<script>window.open('index.php?faqs','_self')</script>";
            } else {
                echo "<script>alert('FAQs Not Added ') </script>";
                echo "<script>window.open('index.php?faqs','_self')</script>";
            }
        }
    }
}

function view_faqs()
{
    include("inc/db1.php");
    $get_faqs = $con->prepare("select * from faqs");
    $get_faqs->setFetchMode(PDO::FETCH_ASSOC);
    $get_faqs->execute();
    while ($row = $get_faqs->fetch()) :
        echo '<details>
                <summary>' . $row["qsn"] . '</summary>
                    <form method="post" enctype="multipart/form-data">
                        <input type="text" name="up_qsn" value="' . $row["qsn"] . '" placeholder="Enter Question Here"/>
                        <input type="hidden" name="id" value="' . $row["q_id"] . '"/>
                        <textarea name="up_ans"  placeholder="Enter Answer Here">' . $row["ans"] . '</textarea>
                        <center><button name="up_faqs">Update FAQs</button></center>
                    </form>
                </details> <br/>';
    endwhile;
    if (isset($_POST['up_faqs'])) {
        $qsn = $_POST['up_qsn'];
        $ans = $_POST['up_ans'];
        $id = $_POST['id'];
        $up_faq = $con->prepare("update faqs set qsn='$qsn', ans='$ans' where q_id='$id'");
        //executing the statement
        if ($up_faq->execute()) {
            echo "<script>  alert('FAQs Updated Sucesfully') </script>";
            echo "<script>window.open('index.php?faqs','_self')</script>";
        } else {
            echo "<script>alert('FAQs Not Updated  ') </script>";
            echo "<script>window.open('index.php?faqs','_self')</script>";
        }
    }
}

function about()
{
    include("inc/db1.php");
    $about = $con->prepare("select * from about");
    $about->setFetchMode(PDO::FETCH_ASSOC);
    $about->execute();
    $row = $about->fetch();
    echo  '<form method="post">
           <textarea name="about">' . $row['aboutt'] . ' </textarea>
           <button name="up_about" style=" margin-top:1%; width:200px; position: absolute; top: 250px; left: 1000px"> Save</button>
           </form>';
    if (isset($_POST['up_about'])) {
        $info = $_POST['about'];
        $up_about = $con->prepare("update about set aboutt='$info'");
        if ($up_about->execute()) {
            echo "<script>window.open('index.php?about','_self')</script>";
        } else {
            echo "<script>alert('Info Not Updated  ') </script>";
            echo "<script>window.open('index.php?about','_self')</script>";
        }
    }
}
function course_edit(){
        echo'  <h2> Course Title</h2>
        <form method="post" enctype="multipart/form-data">
            <div id="c_edit_input">
                <input type="text" name="c_name" placeholder="Enter Course Name" required />
                <p>100</p> <br clear="All" />
            </div>
            <h2> Course Image</h2>';
            include("inc/db1.php"); 
            $sql1= $con->prepare("SELECT `course_img` FROM `courses` ORDER BY c_id DESC LIMIT 1 ");
            $sql1->setFetchMode(PDO::FETCH_ASSOC);
            $sql1->execute();
            $count1 = $sql1->rowCount();
            $path=null;
            if ($count1 > 0) {
                while($row = $sql1->fetch()){
                        $path=$row['course_img'];
                }
        };
            echo'
            <img src="'.$path.'" alt="" />
            <span>Upload an Image For your Course. After Uploading, Click the Save Button to Save the Video and Title for your 
            Course.
            </span>
            <input id="c_img" type="file" name="c_img" />
            <button name="add_Course""> Save</button>
        </form>';
        
       
        if(isset($_POST['add_Course'])){
            $target_path="";
           // $ip1=getIp();
            $c_name = $_POST['c_name'];
            $target_path=$target_path.basename($_FILES['c_img']['name']);
            if(move_uploaded_file($_FILES['c_img']['tmp_name'],$target_path)){
                include("inc/db1.php");
                $image = $con->prepare("INSERT INTO `courses` (`c_id`, `c_name`, `course_img`) VALUES ('', '$c_name','$target_path'); ");
                // $image->setFetchMode(PDO::FETCH_ASSOC);
                $image->execute();
                echo "<script> location.href='http://localhost//e_learning/admin/titleImg.php' </script>";
               // header("location: /e_learning/admin/titleImg.php");
                //  echo '
                //   <script type="text/javascript">
                //  (function()
                //  {
                //    if( window.localStorage )
                //    {
                //      if( !localStorage.getItem("firstLoad") )
                //      {
                //        localStorage["firstLoad"] = true;
                //        window.location.reload();
                //      }  
                //      else
                //        localStorage.removeItem("firstLoad");
                //    }
                //  })();
                 
                //  </script>
               
                //  ';
                 
                
        }
    
        
    }
   
}

function instructor_edit(){
    echo'
    <h2 id="ins_name"> Instructor Name</h2>
    <h2> About Instructor</h2>
    <form method="post" enctype="multipart/form-data">
        <div id="instructor_input">
            <input type="text" name="inst_name" placeholder=""  required/>
            <textarea name="textArea1" required > </textarea>
             <br clear="All" />
        </div>
        <h2> Instructor Image</h2>';
        include("inc/db1.php"); 
        $sql1= $con->prepare("SELECT `inst_image` FROM `courses` ORDER BY c_id DESC LIMIT 1 ");
        $sql1->setFetchMode(PDO::FETCH_ASSOC);
        $sql1->execute();
        $count1 = $sql1->rowCount();
        $path=null;
        if ($count1 > 0) {
            while($row = $sql1->fetch()){
                    $path=$row['inst_image'];
            }
    };
        echo'
        <img src="'.$path.'" alt="" />
        <input id="c_img" type="file" name="c_img" />
        <button name="inst_details""> Save</button>
    </form>';
    
   
    if(isset($_POST['inst_details'])){
        // $id = $_GET['course_edit'];
        foreach($_GET as $key =>$data){
            $id= $_GET[$key]=base64_decode(urldecode($data));
         }
        $target_path="";
        $instructor_name=$_POST['inst_name'];
        $about_instructor = $_POST['textArea1'];
        $target_path=$target_path.basename($_FILES['c_img']['name']);
        if(move_uploaded_file($_FILES['c_img']['tmp_name'],$target_path)){
            include("inc/db1.php");
            $image = $con->prepare("update courses set about_inst='$about_instructor',instructor='$instructor_name',inst_image='$target_path' where c_id='$id'");
            // $image->setFetchMode(PDO::FETCH_ASSOC);
            $image->execute();
             echo '
              <script type="text/javascript">
             (function()
             {
               if( window.localStorage )
               {
                 if( !localStorage.getItem("firstLoad") )
                 {
                   localStorage["firstLoad"] = true;
                   window.location.reload();
                 }  
                 else
                   localStorage.removeItem("firstLoad");
               }
             })();
             
             </script>
           
             ';
            // header("location: /e_learning/admin/instructor.php");
    }
    
}

}
function c_goal(){
    echo ' <h2>Course Goal</h2>
    <p>The first step to creating a great course is deciding who you are creating your course for and what those 
        students are looking to accomplish. This is important information that will help students decide if your course
        is right fit for their needs and will appear on your course landing page.
    </p>
    <h2>What will the students need to know or do before starting the course?</h2>';
}
function c_minimum()
{
    echo  '
    <form method="post">
        <div id="c_edit_input2">
            <input type="text" name="min_requirement" required/>
            <a>100</a> <br clear="All"/>  
            <button name="btncourse_goal1"> Save</button>   
        </div>    
    </form>
    
    ';
}
function update_details(){
    include("inc/db1.php");
    // $id = $_GET['course_edit'];
    if (isset($_POST['btn_details'])) {
        foreach($_GET as $key =>$data){
           $id= $_GET[$key]=base64_decode(urldecode($data));
        }
        $details = $_POST['textArea1'];
        $get_price=$_POST['prices'];
        $get_discount=$_POST['discounts'];
        $up = $con->prepare("update courses set course_desc='$details',price='$get_price',discount='$get_discount' where c_id='$id'");
        //executing the statement
        if ($up->execute()) {
            echo "<script>  alert('Course details Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        } else {
            echo "<script>alert('Course details Not Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        }
    }
}

function update_category(){
    include("inc/db1.php");
    if(isset($_POST['btn_cat'])){
        // $id = $_GET['course_edit'];
        foreach($_GET as $key =>$data){
            $id= $_GET[$key]=base64_decode(urldecode($data));
         }
        $cat_id = $_POST['category1'];
        $lang=$_POST['language'];
        $levels=$_POST['levels'];
        $sub_cat_id=$_POST['subcategory'];
        $up = $con->prepare("update courses set cat_id='$cat_id',sub_cat_id='$sub_cat_id',language='$lang',levels='$levels' where c_id='$id'");
        // $insert_subCat=$con->prepare("INSERT INTO `sub_cat` (`sub_cat_name`, `cat_id`) VALUES ('$sub_cat_name', '$cat_id')");
        // $insert_subCat->setFetchMode(PDO::FETCH_ASSOC);
        // $insert_subCat->execute();
        //executing the statement
        if ($up->execute()) {
            echo "<script>  alert('Prices Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        } else {
            echo "<script>alert('Price Not Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        }
    }
    
        if(isset($_POST['upload'])){
            // $id = $_GET['course_edit'];
            foreach($_GET as $key =>$data){
                $id= $_GET[$key]=base64_decode(urldecode($data));
             }
            $course_title=$_POST['title'];
            $target_path="";
            $target_path=$target_path.basename($_FILES['file']['name']);
            // $name=$_FILES['file'];
            // $file_name=$_FILES['file']['name'];
            // $file_type=$_FILES['file']['type'];
            // $temp_name=$_FILES['file']['tmp_name'];
            // $file_size=$_FILES['file']['size'];
            // $file_destination="/e_learning/".$file_name;
            //if(move_uploaded_file($temp_name,$file_destination)){
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_path)){
                $up = $con->prepare("update courses set video='$target_path', course_title='$course_title' where c_id='$id'");
    
                //executing the statement
                if ($up->execute()) {
                    echo "<script>  alert('Video Updated Sucesfully') </script>";
                   // echo "<script>window.open('index.php?cat','_self')</script>";
                } else {
                    echo "<script>alert('Video Not Updated Sucesfully') </script>";
                   // echo "<script>window.open('index.php?cat','_self')</script>";
                }
            }


        }


}
function update_category1(){
   
    include("inc/db1.php");
        if(isset($_POST['upload'])){
            // $id = $_GET['course_edit'];
            foreach($_GET as $key =>$data){
                $id= $_GET[$key]=base64_decode(urldecode($data));
             }
            $course_title=$_POST['title'];
            // $target_path="";
            // $target_path=$target_path.basename($_FILES['file']['name']);
            // $name=$_FILES['file'];
            // $file_name=$_FILES['file']['name'];
            // $file_type=$_FILES['file']['type'];
            // $temp_name=$_FILES['file']['tmp_name'];
            // $file_size=$_FILES['file']['size'];
            // $file_destination="/e_learning/".$file_name;
            //if(move_uploaded_file($temp_name,$file_destination)){
                // if(move_uploaded_file($_FILES['file']['tmp_name'],$target_path)){
                $up = $con->prepare("update courses set  course_title='$course_title' where c_id='$id'");
    
                //executing the statement
                if ($up->execute()) {
                    echo "<script>  alert('Video Updated Sucesfully') </script>";
                   // echo "<script>window.open('index.php?cat','_self')</script>";
                } else {
                    echo "<script>alert('Video Not Updated Sucesfully') </script>";
                   // echo "<script>window.open('index.php?cat','_self')</script>";
                }
            }


        }

function update_minimum(){
    include("inc/db1.php");
   
    if (isset($_POST['btncourse_goal1'])) {
        //  $id = $_GET['course_edit'];
        foreach($_GET as $key =>$data){
            $id= $_GET[$key]=base64_decode(urldecode($data));
         }
        $before_course = $_POST['min_requirement'];
        $up = $con->prepare("update courses set before_course='$before_course' where c_id='$id'");
        //executing the statement
        if ($up->execute()) {
            echo "<script>  alert('Course Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        } else {
            echo "<script>alert('Course Not Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        }
    }
    if (isset($_POST['btncourse_goal'])) {
        // $id = $_GET['course_edit'];
        foreach($_GET as $key =>$data){
            $id= $_GET[$key]=base64_decode(urldecode($data));
         }
        $after_course = $_POST['after_course'];
        $up = $con->prepare("update courses set after_course='$after_course' where c_id='$id'");
        //executing the statement
        if ($up->execute()) {
            echo "<script>  alert('Course Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        } else {
            echo "<script>alert('Course Not Updated Sucesfully') </script>";
           // echo "<script>window.open('index.php?cat','_self')</script>";
        }
    }



}
function course_aim(){
    echo  '
    <form method="post">
        <div id="c_edit_input1">
            <input type="text" name="after_course" required />
            <a>100</a> <br clear="All"/>
            <button name="btncourse_goal"> Save</button> 
        </div> 
         
    </form>
    
    ';
}

function course_details(){
    echo' <form method="post">
    <textarea name="textArea1"  required ></textarea>
    <button name="btn_details"> Save</button>
    <h2> Course Basic Information</h2>
            <div id="course_share">
                <center>
                    <select name="prices" id="prices">
                        <option value="10">10$</option>
                        <option value="20">20$</option>
                        <option value="30">30$</option>
                        <option value="40">40$</option>
                        <option value="50">50$</option>
                        <option value="60">60$</option>
                        <option value="70">70$</option>
                        <option value="80">80$</option>
                        <option value="90">90$</option>
                        <option value="100">100$</option>
                        <option value="110">110$</option><option value="150">150$</option>
                        <option value="160">160$</option><option value="170">170$</option>
                        
                    </select>
                    <select name="discounts" id="discounts">
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="0">No discount</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                    </select>
                </center>  
            </div>
    ;
    </form>
';
// if(isset($_POST['btn_details'])){
//     include("inc/db1.php");
//     $get_price=$_POST['prices'];
//     $id = $_GET['course_edit'];
//     $up = $con->prepare("update courses set price='$get_price' where c_id='$id'");
//     //executing the statement
//     $up->execute();
//     }
// }
}
?>
<!--
If i want to close my tag in the tag itself then i have to put value to provide 
the value in it other wise if i have a seperate closing tag then i have to put the 
value just after the starting tag and infront of the closing tag

Using the margin auto while styling any kind of div takes that partiular div horizontally in its 
particular line.
   // $check->setFetchMode(PDO::FETCH_ASSOC);
        // $check->execute();
        // //Hence, i will be getting the datas in the form of table where the datas can be fetched 
        // //providing the particular indexing.  
        // $count = $check->rowCount();
        // if ($count == 1) {
        //     echo "<script>  alert('Already Added') </script>";
        // } else {
        //     //firing the queries to insert  datas in the database.
        //     $add_course = $con->prepare("insert into courses(c_name) values('$course_name')");
        //     //executing the statement
        //     if ($add_course->execute()) {
        //         echo "<script>  alert(' Added Sucesfully') </script>";
        //         echo "<script>window.open('/e_learning/admin/course_goal.php','_self')</script>";
        //     } else {
        //         echo "<script>alert('Added Sucesfully') </script>";
        //         echo "<script>window.open('/e_learning/admin/course_goal.php','_self')</script>";
            //}
    //}

-->