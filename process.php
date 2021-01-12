<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

//Cheek to see if score is set error handle
	if (!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;

	}


	if ($_POST) {
		$number = $_POST['number'];
		$choice_number = $_POST['choice'];

		$next = $number+1;

		//Get Total Question
		$query = "SELECT * FROM `questions`";

		//get Result
		$result = $mysqli->query($query) or die($mysqli->error.__Line__);
		$total = $result->num_rows;

		//Correct Choice

		$query = "SELECT * FROM `choices` WHERE questions_number = $number AND is_correct = 1";

		//get Result
		$result = $mysqli->query($query) or die($mysqli->error.__Line__);

		//get row
		$row = $result->fetch_assoc();

		$Correct_choice = $row['id'];

		//compare
		if ($Correct_choice == $choice_number) {
			//Answare is Correct
			$_SESSION['score']++;

		}
		//Cheek If Last Question
		if ($number == $total) {
			header("Location: final.php");
			exit();
		}else{
			header("Location: question.php?n=".$next);
		}
	}
 
?>