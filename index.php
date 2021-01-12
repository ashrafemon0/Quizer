<?php include "db.php";?>
<?php
session_start();
$_SESSION['score'] = 0;
	$query = "SELECT * FROM questions";

	$result = $mysqli->query($query) OR die($mysqli->error.__LINE__);
	$total = $result->num_rows;

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
		<h2>Test Your PHP Knowledge</h2>
		<p>This a Multipole Choice Quiz For Test your Knoeledge on Php</p>
		<ul>
			<li><strong>Number Of Quwstions</strong><?php echo $total;?></li>
			<li><strong>Type: </strong>Multipole Choice</li>
			<li><strong>Estimated Time: </strong><?php echo $total * .5?> Miniutes</li>

		</ul>
		<a href="question.php?n=1" class="start">Start Quiz</a>
	</div>
</main>
<footer>
	<div class="container">
	<p>CoppyWritte@2018 Php Quizzer</p>
	</div>
</footer>
</body>
</html>