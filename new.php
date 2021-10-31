
<?php
session_start();

if(isset($_REQUEST['u_email'])|| isset($_REQUEST['u_pass'])){
    $u_email = $_REQUEST["u_email"];
    $password = $_REQUEST["u_pass"];
    $_SESSION['email']=$u_email;
    $_SESSION['u_pass']=$password;
    echo "<script> location.href='http://localhost/e_learning/new1.php' </script>";
}

      // if( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    //    // echo "<script>  alert(' You are not logged in. Please login to CheckOut') </script>";
    //     //header("location:/e_learning/index1.php");
    //     //echo $_SESSION['email'];
    // }
?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: pink;  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    
    <center> <h1> Student Login Form </h1> </center>   
    <form>  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="u_email" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="u_pass" required>  
            <button type="submit">Login</button>   
            <input type="checkbox" checked="checked"> Remember me   
            <button type="button" class="cancelbtn"> Cancel</button>   
            Forgot <a href="#"> password? </a>   
        </div>   
    </form>     
</body>     
</html>  