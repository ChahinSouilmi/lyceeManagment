<?php  
 //delete.php
 $connect = mysqli_connect("localhost", "root", "", "checker");  
 if(isset($_POST["id_c"]))  
 {  
      $sql = "Delete  FROM classe WHERE id_c = '".$_POST["id_c"]."'";  
      $result = mysqli_query($connect, $sql);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>