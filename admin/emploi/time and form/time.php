
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lycee";

$conn = mysqli_connect($servername, $username, $password,$dbname);


$sql = "select * from classe1";
$query=mysqli_query($conn,$sql);



$ss="SELECT classe1.mat,matiere.matiere FROM classe1 LEFT JOIN matiere ON classe1.mat=matiere.mat";
 $retval = mysqli_query($conn,$ss);
 $matiere=array("0");

 while($rows= mysqli_fetch_assoc($retval)) {
   
  
 

array_push($matiere,"{$rows['matiere']}"); 

}


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Schedule Template | CodyHouse</title>
</head>
<body>
  <header class="cd-main-header text-center flex flex-column flex-center">
    <p class="margin-top-md margin-bottom-xl">👈 <a class="cd-article-link" href="https://codyhouse.co/gem/schedule-template">Article &amp; Download</a></p>

    <h1 class="text-xl">Schedule Template</h1>
  </header>

  <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <div class="cd-schedule__timeline">
      <ul>
        <li><span>08:00</span></li>
        <li><span>09:00</span></li>
        
        <li><span>10:00</span></li>
        
        <li><span>11:00</span></li>
        
        <li><span>12:00</span></li>
        
        <li><span>13:00</span></li>
        
        <li><span>14:00</span></li>
        
        <li><span>15:00</span></li>
        
        <li><span>16:00</span></li>
       
        <li><span>17:00</span></li>
        
        <li><span>18:00</span></li>
      </ul>
    </div> <!-- .cd-schedule__timeline -->
 <div class="cd-schedule__events">
      <ul>
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>lundi</span></div>
          <?php
          while($row = mysqli_fetch_assoc($query))
{
  $z=explode("-",$row['lundi']);
  echo('<ul> 
  <li class="cd-schedule__event">
    <a data-start="'.$z[0].'" data-end="'.$z[1].'"  data-content="event-yoga-1" data-event="event-3" href="#0">
      <em class="cd-schedule__name">'.$matiere[$row['mat']].'</em>
    </a>
  </li>
</ul>');

?>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>mardi</span></div>
          <?php
         
  $z=explode("-",$row['mardi']);
  echo('<ul> 
  <li class="cd-schedule__event">
    <a data-start="'.$z[0].'" data-end="'.$z[1].'"  data-content="event-yoga-1" data-event="event-3" href="#0">
      <em class="cd-schedule__name">'.$matiere[$row['mat']].'</em>
    </a>
  </li>
</ul>');

?>
         
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>mercredi</span></div>
  
          <?php
      
  $z=explode("-",$row['mercredi']);
  echo('<ul> 
  <li class="cd-schedule__event">
    <a data-start="'.$z[0].'" data-end="'.$z[1].'"  data-content="event-yoga-1" data-event="event-3" href="#0">
      <em class="cd-schedule__name">'.$matiere[$row['mat']].'</em>
    </a>
  </li>
</ul>');

?>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>jeudi</span></div>
  
          <?php
       
  $z=explode("-",$row['jeudi']);
  echo('<ul> 
  <li class="cd-schedule__event">
    <a data-start="'.$z[0].'" data-end="'.$z[1].'"  data-content="event-yoga-1" data-event="event-3" href="#0">
      <em class="cd-schedule__name">'.$matiere[$row['mat']].'</em>
    </a>
  </li>
</ul>');

?>
        </li>
  
        <li class="cd-schedule__group">
          <div class="cd-schedule__top-info"><span>vendredi</span></div>
  
          <?php
       
  $z=explode("-",$row['vendredi']);
  echo('<ul> 
  <li class="cd-schedule__event">
    <a data-start="'.$z[0].'" data-end="'.$z[1].'"  data-content="event-yoga-1" data-event="event-3" href="#0">
      <em class="cd-schedule__name">'.$matiere[$row['mat']].'</em>
    </a>
  </li>
</ul>');

?>
        </li>
        <li class="cd-schedule__group">
            <div class="cd-schedule__top-info"><span>samedi</span></div>
    
            <?php
         
  $z=explode("-",$row['samedi']);
  echo('<ul> 
  <li class="cd-schedule__event">
    <a data-start="'.$z[0].'" data-end="'.$z[1].'"  data-content="event-yoga-1" data-event="event-3" href="#0">
      <em class="cd-schedule__name">'.$matiere[$row['mat']].'</em>
    </a>
  </li>
</ul>');
}
?>
          </li>
      </ul>
    </div>
  
    <div class="cd-schedule-modal">
      <header class="cd-schedule-modal__header">
        <div class="cd-schedule-modal__content">
          <span class="cd-schedule-modal__date"></span>
          <h3 class="cd-schedule-modal__name"></h3>
        </div>
  
        <div class="cd-schedule-modal__header-bg"></div>
      </header>
  
      <div class="cd-schedule-modal__body">
        <div class="cd-schedule-modal__event-info"></div>
        <div class="cd-schedule-modal__body-bg"></div>
      </div>
  
      <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>
    
  <?php




?>
    <div class="cd-schedule__cover-layer"></div>
  </div> <!-- .cd-schedule -->

  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/main.js"></script>
</body>
</html>


