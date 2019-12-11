<?php  
 $connect = mysqli_connect("localhost", "root", "", "checker");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $section = mysqli_real_escape_string($connect, $_POST["section"]);  
      $indice = mysqli_real_escape_string($connect, $_POST["indice"]);  
      $niveau = mysqli_real_escape_string($connect, $_POST["niveau"]);  
        
      if($_POST["id_c"] != '')  
      {  
           $query = "  
           UPDATE classe   
           SET section='$section',   
           indice='$indice',   
           niveau='$niveau',           
           WHERE id_c='".$_POST["id_c"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO classe(niveau, indice, section)  
           VALUES('$niveau', '$indice', '$section');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM classe";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Classe</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' .$row["niveau"]. $row["section"] .$row["indice"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id_c"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id_c"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 