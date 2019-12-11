<?php
session_start();
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
<center>
	<br>
	<form action="#" method="post"> 
	<div>
	<label> Choisissez une Classe
<select name="cls">
	<option>Choisir une Classe</option>
	<?php

        $sql = "SELECT DISTINCT * FROM classe ORDER BY niveau ASC" ;
        $query = mysqli_query($conn,$sql);
        if ($query) {
        $resu= $query->fetch_assoc();
        while($rows = $query->fetch_assoc()) {
            echo"  
            <option value='".$rows['id_c']."'>".$rows['niveau'].$rows['section'].$rows['indice']."</option>";
            
    }
}
else {
    echo "error";
}
        ?>
</select>
</label>
</div>
<br>

<br><div>
<label> Choisissez un jour
<select name="jours">
	<option>Choisir un jour</option>
	<option>Lundi</option>
	<option>Mardi</option>
	<option>Mercredi</option>
	<option>Jeudi</option>
	<option>Vendredi</option>
	<option>Samedi</option>

</select>
</label></div>
<br><input type="submit" name="submit" value="Voir emploi" />
</form>
<br>
<div>
<?php
if(isset($_POST['submit'])){

$selected_cl = $_POST['cls'];
$selected_jr = $_POST['jours'];


$sql = "SELECT * from heurs where idc='$selected_cl' and jour='$selected_jr' order by temps ASC";
$query = mysqli_query($conn,$sql);
if ($query) {
    $resu= $query->fetch_assoc();
echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Temps</th>
      <th scope="col">Matière</th>
    </tr>
  </thead>
  <tbody>
      ';

      echo"    <tr>
      <td>".$resu['temps']."H00</td>
      <td>".$resu['matiere']."</td>
      </tr>";
while($rows = $query->fetch_assoc()) {
    echo"    <tr>
    <td>".$rows['temps']."H00</td>
    <td>".$rows['matiere']."</td>
    </tr>";
    
    }
}
else {
    echo "error";
}

}
echo '</center>
  </tbody>
</table>';
?>
</div>