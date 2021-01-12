<?php session_start(); ?>
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
			<h2>You Are Done</h2>
			<p>Congrates! You Have complete The Test</p>
			<p>Final Score: <?php echo $_SESSION['score'];?></p>
			<a href="process.php?n=1" class="start">Take Again</a>
	</div>
</main>
<footer>
	<div class="container">
	<p>CoppyWritte@2018 Php Quizzer</p>

	</div>
</footer>
</body>
</html>