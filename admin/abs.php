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
function afficher_eleve($conn)
{
  $sql = "SELECT * FROM eleve";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    // $resu = $query->fetch_assoc();
    $output = "";
    while ($rows = $query->fetch_assoc()) {
      $output .= "<option value='" . $rows['id_e'] . "'>" . $rows['nom_e'] . " " . $rows['prenom_e'] . "</option>";
    }
  } else {
    echo "error";
  }

  return $output;
}


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<form action="" method="POST">
  <div class="row">
    <div class="col-lg-4">
      <input type="date" class="form-control form-control-lg" name="date" id="">
    </div>
    <div class="col-lg-4">
      <select name="heur" class="form-control form-control-lg" id="hrs">
        <option>8H00</option>
        <option>9H00</option>
        <option>10H00</option>
        <option>11H00</option>
        <option>14H00</option>
        <option>15H00</option>
        <option>16H00</option>
        <option>17H00</option>
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-4"> <select name="cls" class="form-control form-control-lg" id="cls">
        <?php echo afficher_classe($conn);  ?>
      </select></div>
  
      <div class="col-lg-4">
        <select name="elev" class="form-control form-control-lg" id="elev">
          <?php echo afficher_eleve($conn);  ?>
        </select>
      </div>





    <button type="submit" name="submit" class="btn btn-primary">Marqué absent </button>
</form>

<?php



?>
<script>
  $(document).ready(function() {
    $('#cls').change(function() {
      var class_id = $(this).val();
      $.ajax({
        url: "fetch-ele.php",
        method: "POST",
        data: {
          class_id: class_id
        },
        success: function(data) {
          $('#elev').html(data);
        }
      });
    });
  });
</script>

</html>
<?php
if (isset($_POST['submit'])) {
  $cl_eleve = $_POST['elev'];
  $date = $_POST['date'];
  $heur = $_POST['heur'];
  if (empty($cl_eleve) || empty($date) || empty($heur)) {
    echo "<script> alert('champs vides')</script>";
  } else {
    $sql = "INSERT INTO `abscence`(id_eleve,date_absence,heur_ab) VALUES ('$cl_eleve','$date','$heur')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      echo "<script> alert('eleve marquée absent')</script>";
    } else {
      header("Location: ./abs.php?error");
    }
  }
}
