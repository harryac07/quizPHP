<?php include 'database.php' ?>
<?php session_start(); ?>
<?php
    // set question number
    $number =(int)$_GET['n'];

    /*
      Get total questions
    */
      $query="SELECT * FROM questions";
      //Get result
      $results=$mysqli->query($query) or die($mysqli->error.__LINE__);
      $total=$results->num_rows;

    /*
      * Get Question
    */
    $query ="SELECT * FROM `questions`
              WHERE  question_number =$number";
    // Get result
    $result=$mysqli->query($query) or die($mysqli->error.__LINE__); // fetching query and storing in variable result

    $question=$result->fetch_assoc(); // fetching the data (questions) 

    /*
      * Get Choices
    */
    $query ="SELECT * FROM `choices`
              WHERE  question_number =$number";
    // Get result
    $choices=$mysqli->query($query) or die($mysqli->error.__LINE__);

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
      <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
      <p class="question">
        <strong>
          <?php echo $question['text']; ?>
        </strong>
         <!-- What does PHP stands for?-->
      </p>
      <form method="post" action="process.php">
          <ul class="choices">
              <?php while($row=$choices->fetch_assoc()): ?>
                 <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"> <?php echo $row['text']; ?></li>
              <?php endwhile; ?>

          </ul>
          <input type="submit" vaue="submit">
          <input type="hidden" name="number" value="<?php echo $number; ?>">
      </form>
 		</div>
 	</main>
 	<footer>
 		<div class="container">
 			Copyright &copy; 2016, Haria PHP Quizzer
 		</div>
 	</footer>
	
</body>
</html>