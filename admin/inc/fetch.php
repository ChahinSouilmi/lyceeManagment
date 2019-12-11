<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "checker");  
 if(isset($_POST["id_c"]))  
 {  
      $query = "SELECT * FROM classe WHERE id_c = '".$_POST["id_c"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>