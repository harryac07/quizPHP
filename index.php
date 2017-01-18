
<?php include 'database.php' ?> <!--including database-->

<?php
/*
 *Get total questions
 */
$query="SELECT * FROM questions";

//Get results

$results=$mysqli->query($query) or die ($mysqli->error.__LINE__);
$total =$results->num_rows; // getting the number of rows in tables
//echo ($results);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Quizzer</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 "> <!--device ko anusaar device ko width laai lii vaneko-->
  <link rel="stylesheet" type="text/css" media="all" href="css/style.css" /><!--css file link -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  

  <script>
  	$(document).ready(function(){
  		
  		});
  </script>
  
 </head>
 <body>
 	<header>
 		<div class="container">
 			<h1>PHP Quizzer</h1>
 		</div>
 	</header>
 	<main>
 		<div class="container">
 				<h2>Test your PHP Knowledge</h2>
 				<p>This is a multiple choice quiz to test your Knowledge of PHP.</p>
 				<ul>
 					<li><strong>Number of Questions: </strong> <?php echo $total; ?></li>
 					<li><strong>Type: </strong> Multiple Choices </li>
 					<li><strong>Estimated Time: </strong> <?php echo $total*.5; ?>  Minutes </li>
 				</ul>
 				<a href="question.php?n=1" class="start"> Start Quiz</a>
 		</div>
 	</main>
 	<footer>
 		<div class="container">
 			Copyright &copy; 2016, Haria PHP Quizzer
 		</div>
 	</footer>
	
</body>
</html>