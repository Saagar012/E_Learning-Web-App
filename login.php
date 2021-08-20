
<?php
    $login=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'db1.php';
        $username=$_POST["u_name"];
        $password=$_POST["u_pass"];
        $sql=$con->prepare("Select * from users where username= '$username' AND password='$password'");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        if($sql->rowCount()==1){
            $login=true;
            // session_start();
            // $_SESSION['loggedin']=true;
            // $_SESSION['username']=$username;
            // header("location:index1.php");
        }
        else{
            echo"Invalid credentials";
        }
       
    }
?>
<?php
    if($login){
        echo"<script>  alert(' You can now logged in') </script>";
    }
?>

