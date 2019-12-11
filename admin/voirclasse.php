<?php
include_once 'header.php';
require_once 'inc/dbh.inc.php';

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


<h2>Liste des classes</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">niveau</th>
      <th scope="col">section</th>
      <th scope="col">indice</th>
    </tr>
  </thead>
  <tbody>
  <?php
include_once 'inc/dbh.inc.php';
$sql = "SELECT * FROM classe " ;
$query = mysqli_query($conn,$sql);
if ($query) {
    $resu= $query->fetch_assoc();
    $i=1;
while($rows = $query->fetch_assoc()) {
   
  
    echo"    <tr>
    <th scope='row'>$i</th>
    <td>".$rows['niveau']."</td>
    <td>".$rows['section']."</td>
    <td>".$rows['indice']."</td>
    </tr>";
    $i=$i+1;
  
    }
}
else {
    echo "error";
}
?>


  </tbody>
</table>