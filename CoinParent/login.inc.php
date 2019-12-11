<?php
if(isset($_POST['submit'])) {
    require 'dbh.inc.php';
    $user = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if (empty($user)||empty($pwd)) {
        header("Location: ./loginP.php?emptyfields");
        exit();
    }else{
        $sql="SELECT * from parent where p_uid=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ./loginP.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
             $pwdCheck =password_verify($pwd, $row['p_pw']);   
             if ($pwdCheck == false) {
                header("Location: ./loginP.php?error=wrongpwd");
                exit();
             }else if ($pwdCheck == true) {
                 session_start();
                 $_SESSION['p_uid'] = $row['p_uid'];
                  $_SESSION['p_nom'] = $row['p_nom'];
                  $_SESSION['id_fils'] = $row['id_fils'];
                 header("Location: ./dashboard.php?login=success");
                exit();
             }
            }else {
                header("Location: ./loginP.php?error=nouser");
                exit();
            }
        }
    }


}
else {
    header("Location: ./loginP.php");
    exit();

}

?>





