<?php  
 if(isset($_POST["id_c"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "checker");  
      $query = "SELECT * FROM classe WHERE id_c = '".$_POST["id_c"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Section</label></td>  
                     <td width="70%">'.$row["section"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>niveau</label></td>  
                     <td width="70%">'.$row["niveau"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>indice</label></td>  
                     <td width="70%">'.$row["indice"].'</td>  
                </tr>  
              
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>