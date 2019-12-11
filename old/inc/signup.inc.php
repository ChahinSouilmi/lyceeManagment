<?php
include_once 'dbh.inc.php';
if (isset($_POST['submit'])) {
$societe = mysqli_real_escape_string($conn,$_POST['nom']);
$nom = mysqli_real_escape_string($conn,$_POST['prenom']);
$tel = mysqli_real_escape_string($conn,$_POST['tel']);
$id_uni = mysqli_real_escape_string($conn,$_POST['son_id']);
$email = mysqli_real_escape_string($conn,$_POST['uid']);
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
//$pays = mysqli_real_escape_string($conn,$_POST['pays']);

$sql ="Select * from utilisateurs where u_mail='$email'";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
    $name_error = "Sorry... username already taken";
    header('Location: http://localhost/lycee/inscri.php?user=taken');
    exit ;
}else{
//-----------------------> Hash the password 
$hashed_pw = password_hash($pwd, PASSWORD_DEFAULT);
//-----------------------> Insert data into db
$sqli="INSERT INTO utilisateurs(u_societe,u_nom,u_tel,u_mail,u_mdp,u_adresse,u_pays) VALUES('$societe','$nom','$tel','$email','$hashed_pw','$adr','$pays')";
$queryi = mysqli_query($conn,$sqli);
if ($queryi) {
    echo "New record created successfully";
    header('Location: http://localhost/lycee/inscri.php?success');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location: http://localhost/lycee/inscri.php?sql=err');
}
}
}
