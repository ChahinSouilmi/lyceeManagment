<?php
	
include_once 'header.php';
session_start();
require_once 'inc/dbh.inc.php';
if (!isset($_SESSION['a_uid'])) {
	header("Location: ./index.php");}
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
	<label> Choisissez une classe
<select name="classe">
	<option>Choisir une classe</option>
	<?php

        $sql = "SELECT * FROM classe ORDER BY niveau ASC" ;
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
<br>
<div>
<input type="number" name="heure" placeholder="14" />
</div>
<br>
<div>
<input type="text" name="matiere" placeholder="entrez la matière" />
</div>
<br>
<div><input type="submit" name="submit" value="Ajouter" /></div>
</form>
<br>
<div>
<?php
if(isset($_POST['submit'])){

$classe = mysqli_real_escape_string($conn,$_POST['classe']);
$jour = mysqli_real_escape_string($conn,$_POST['jours']);
$temps = mysqli_real_escape_string($conn,$_POST['heure']);
$matiere = mysqli_real_escape_string($conn,$_POST['matiere']);

$sql0="SELECT * from classe where id_c='$classe'";
$query0 = mysqli_query($conn,$sql0);

$row0 = $query0->fetch_assoc();
$id_c = $row0['id_c'];
if (empty($classe)||empty($jour)||empty($temps)||empty($matiere)) {
    	echo "  <script>
    	alert ('champs vide');
    	</script>";
    	exit ;
	}else {
		$sql5 ="SELECT * from heurs where idc='$classe' and jour='$jour' and temps='$temps'";
		$query5 = mysqli_query($conn,$sql5);
		
		
		if (mysqli_num_rows($query5) == 0) {

    		$sqli="INSERT INTO heurs(idc,jour,temps,matiere) VALUES('$classe','$jour','$temps','$matiere')";
			$queryi = mysqli_query($conn,$sqli);
		
			if ($queryi) {
				echo "<script>
				alert ('Matiere ajouter avec success');
				</script>";
			}
		else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		}else {
			echo "<script>
			alert ('un cours deja existe dans ce temps');
			</script>";
		}
	}
}
?>
