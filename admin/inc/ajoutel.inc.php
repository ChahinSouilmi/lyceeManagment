
<?php
include_once 'dbh.inc.php';
if (isset($_POST['submit'])) {
$nom = mysqli_real_escape_string($conn,$_POST['nom']);
$prenom = mysqli_real_escape_string($conn,$_POST['prenom']);
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
$classe = mysqli_real_escape_string($conn,$_POST['classe']);
$moy = mysqli_real_escape_string($conn,$_POST['moy']);

if (empty($nom)||empty($uid)||empty($prenom)||empty($pwd)||empty($moy)||empty($classe)) {
    $name_error = "Sorry... empty fields";
    header('Location: ../ajouteleve.php?empty');
}else{
$sql ="Select * from eleve where uid='$uid'";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
    $name_error = "Sorry... username already taken";
    header('Location: ../ajouteleve.php?usertaken');
    exit ;
}else{
//-----------------------> Hash the password 
$hashed_pw = password_hash($pwd, PASSWORD_DEFAULT);
//-----------------------> Insert data into db
$sqli="INSERT INTO eleve(nom_e,prenom_e,classe_e,moyenne_e,uid,pwd) VALUES('$nom','$prenom','$classe','$moy','$uid','$hashed_pw')";
$queryi = mysqli_query($conn,$sqli);
if ($queryi) {
    echo "New record created successfully";
    header('Location: ../ajouteleve.php??success');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location: ../ajouteleve.php?sql=err');
}
}
}


}

