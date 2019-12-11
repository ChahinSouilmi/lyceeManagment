
<?php
//fetch.php
$conn = mysqli_connect("localhost", "root", "", "checker");  
$output = ''; 
if(isset($_POST["class_id"]))
{
    $sql = "SELECT * FROM eleve where classe_e ='".$_POST["class_id"]."'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $resu = $query->fetch_assoc();
        $output .= " 
        <option value='".$resu['id_e']."'>". $resu['nom_e']." ".$resu['prenom_e']."</option>"  ;
        while ($rows = $query->fetch_assoc()) {
            $output .= " 
            <option value='".$rows['id_e']."'>". $rows['nom_e']." ".$rows['prenom_e']."</option>"  
           ;
           
       }
    }
 echo $output;
}
?>