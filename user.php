<?php
echo "<a href='/e_learning/admin/user.php?user_id=4'>User</a>";
?>
<br/> <br/>
<?php
if(isset($_GET['user_id']) && $_GET['user_id']==4){
    echo"Hey, User 4 !";
}
// if(isset($_GET['page']) && $_GET['page']==2){
//     echo" Second Page";
// }
?>