
<?php


require_once './dbh.inc.php';
if (!isset($_SESSION['p_uid'])) {
  header("Location: ./loginP.php");
}
?>

<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>

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
  }
</style>
<center>
  <br>
  <form action="#" method="post">

    </select>
    </label>
    </div>

  </form>
  <br>
  <div>
    <?php
      $sqle = "select * from eleve where id_e ='".$_SESSION['id_fils']."'";
      $querye =mysqli_query($conn, $sqle);
      $resu = $querye->fetch_assoc();

      $selected_cl = $resu['classe_e'];




      $sql = "SELECT * from heurs where idc='$selected_cl' and jour='Lundi' order by temps ASC";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        $resu = $query->fetch_assoc();
        echo "<table class='table'>
<thead>
  <tr>
    <th scope='col'>#</th>
    <th scope='col'>8H00</th>
    <th scope='col'>9H00</th>
    <th scope='col'>10H00</th>
    <th scope='col'>11H00</th>
    <th scope='col'>14H00</th>
    <th scope='col'>15H00</th>
    <th scope='col'>16H00</th>
    <th scope='col'>17H00</th>
  

  </tr>
</thead> <tbody>";

        echo "<tr>
      <th scope='row'>Lundi</th>
      <td>" . $resu['matiere'] . "</td>";
        while ($rows = $query->fetch_assoc()) {
          echo "
        <td>" . $rows['matiere'] . "</td>
    ";
        }
        echo "</tr>";
      } else {
        echo "error";
      }
    

    ?>
      <?php
     
      $sql2 = "SELECT * from heurs where idc='$selected_cl' and jour='Mardi' order by temps ASC";
      $query = mysqli_query($conn, $sql2);
      if ($query) {
        $resu = $query->fetch_assoc();
        echo "<tr>
      <th scope='row'>mardi</th>
      <td>" . $resu['matiere'] . "</td>";
        while ($rows1 = $query->fetch_assoc()) {
          echo "
        <td>" . $rows1['matiere'] . "</td>
    ";
        }
        echo "</tr>";
      } else {
        echo "error";
      }
    

    ?>

<?php
     

$sql3 = "SELECT * from heurs where idc='$selected_cl' and jour='Mercredi' order by temps ASC";
$query = mysqli_query($conn, $sql3);
if ($query) {
  $resu = $query->fetch_assoc();
  echo "<tr>
<th scope='row'>Mercredi</th>
<td>" . $resu['matiere'] . "</td>";
  while ($rows2 = $query->fetch_assoc()) {
    echo "
  <td>" . $rows2['matiere'] . "</td>
";
  }
  echo "</tr>";
} else {
  echo "error";
}


?>
<?php
$selected_cl = $resu['classe_e'];

$sql4 = "SELECT * from heurs where idc='$selected_cl' and jour='Jeudi' order by temps ASC";
$query = mysqli_query($conn, $sql4);
if ($query) {
  $resu = $query->fetch_assoc();
  echo "<tr>
<th scope='row'>Jeudi</th>
<td>" . $resu['matiere'] . "</td>";
  while ($rows3 = $query->fetch_assoc()) {
    echo "
  <td>" . $rows3['matiere'] . "</td>
";
  }
  echo "</tr>";
} else {
  echo "error";
}


?>

<?php


$sql5 = "SELECT * from heurs where idc='$selected_cl' and jour='Vendredi' order by temps ASC";
$query = mysqli_query($conn, $sql5);
if ($query) {
  $resu = $query->fetch_assoc();
  echo "<tr>
<th scope='row'>Vendredi</th>
<td>" . $resu['matiere'] . "</td>";
  while ($rows3 = $query->fetch_assoc()) {
    echo "
  <td>" . $rows3['matiere'] . "</td>
";
  }
  echo "</tr>";
} else {
  echo "error";
}


?>
<?php
$selected_cl = $resu['classe_e'];

$sql5 = "SELECT * from heurs where idc='$selected_cl' and jour='Samedi' order by temps ASC";
$query = mysqli_query($conn, $sql5);
if ($query) {
  $resu = $query->fetch_assoc();
  echo "<tr>
<th scope='row'>Samedi</th>
<td>" . $resu['matiere'] . "</td>";
  while ($rows4 = $query->fetch_assoc()) {
    echo "
  <td>" . $rows4['matiere'] . "</td>
";
  }
  echo "</tr>";
} else {
  echo "error";
}


?>
  </div>