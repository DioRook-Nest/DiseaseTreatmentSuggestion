 <?php
  if(file_exists('DiseasePrediction/res.csv')){
    $loc='doctor_details.php';
  }
  else{
    $loc='DiseasePrediction/runpy2.php';
  }
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
<link type="text/css" rel="stylesheet" href="css/styles.css" />
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>VridhhaSeva</title>
</head>
<body>
    <!-- NAVIGATION -->
	<nav class="red lighten">
    <div class="container">
        <div class="nav-wrapper">
        <a class="navbar-brand" href="index.html" style="font-size: 25px;"><img src="./images/logo.png" style ="height: 70px; padding:8px; color: transparent;" alt=""> </a>
            <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
             <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <a href="#">Dashboard</a>
                </li>
            </ul>
            <!-- Side nav -->
            <ul id="side-nav" class="side-nav">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="./images/ocean.jpg" alt="">
                        </div>
                        <a href="#">
                            <img src="./images/doc.png" alt="" class="circle">
                        </a>
                        <a href="#">
                            <span class="name white-text">Dr Rajesh Bhatia</span>
                        </a>
                        <a href="#">
                            <span class="email white-text">rajeshbhatia@gmail.com</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a href="blood-pressure.html">
                        <i class="material-icons">list</i> Blood Pressure</a>
                </li>
                <li>
                    <a href="temperature.html">
                        <i class="fa fa-2x fa-thermometer-three-quarters"></i> Temperature</a>
                </li>
                <li>
                    <a href="heart-rate.html">
                        <i class="fa fa-2x fa-heartbeat"></i> Heart Rate</a>
                </li>
                <li>
                    <a href="medical.php">
                        <img src="./images/accident.png" class="mr-4"> Fall Detection</a>
                </li>
                <li>
                    <a href="sleep.html">
                      <i class="material-icons">people</i> Sleep Pattern</a>
                  </li>
                <li>
                    <div class="divider"></div>
                </li>
                <li>
                    <a class="subheader">Account Controls</a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">settings</i> Settings</a>
                </li>
                <li>
                    <a href="login.html" class="waves-effect">
                        <i class="material-icons">power_settings_new</i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    </div>

      
<!-- SECTION: USERS -->
<section class="section section-users grey lighten-4">
        <div class="container">
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <span class="card-title">Dr Rajesh's Patients</span>
                  <table class="striped">
                    <thead>
                      <tr>
                        
                        <th>Name</th>
                        <th>Details</th>
                        <!-- <th>Email</th>
                        <th>Registered</th> -->
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                        <td>Vishandas Mehta</td>
                        <!-- <td>vishandas_mehta58@gmail.com</td>
                        <td>Jan 17th, 2019</td> -->
                        <td>
                          <a href=" <?php echo $loc; ?>" class="btn btn-sm" style="background-color: rgb(25, 150, 56)">Details</a>
                          <div class="badge badge-danger text-white" style="margin-top:7px">Emergency!!!</div>
                        </td>
                        
                      </tr>
                      <tr>
                       
                        <td>Smriti Barkha</td>
                        <!-- <td>barkhasmriti@gmail.com</td>
                        <td>Mar 3rd, 2019</td> -->
                        <td>
                          <a href=" <?php echo $loc; ?>" class="btn btn-sm" style="background-color: rgb(25, 150, 56)">Details</a>
                        </td>
                        
                      </tr>
                      <tr>
                        
                        <td>Eknath Walke</td>
                        <!-- <td>eknathwalke@gmail.com</td>
                        <td>Dec 15th, 2018</td> -->
                        <td>
                          <a href=" <?php echo $loc; ?>" class="btn" style="background-color: rgb(25, 150, 56)">Details</a>
                        </td>
                        
                      </tr>
                      <tr>
                        
                        <td>Durga Maheshwari</td>
                        <!-- <td>dmaheshwari@hotmail.com</td>
                        <td>Nov 10th, 2018</td> -->
                        <td>
                          <a href=" <?php echo $loc; ?>" class="btn" style="background-color: rgb(25, 150, 56)">Details</a>
                        </td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-action">
                  <ul class="pagination center">
                    <li class="disabled">
                      <a href="#" class="blue-text">
                        <i class="material-icons">chevron_left</i>
                      </a>                                                                                                                       
                    </li>
                    <li class="active blue lighten-2">
                      <a href="#" class="white-text number">1</a>
                    </li>
                    <li class="waves-effect">
                      <a href="#" class="blue-text">2</a>
                    </li>
                    <li class="waves-effect">
                      <a href="#" class="blue-text">3</a>
                    </li>
                    <li class="waves-effect">
                      <a href="#" class="blue-text">4</a>
                    </li>
                    <li class="waves-effect">
                      <a href="#" class="blue-text">5</a>
                    </li>
                    <li class="waves-effect">
                      <a href="#" class="blue-text">
                        <i class="material-icons">chevron_right</i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
    
    
      <!-- FOOTER -->
      <div style="background-color:rgba(226, 110, 110)">
      <footer class="section white-text center" >
        <p>Vriddha Seva Panel Copyright &copy; 2019</p>
      </footer>
    </div>
  
    
    
      <!-- ADD USER MODAL -->
      <div id="user-modal" class="modal">
        <div class="modal-content">
          <h4>Add User</h4>
          <form>
            <div class="input-field">
              <input type="text" id="name">
              <label for="name">Name</label>
            </div>
            <div class="input-field">
              <input type="email" id="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <input type="password" id="password">
              <label for="password">Password</label>
            </div>
            <div class="input-field">
              <input type="password" id="confirm-password">
              <label for="confirm-password">Confirm Password</label>
            </div>
          </form>

          <div class="modal-footer">
            <a href="#" class="modal-action modal-close btn blue white-text">Submit</a>
          </div>

        </div>
      </div>
    
    
    
      <!-- PRELOADER -->
      <div class="loader preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    
      <script>
        // Custom JS & jQuery here
    
        // HIDE SECTIONS
        $('section').hide();
        $('footer').hide();
        $('.fixed-action-btn').hide();
        // hiding all the sections initially so we can show the preloader
    
        setTimeout(function () {
          $(document).ready(function () {
            // SHOW SECTIONS
            $('section').fadeIn();
            $('footer').fadeIn();
            $('.fixed-action-btn').fadeIn();
            // HIDE PRELOADER
            $('.loader').fadeOut();
    
            // SIDENAV INIT
            $('.button-collapse').sideNav();
    
            // MODAL INIT
            $('.modal').modal();
          });
        }, 1000);
          // PRELOADER
    
      </script>
    </body>
    
    </html>