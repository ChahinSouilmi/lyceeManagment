
<?php
include_once 'dbh.inc.php';
if (isset($_POST['submit'])) {
$nom = mysqli_real_escape_string($conn,$_POST['nom']);
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
$id_f = mysqli_real_escape_string($conn,$_POST['id_f']);

if (empty($nom)||empty($uid)||empty($email)||empty($pwd)||empty($id_f)) {
    $name_error = "Sorry... empty fields";
    header('Location: ../signinp.php?empty');
}else{
$sql ="Select * from parent where p_uid='$uid'";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
    $name_error = "Sorry... username already taken";
    header('Location: ../signinp.php?usertaken');
    exit ;
}else{
//-----------------------> Hash the password 
$hashed_pw = password_hash($pwd, PASSWORD_DEFAULT);
//-----------------------> Insert data into db
$sqli="INSERT INTO parent(p_uid,p_pw,p_email,p_nom,id_fils) VALUES ('$uid','$hashed_pw','$email','$nom','$id_f')";
$queryi = mysqli_query($conn,$sqli);
if ($queryi) {
    echo "New record created successfully";
    header('Location: ../CoinParent/signinp.php??success');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location: ../signinp.php?sql=err');
}
}
}


}
