<?php
session_start();

?>
  <!DOCTYPE html>
  <html lang='en'>
    <head>
      <!-- Required meta tags -->
      <meta charset='utf-8' />
      <meta
        name='viewport'
        content='width=device-width, initial-scale=1, shrink-to-fit=no'
      />
      <link rel='icon' href='img/favicon.png' type='image/png' />
      <title>Login</title>
      <!-- Bootstrap CSS -->
      <link rel='stylesheet' href='../css/bootstrap.css' />
      <link rel='stylesheet' href='../css/flaticon.css' />
      <link rel='stylesheet' href='../css/themify-icons.css' />
      <link rel='stylesheet' href='../vendors/owl-carousel/owl.carousel.min.css' />
      <link rel='stylesheet' href='../vendors/nice-select/css/nice-select.css' />
      <!-- main css -->
      <link rel='stylesheet' href='../css/style.css' />
    </head>
  
    <body>
      <!--================ Start Header Menu Area =================-->
      <header class='header_area white-header'>
  
  
          <nav class='navbar navbar-expand-lg navbar-light'>
            <div class='container'>
              <!-- Brand and toggle get grouped for better mobile display -->
              <a class='navbar-brand' href='index.html'>
                <img class='logo-2' src='img/logo2.png' alt='' />
              </a>
              <button
                class='navbar-toggler'
                type='button'
                data-toggle='collapse'
                data-target='#navbarSupportedContent'
                aria-controls='navbarSupportedContent'
                aria-expanded='false'
                aria-label='Toggle navigation'
              >
                <span class='icon-bar'></span> <span class='icon-bar'></span>
                <span class='icon-bar'></span>
              </button>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div
                class='collapse navbar-collapse offset'
                id='navbarSupportedContent'
              >
                <ul class='nav navbar-nav menu_nav ml-auto'>
                  <li class='nav-item'>
                    <a class='nav-link' href='index.html'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='about-us.html'>About</a>
                  </li>
                
                 
                  <li class='nav-item active'>
                    <a class='nav-link' href='contact.html'>Contact</a>
                  </li>
                 
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!--================ End Header Menu Area =================-->
  
      <!--================Home Banner Area =================-->
      <section class='banner_area'>
        <div class='banner_inner d-flex align-items-center'>
          <div class='overlay'></div>
          <div class='container'>
            <div class='row justify-content-center'>
              <div class='col-lg-6'>
                <div class='banner_content text-center'>
                  
                  <div class='page_link'>
                    <a href='#'><h2>Welcome<?php echo $_SESSION['nom']  ?></h1> </a>
                    <br>

                    <br>
                     
                    <a href='../inc/logout.inc.php' class='genric-btn danger circle arrow'>Se decconecter !<span class='ti-arrow-right'></span></a>            </div>
                    <a href='./dashboard.php' class='genric-btn primary circle arrow'>Retouner vers le dashboard !<span class='ti-arrow-left'></span></a>            </div>

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================End Home Banner Area =================-->
  
      <!--================Contact Area =================-->
        <div class='container'>
        <table class='table'>
<thead>
  <tr>
  
    <th scope='col'>Date  </th>
    <th scope='col'>heur</th>

  

  </tr>
</thead> <tbody>
         
        <?php
include_once '../inc/dbh.inc.php';
$ide =$_SESSION['id_e'];
$sql = "SELECT * FROM abscence where id_eleve = '$ide'" ;
$query = mysqli_query($conn,$sql);
if ($query) {
    $resu= $query->fetch_assoc();
    echo"    <tr>
  
    
    <td>".$resu['date_absence']."</td>
    <td>".$resu['heur_ab']."</td>
    </tr>";
while($rows = $query->fetch_assoc()) {
    echo"    <tr>
   
    <td>".$rows['nom_e']."</td>
    <td>".$rows['date_absence']."</td>
    <td>".$rows['heur_ab']."</td>
    </tr>";
    
    }
}
else {
    echo "error";
}
?>
           </tbody>
        </table> 
         
          
            <div class='row'>
            <div class='col-lg-12 align-content-center'>
                 
                
              </form>
            </div>
          </div>
        </div>
      </section>
      <!--================Contact Area =================-->
  
  
  
      </div>
  
      <!-- Modals error -->
  
      <div id='error' class='modal modal-message fade' role='dialog'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button
                type='button'
                class='close'
                data-dismiss='modal'
                aria-label='Close'
              >
                <i class='ti-close'></i>
              </button>
              <h2>Sorry !</h2>
              <p>Something went wrong</p>
            </div>
          </div>
        </div>
      </div>
      <!--================End Contact Success and Error message Area =================-->
  
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src='js/jquery-3.2.1.min.js'></script>
      <script src='js/popper.js'></script>
      <script src='js/bootstrap.min.js'></script>
      <script src='js/stellar.js'></script>
      <script src='vendors/nice-select/js/jquery.nice-select.min.js'></script>
      <script src='vendors/owl-carousel/owl.carousel.min.js'></script>
      <script src='js/owl-carousel-thumb.min.js'></script>
      <script src='js/jquery.validate.min.js'></script>
      <script src='js/jquery.ajaxchimp.min.js'></script>
      <script src='js/mail-script.js'></script>
      <!--gmaps Js-->
      <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE'></script>
      <script src='js/gmaps.min.js'></script>
      <script src='js/contact.js'></script>
      <script src='js/theme.js'></script>
    </body>
  </html>

