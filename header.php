<?php include("function1.php") ?>
<div id="header">
    <div id="logo">
        <h2><a href="index.php"> CAVEONTECH</a></h2>
    </div>
    <div id="title">
        <h2>Admin Panel of E Learning System</h2>
    </div>
    <form method="POST">
        <div id="link">
            <h3> <button name="logOut"> LOGOUT</button></h3>
        </div>
    </form>
    <?php
    if(isset($_POST['logOut'])){
            session_destroy();
            header("location:/e_learning/admin/Admin_login.php");
    }
    ?>
</div>