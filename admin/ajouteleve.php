<?php
session_start();
include_once 'header.php';
include_once 'inc/dbh.inc.php';
?>
<br>

<br>
<h1>Ajouter un nouveau eleve</h1>
<br>

<form method="POST" action="inc/ajoutel.inc.php">
  <div class="row container">
      
    <div class="col">
      <input type="text" class="form-control" name="prenom" placeholder="Prenom">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="nom" placeholder="Nom">
    </div>

  </div>
  <br>
  <div class="row container" >
      <div class="col">
      <select class="form-control" name="classe">
        <?php

        $sql = "SELECT * FROM classe " ;
        $query = mysqli_query($conn,$sql);
        if ($query) {
        $resu= $query->fetch_assoc();
        echo"  
        <option value='".$resu['id_c']."'>".$resu['niveau']."".$resu['section']."".$resu['indice']."</option>";
        
        while($rows = $query->fetch_assoc()) {
    echo"  
    <option value='".$rows['id_c']."'>".$rows['niveau']."".$rows['section']."".$rows['indice']."</option>";
    
    }
}
else {
    echo "error";
}
        ?>
  
</select>
      </div>
      <div class="col">
      <input type="text" class="form-control" name="moy" placeholder="Moyenne">
      </div>
  </div>
  <br>
  <div class="row container">
      
      <div class="col">
        <input type="text" class="form-control" name="uid" placeholder="username">
      </div>
      <div class="col">
        <input type="password" class="form-control" name="pwd" placeholder="password">
      </div>
  
    </div>
  <br>
  <div class="row container">
      <div class="col"><input type="submit" value="submit" name="submit" class="btn btn-primary mb-2"></div>
    

  </div>
</form>
