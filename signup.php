<?php
$showAlert=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db1.php';
    $username=$_POST["u_name"];
    $email=$_POST["u_email"];
    $phone=$_POST["u_phone"];
    $password=$_POST["u_pass1"];
    $cpassword=$_POST["u_pass2"];
    $exists=false;
    if($password==$cpassword && $exists==false){
        $sql=$con->prepare("INSERT INTO `users` ( `username`, `email`, `password`, `phone`, `date`) VALUES ('$username', '$email', '$password', '$phone', current_timestamp())");
        if ($sql->execute()) {
            $showAlert=true;
        
        }   
    }
    else{
        echo"<script>  alert('Passwords donot match') </script>";
    }

}
?>

<?php
if($showAlert){
   echo' <script>
    swal("Good job!", "You clicked the button!", "success");
    </script>';
    // echo"<script>  alert('Sign Up Sucessful. You can now Login') </script>";
    
}
?>
