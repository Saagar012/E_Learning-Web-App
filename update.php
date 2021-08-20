<?php 
include("inc/db1.php");
if ($_POST) {
    $id      = $_POST['c_id'];
    $course_name = trim($_POST['course_name']);
    $instructor    = trim($_POST['instructor']);
    $price   = (float) $_POST['price'];
    $discount     = (int) $_POST['discount'];
    $title   = trim($_POST['title']);
    $description = trim($_POST['description']);
    $image=trim($_POST['image']);
    $video=trim($_POST['video']);
    //echo "Update";
  
    try {
        //    $sql = 'UPDATE courses SET c_name = :course_name, instructor = :instructor WHERE c_id = :id';
           $sql = $con->prepare("update courses set c_name='$course_name',instructor='$instructor',price='$price', discount='$discount',course_title='$title', course_desc='$description',course_img='$image',video='$video'where c_id='$id'");
        //  $sql = 'UPDATE courses SET c_name = :course_name, instructor = :instructor WHERE c_id = :id';
        //   $stmt = $con->prepare($sql);
        //  $stmt->bindParam(":course_name", $course_name);
        //  $stmt->bindParam(":instructor", $instructor);
        //  $stmt->bindParam(":price", $price);
        //  $stmt->bindParam(":qty", $qty);
        //  $stmt->bindParam(":image", $image);
        //  $stmt->bindParam(":description", $description);
        //  $stmt->bindParam(":id", $id);
      
        // $image->setFetchMode(PDO::FETCH_ASSOC);
        // $image->execute();
        //  $stmt->execute();
        //  $stmt->execute();
        if ($sql->execute()) {
            header("Location: edit.php?id=".$id."&status=updated");
            exit();
            // echo $instructor;
            // echo $course_name;
            //  echo $id;
            // echo "<script>  alert('Language Updated Sucesfully') </script>";
            // echo "<script>window.open('index.php?lang','_self')</script>";
        }
         header("Location: edit.php?id=".$id."&status=fail_update");
        exit();
         
        // if ($stmt->rowCount()) {
        //     header("Location: edit.php?id=".$id."&status=updated");
        //     exit();
        // }
       
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: edit.php?id=".$id."&status=fail_update");
    exit();
}
?>