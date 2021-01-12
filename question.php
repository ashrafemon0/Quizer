<?php include 'db.php';?>
<?php session_start(); ?>
<?php

//Set Questions Number
$number = (int) $_GET['n'];

		//Get Total Question
		$query = "SELECT * FROM `questions`";

		//get Result
		$result = $mysqli->query($query) or die($mysqli->error.__Line__);
		$total = $result->num_rows;

//Get Question 
$query = "SELECT * FROM `questions` WHERE question_number = $number";

//Get Result
$result = $mysqli->query($query) OR die($mysqli->error.__LINE__);

$questions = $result->fetch_assoc();



//Get Choice 
$query = "SELECT * FROM `choices` WHERE questions_number = $number";

//Get Result
$choices = $mysqli->query($query) OR die($mysqli->error.__LINE__);


?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Quizzer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	<div class="container">
		<h1>PHP Quizzer</h1>
	</div>
</header>
<main>
	<div class="container">
		<div class="current">Question <?php echo $questions['question_number'];?> Of <?php echo $total;?></div>
		<?php echo $questions['text'];?>
		<form action="process.php" method="post">
			<ul class="choice">
				<?php while($row = $choices->fetch_assoc()) : ?>
					<li><input type="radio" name="choice" value="<?php echo $row['id'];?>"><?php echo $row['text'];?></li>
				<?php endwhile;?>	
			</ul>
			<input type="submit" name="submit" value="Submit">
			<input type="hidden" name="number" value="<?php echo $number;?>">
		</form>
	</div>
</main>
<footer>
	<div class="container">
	<p>CoppyWritte@2018 Php Quizzer</p>

	</div>
</footer>
</body>
</html>