<?php include("includes/db.php") ?>
<?php include("includes/functions.php") ?>
<?php ob_start(); ?>
<?php session_start() ?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/b5a2f3a8fa.js" crossorigin="anonymous"></script>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<!-- Weather Widget -->

	<script>
		!function(d, s, id) {
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

<body class="index">
<div id="page-container">