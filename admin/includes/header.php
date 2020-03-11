<?php include("includes/db.php") ?>
<?php include("includes/functions.php") ?>
<?php ob_start(); ?>
<?php session_start() ?>

<!-- Prevent Illegal Access -->
<?php
if (!isset($_SESSION['user_role'])) {
	header("Location: ../index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/b5a2f3a8fa.js" crossorigin="anonymous"></script>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
	<!-- ChartJS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

	</script>
	<!-- Weather Widget -->

	<script>
		! function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src = 'https://weatherwidget.io/js/widget.min.js';
				fjs.parentNode.insertBefore(js, fjs);
			}
		}

		(document, 'script', 'weatherwidget-io-js');
	</script>

	<title>旅ログ</title>
</head>

<body>