 <?php
session_start();
?> 
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
	<nav class="red darken-2">
		<div class="container">
			<div class="nav-wrapper">
			<a class="navbar-brand" href="index.html" style="font-size: 25px;"><img src="./images/logo.png" style ="height: 70px; padding:8px; color: transparent;" alt=""> </a>
				<a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
				<i class="material-icons">menu</i>
            </a>
			<ul class="right hide-on-med-and-down">
			<li>
              <a href="./recommend.html">Recommend to a doctor</a>
			</li>
			</ul>
				<!-- Side nav -->
				<ul id="side-nav" class="side-nav">
					<li>
						<div class="user-view">
							<div class="background">
								<img src="./images/ocean.jpg" alt="">
							</div>
						</li>
						<li>
							<a href="blood-pressure.html">
								<i class="material-icons">list</i> Blood Pressure</a>
						</li>
						<li>
							<a href="posts.html">
								<i class="fa fa-2x fa-thermometer-three-quarters"></i> Temperature</a>
						</li>
						<li>
							<a href="categories.html">
								<i class="fa fa-2x fa-heartbeat"></i> Heart Rate</a>
						</li>
						<li>
							<a href="commments.html">
								<img src="./images/accident.png" class="mr-4"> Fall Detection</a>
						</li>
						<li>
							<a href="users.html">
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
	<!-- <?php
	echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h4><i class="icon fa fa-check"></i>Success!</h4>
</div>';
?>
<script>
$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow");
});
</script> -->


	<!-- SECTION: STATS -->
	<section class="section section-stats center">
		<div class="container-fluid">
  		<div class="jumbotron" style="padding:3px 3px 3px 3px;">
			  <h5 class="">Mr. Vishandas Mehta's Dashboard</b>  </h5>
		  </div>
		  </div>
		<div class="row">
			<a href="blood-pressure.html" style="text-decoration:none;">
			<div class="col s6 ">
				<div class="card-panel red lighten-1 white-text center">
					<i class="material-icons medium">insert_emoticon</i>
					<h5>Blood Pressure(in bpm)</h5>
					<h3>162/65</h3>
					<div class="progress grey lighten-1">
						<div class="determinate white" style="width: 50%;"></div>
					</div>
				</div>
</a>
			</div>
			<a href="temperature.html" style="text-decoration:none;hover:none">
			<div class="col s6">
				<div class="card-panel center">
					<i class="fa fa-4x fa-thermometer-three-quarters"></i>
					<h5>Body Temperature <br> (in F)</h5>
					<h3 class="count">99</h3>
					<div class="progress grey lighten-1">
						<div class="determinate blue lighten-1" style="width: 50%;"></div>
					</div>
				</div>
</a>
			</div>
			<div class="col s6">
			<a href="heart-rate.html" style="text-decoration:none;hover:none">
				<div class="card-panel blue lighten-1 white-text center">
					<i class="fa fa-4x fa-heartbeat"></i>
					<h5>Pulse Rate</h5> <br>
					<h3 class="count">75</h3>
					<div class="progress grey lighten-1">
						<div class="determinate white" style="width: 50%;"></div> 
					</div>
				</div>
</a>
			</div>
			<div class="col s6">
			<a href="sleep.html" style="text-decoration:none;hover:none">
				<div class="card-panel center">
					<i class="fa fa-4x fa-bed"></i>
					<h5>Average Sleep(in hrs)</h5>
					<h3 class="count">7</h3>
					<div class="progress grey lighten-1">
						<div class="determinate blue lighten-1" style="width: 50%;"></div>
					</div>
				</div>
</a>
			</div>
		</div>
