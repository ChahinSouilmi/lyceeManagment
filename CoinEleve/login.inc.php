<?php
if(isset($_POST['submit'])) {
    require '../inc/dbh.inc.php';
    $user = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if (empty($user)||empty($pwd)) {
        header("Location: ./loginE.php?emptyfields");
        exit();
    }else{
        $sql="SELECT * from eleve where uid=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ./loginE.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
             $pwdCheck =password_verify($pwd, $row['pwd']);   
             if ($pwdCheck == false) {
                header("Location: ./loginE.php?error=wrongpwd");
                exit();
             }else if ($pwdCheck == true) {
                 session_start();
                 $_SESSION['uid'] = $row['uid'];
                $_SESSION['nom'] = $row['nom_e'];
                  $_SESSION['classe_e'] = $row['classe_e'];
                  $_SESSION['id_e'] = $row['id_e'];
                 header("Location: ./dashboard.php?loginE=success");
                exit();
             }
            }else {
                header("Location: ./loginE.php?error=nouser");
                exit();
            }
        }
    }


}
else {
    header("Location: ./loginE.php");
    exit();

}
