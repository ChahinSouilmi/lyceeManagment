<?php

include_once 'dbh.inc.php';
if (isset($_POST['submit'])) {
   
$niveau = mysqli_real_escape_string($conn,$_POST['niveau']);
$section = mysqli_real_escape_string($conn,$_POST['section']);
$indice = mysqli_real_escape_string($conn,$_POST['indice']);

if (empty($niveau)||empty($section)||empty($indice)) {
    echo " <script>
    alert ('Tous les champs sont obligatoires vide');
    </script>";
    exit ;
}else {
    
$sql ="Select * from classe where niveau='$niveau' and indice='$indice' and section='$section' ";
$query = mysqli_query($conn,$sql);

if (mysqli_num_rows($query) > 0 ) {
    echo " <script>
    alert ('la classe existe');
    </script>";
    header('Location: http://localhost/lycee/admin/creeclasse.php?classe=existe');
    exit ;
}else{

//-----------------------> Insert data into db
$sqli="INSERT INTO classe(niveau,indice,section) VALUES('$niveau','$indice','$section')";
$queryi = mysqli_query($conn,$sqli);
if ($queryi) {
    echo "<script>
    alert ('la classe a ete cree');
    </script>";
    sleep(2);
    header('Location: http://localhost/lycee/admin/creeclasse.php?success');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Location: http://localhost/lycee/admin/creeclasse.php?sql=err');
}
}
}

}

?>
