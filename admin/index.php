
<?php
session_start();
if (isset($_SESSION['a_uid'])) {
    include_once 'header.php';
    echo "<div class='card text-center'>
    <br>
    <br>
  <div class='card-header'>
    
 OPTIONS
  </div>
  <div class='card-body'>
  <div class='row'>
      <div class='col'> 
           <i class='far fa-address-card fa-7x'></i>
            <p>Ajouter éleve </p>
        </div>
 
        <div class='col'> 
        <i class='fas fa-user-tie fa-7x'></i>
            <p>afficher les eleves </p>
        </div>
        <div class='col'> 
        <i class='fas fa-clock fa-7x'></i>
            <p>emploi du temps</p>
        </div>
      
       
  </div>
  <br>
  <div class='row'>
        
        <div class='col'> 
        <i class='fas fa-power-off fa-7x'></i>
            <p>Deconnexion</p>
        </div>   
        <div class='col'> 
        <i class= 'fas fa-graduation-cap fa-7x'></i>            <p>classes </p>
        </div>  
        </div>
 
  <i class='a'></i>
 </div>";
    # code...
}else 
{
echo "<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>

  <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel='stylesheet' href='css/adminlog.css'>
<!------ Include the above in your HEAD tag ---------->

  </head>
<body id='LoginForm'>
<div class='container'>

<div class='login-form'>
<div class='main-div'>
    <div class='panel'>
   <h2>Admin Login</h2>
   <p>Please enter your email and password</p>
   </div>
    <form id='Login' action='inc/login.inc.php' method='POST'>

        <div class='form-group' >


            <input type='text' name='uid' class='form-control' id='inputEmail' placeholder='Nom Utilisateur'>

        </div>

        <div class='form-group'>

            <input type='password' name='pwd' class='form-control' id='inputPassword' placeholder='Password'>

        </div>

        <input type='submit' name='submit' class='btn btn-primary'>

    </form>
    </div>

</div></div></div>


</body>
</html>
";


}


?>
