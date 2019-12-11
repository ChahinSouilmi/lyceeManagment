<?php
session_start();
if(isset($_POST['submit'])) {
    require 'dbh.inc.php';
   $uid = $_POST['uid'];
   $pwd = $_POST['pwd'];

    if (empty($uid)||empty($pwd)) {
        header("Location: ../index.php?emptyfields");
        exit();
    }else{
        $sql="SELECT * from l_admin where a_uid=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
             $pwdCheck =password_verify($pwd, $row['a_pw']);   
             if ($pwdCheck == true) {
                header("Location: ../index.php?error=wrongpwd");
                exit();
             }else if ($pwdCheck == false) {
                 
                 $_SESSION['a_uid'] = $row['a_uid'];
               
                 header("Location: ../index.php?login=sucess");
                 session_start();
                exit();
             }
            }else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }


}
else {
    header("Location: ../index.php");
    exit();

}

?>