<br>
</section>
<section>
		<?php
          if(file_exists('DiseasePrediction/disease.txt') && file_exists('DiseasePrediction/res.csv')){
          $file = file_get_contents('DiseasePrediction/disease.txt');
          ?>

		<div class="card" id=ca>
			<div class=card-header>
				<h3>Predicted Ailment:&nbsp; <b><?php echo $file;?></b></h3>
			</div>


			<div class=card-body > 
				<div class=row>
					<div class="col-lg-6 ">

						<p>
							<h4>Symptoms</h4>
						</p>

						<?php
          include('DiseasePrediction/graph.php');
          ?>
					</div>
					<br>
					<div class="col-lg-6 "><br><br>
						<?php 
        $conf=(float) file_get_contents('DiseasePrediction/conf.txt');
        $color='';

        if($conf<30){
          $color='bg-danger';
        }
        else if($conf<50){
          $color='bg-warning';
        }
        else if($conf<60){
          $color='bg-info';
        }
        else{
          $color='bg-success';
        }
        ?>
						<p>
							<h4>Confidence Rate</h4>
						</p>
						<div class="progress" style="height:22px">
							<div class="progress-bar progress-bar-animated  progress-bar-striped <?php echo $color; ?> "
								style="width:<?php echo $conf; ?>%">
								<p class="h5 "><?php echo $conf; ?>%</p>
							</div>
						</div>
						<br>
						<div class='card'>

							<?php 
          
          #$_SEsSION['result']=1;
          if(!array_key_exists("result",$_SESSION) || $_SESSION['result']==0){
            /* $_POST['result']=1;

          if($_POST['result']==0){ */?>
							<br> <br>
							<h3 class=display-4> No recommended treatment available.</h3> <br> <br>
							<?php } else{ ?>
							<div class='card-header'>
								<p>
									<h4>Recommended Treatments</h4>
								</p>

							</div>
							<div class='card-body'>
								<?php include('DiseasePrediction/results.php'); ?>
							</div>

							<?php } ?>
						</div>


					</div>


				</div>



			</div>
			<div id=r class="row mx-auto">
				<button id=ap class="btn btn-success btn-md">Approve</button> &nbsp;
				<button id=de class='btn btn-danger btn-md'>Decline</button>
			</div>
		</div>


		<?php
        }
        ?>


		<div class='card text-center col-lg-6 mx-auto '>


			<div class='card-header'>
				<p>
					<h4>Previous Records</h4>
				</p>

			</div>
			<div class='card-body table-responsive '>
				<table class="table  table-bordered">
					<thead class="thead-light">
						<tr>
							<th >#</th>
							<th >Date</th>
							<th >Symptoms</th>
							<th >Ailment</th>
						</tr>
					</thead>
					<tbody>
						<tr class=>
							<th >1</th>
							<td>5 Aug 2019</td>
							<td>Fever, Chills, Cough</td>
							<td>Viral Fever</td>
						</tr>
						<tr>
							<th >2</th>
							<td>19 July 2019</td>
							<td>Sneezing, nasal congestion</td>
							<td>Nasal Infection</td>
						</tr>
						<tr>
							<th >3</th>
							<td>23 June 2019</td>
							<td>Chest Pain, Difficulty in breathing</td>
							<td>Pulmonary Edema</td>
						</tr>
					</tbody>
				</table>
			</div>


		</div>

		

	</section>


	<!-- FOOTER -->
	<footer class="section red darken-2 white-text center">
		<p>Vriddha Seva Panel Copyright &copy; 2019</p>
	</footer>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
	<script src="js/charts.js"></script>

	<script>
	$('#ap').click(
		function(){
			$('#r').hide();
		}
	);

	$('#de').click(
		function(){
			$('#r').hide();
			$('#ca').hide();
		}
	);
	</script>

	<script>
		// Custom JS & jQuery here
		window.onload = function () {
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

					// SELECT INIT
					$('select').material_select();

					// COUNTER
					$('.count').each(function () {
						$(this).prop('Counter', 0).animate({
							Counter: $(this).text()
							// $(this).text() takes the number, so whatever in this text is
						}, {
							duration: 1000,
							// in 1s goes from 0 to the number
							easing: 'swing',
							step: function (now) {
								$(this).text(Math.ceil(now));
							}
						});
					});

					// COMMENTS - APPROVE & DENY
					$('.approve').click(function (e) {
						Materialize.toast('Comment Approved', 3000);
						e.preventDefault();
						// it's a link so we want to stop the default behaviour
					});
					$('.deny').click(function (e) {
						Materialize.toast('Comment Denied', 3000);
						e.preventDefault();
						// it's a link so we want to stop the default behaviour
					});
				});

				// QUICK TODOS
				$('#todo-form').submit(function (e) {
					// console.log($('#todo').val());

					const output = `
<li class="collection-item">
<div>${$('#todo').val()}
<a href="#" class="secondary-content delete">
    <i class="material-icons">close</i>
</a>
</div>
</li>
`;
					// in the output variable we're storing what the user has entered in the input filed

					$('.todos').append(output);
					// appending to our todo list so it shows in the UI

					$('#todo').val('');
					// clear input field

					Materialize.toast('Todo Added', 3000);
					// show a notification that the todo has been added

					e.preventDefault();
					// we want to prevent the form from actually submiting
				});

				// DELETE TODOS
				$('.todos').on('click', '.delete', function (e) {
					// $(this).parent().parent().remove();
					$(this).parent().parent().animate().fadeOut();
					// event delegation

					Materialize.toast('Todo Removed', 3000);
					// show a notification that the todo has been deleted

					e.preventDefault();
				});

				// FOR THE CKEDITOR
				CKEDITOR.replace('body');

			}, 1000);
			// PRELOADER

			var ctx = document.getElementById('chartContainer').getContext('2d');
			new Chart(ctx, config);
		}

		callgraph( <?php echo $data; ?> , <?php echo $label; ?> )
	</script>
</body>

</html>