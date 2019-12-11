<?php
include_once 'header.php';
require_once 'inc/dbh.inc.php';
function afficher_classe($conn)
{
  $output = "";
  $sql = "SELECT * FROM classe ";
  $query = mysqli_query($conn, $sql);
  if ($query) {

    while ($rows = $query->fetch_assoc()) {
      $output .= "<option value='" . $rows['id_c'] . "'>" . $rows['niveau'] . "" . $rows['section'] . "" . $rows['indice'] . "</option>";
    }
  }
  return $output;
}
?>
<style>
.listecl {
	font-family: sans-serif;
font-size: 20px;
letter-spacing: 1.2px;
word-spacing: -0.2px;
color: #000000;
font-weight: 700;
text-decoration: none;
font-style: bold;
font-variant: small-caps;
text-transform: capitalize;
	margin-top: 5px;
}</style>

<!--
<center>
<select name="classe" class="listecl" id="">
   <?php //echo afficher_classe($conn) ; ?>
</select>
</center>
-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">prenom</th>
      <th scope="col">moyenne</th>
    </tr>
  </thead>
  <tbody>
  <?php
include_once 'inc/dbh.inc.php';
$sql = "SELECT * FROM eleve " ;
$query = mysqli_query($conn,$sql);
if ($query) {
    $resu= $query->fetch_assoc();
    
while($rows = $query->fetch_assoc()) {
    echo"    <tr>
    <th scope='row'>".$rows['id_e']."</th>
    <td>".$rows['nom_e']."</td>
    <td>".$rows['prenom_e']."</td>
    <td>".$rows['moyenne_e']."</td>
    </tr>";
    
    }
}
else {
    echo "error";
}
?>


  </tbody>
</table>