<script src="../b/js/jquery-3.4.1.min.js"></script>
<script src="../b/js/bootstrap.js"></script>
<script src="../b/js/jquery.easing.min.js"></script>
<link rel="stylesheet" href="../b/css/bootstrap.min.css">
<link rel="stylesheet" href="a.css">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lycee";
$days=array('lundi','mardi','mercredi','jeudi','vendredi','samedi');
$conn = mysqli_connect($servername, $username, $password,$dbname);
 $time=array("08:00-10:00","10:00-12:00","12:00-14:00", "14:00-16:00","16:00-18:00");
 $ss="SELECT classe1.mat,matiere.matiere FROM classe1 LEFT JOIN matiere ON classe1.mat=matiere.mat";
 $retval = mysqli_query($conn,$ss);
 $matiere=array();

 while($rows= mysqli_fetch_assoc($retval)) {
   
  
 

array_push($matiere,"{$rows['matiere']}"); 

}
$sql  = 'show tables like \'classe%\'';
$classe=array();
$retval = mysqli_query($conn,$sql);
while($rows= mysqli_fetch_assoc($retval)){
	
	array_push($classe,"{$rows["Tables_in_lycee (classe%)"]}"); 
}

?>
 

<!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" action="#" method="post">
            <!-- progressbar -->
            <ul id="progressbar">
			<li class="active">select class</li>
                <li class="active">select day</li>
                <li>select time</li>
                <li>Add mat</li>
            </ul>
            <!-- fieldsets -->
			<fieldset>
                <h2 class="fs-title">select classe</h2>
                <h3 class="fs-subtitle">select the classe to update</h3>
                <select name="classe">

<?php
$i=0;
while($i<count($classe)){
 echo('<option value="'.$classe[$i].'">'.$classe[$i].'</option>');
$i++;
}?>
</select>
<input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">select day</h2>
                <h3 class="fs-subtitle">select the day to update</h3>
                <select name="day">

<?php
$i=0;
while($i<6){
 echo('<option value="'.$days[$i].'">'.$days[$i].'</option>');
$i++;
}?>
</select>
<input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Select time</h2>
                <h3 class="fs-subtitle">select time:</h3>
                <select name="time">

<?php
$i=0;
while($i<7){
 echo('<option value="'.$time[$i].'">'.$time[$i].'</option>');
$i++;
}?>
</select>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Choose subject</h2>
                <h3 class="fs-subtitle">select subject to add</h3>
                <select name="subject">

<?php
$i=0;
while($i<count($matiere)){
 echo('<option value"'.$matiere[$i].'>'.$matiere[$i].'</option>');
$i++;
}?>
</select>
<input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
        <!-- link to designify.me code snippets -->
        
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->
<script>
    //jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});


</script>

<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
	$selected_classe=$_POST['classe'];
	$selected_day= $_POST['day']; 
	$selected_time= $_POST['time'];
	$selected_subject= $_POST['subject'];
	$search="SELECT mat from matiere WHERE matiere='".$selected_subject."'";
	$searched = mysqli_query($conn,$search);
	$results= mysqli_fetch_assoc($searched);

	$sql = "UPDATE classe1 SET ".$selected_day."="."'".$selected_time."'"." WHERE mat='".$results[mat]."'";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	}


?>