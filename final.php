<?php session_start(); ?>

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
   			<h2>You're Done!</h2>
   			<p>Congrats! You have completed the test</p>
   			<p>Final Score: <?php echo $_SESSION['score']; ?></p>
   			<a href="question.php?n=1" class="start">Take Again</a>
 		</div>
 	</main>
 	<footer>
 		<div class="container">
 			Copyright &copy; 2016, Haria PHP Quizzer
 		</div>
 	</footer>
	
</body>
</html>