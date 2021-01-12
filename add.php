<?php include 'db.php';?>

<?php
//Get Post Variable
if (isset($_POST['submit'])) {
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$Correct_choice = $_POST['Correct_choice'];
	// Choice array
	$choices = array();
	$choices[1]= $_POST['choice1'];
	$choices[2]= $_POST['choice2'];
	$choices[3]= $_POST['choice3'];
	$choices[4]= $_POST['choice4'];
	$choices[5]= $_POST['choice5'];

	//question Query
	$query = "INSERT INTO `questions`(question_number, text) VALUES('$question_number','$question_text')";

	//run query
	$inser_row = $mysqli->query($query) or die($mysqli->error.__Line__);
	//validate
	if ($inser_row ) {
		foreach ($choices as $choice => $value) {
			if ($value != '') {
				if ($Correct_choice == $choice) {
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
				//query
				$query = "INSERT INTO `choices`(questions_number,is_correct,text) VALUES('$question_number','$is_correct','$value')";
				$insert_row = $mysqli->query($query) or die($mysqli->error.__Line__);
				//validate
				if ($insert_row) {
					continue;
				}else{
					die('Error: ('.$mysqli->errno.')'.$mysqli->error);
				}
			}
		}

		$msg = 'Question Has been added';
	}

}

	//Get Total Question
		$query = "SELECT * FROM `questions`";

		//get Result
		$result = $mysqli->query($query) or die($mysqli->error.__Line__);
		$total = $result->num_rows;

		$next = $total+1;

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
		<h2>Add A Question</h2>
		<?php 
		if (isset($msg)) {
			echo '<p>'.$msg.'<p>';
		}

		?>
		<form action="" method="post">
			<p>
			<label>Questions Number: </label>
			<input type="number" value="<?php echo $next;?>" name="question_number">
			</p>
			<p>
			<label>Questions Test: </label>
			<input type="text" name="question_text">
			</p>
			<p>
			<label>Choice #1: </label>
			<input type="text" name="choice1">
			</p>
			<p>
			<label>Choice #2: </label>
			<input type="text" name="choice2">
			</p>
			<p>
			<label>Choice #3: </label>
			<input type="text" name="choice3">
			</p>
			<p>
			<label>Choice #4: </label>
			<input type="text" name="choice4">
			</p>
			<p>
			<label>Choice #5: </label>
			<input type="text" name="choice5">
			</p>
			<p>
			<label>Correct Choice Number: </label>
			<input type="number" name="Correct_choice">
			</p>
			<p>
			<input type="submit" name="submit" value="Submit">
			</p>
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