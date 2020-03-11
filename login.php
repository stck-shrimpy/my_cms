<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>


<!-- Processing Registration Form -->
<?php
if (isset($_POST['submit'])) {

	$email      = string_escape($_POST['email']);
	$password   = string_escape($_POST['password']);

	$query = "SELECT * FROM users WHERE user_email = '{$email}' ";
	$select_user = mysqli_query($connection, $query);


	while ($row = mysqli_fetch_array($select_user)) {
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];

		$user_email = $row['user_email'];
		$user_password = $row['user_password'];
		$user_role = $row['user_role'];
	}

	$verified_password = password_verify($password, $user_password);
	$num_users = mysqli_num_rows($select_user);

	if ($num_users < 1) {
		$message_email = "メールアドレスが間違っています！";
	}

	if (!$verified_password) {
		$message_password = "パスワードが間違っています！";
	} else {
		$_SESSION['user_role'] = $user_role;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_name'] = $user_name;
		$_SESSION['user_status'] = "login";

		header("Location: index.php?message=success");
	}
}


?>

<body style="background-color: #eeeeee">

	<div class="container login">

		<div class="row justify-content-md-center mt-5">
			<div class="col-md-7 mt-5">
				<form class="form login text-white py-5" action="login.php" method="post">

					<!-- Warning Message -->
					<?php if (!empty($message_email)) { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong><?php echo $message_email ?></strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					<?php } ?>

					<?php if (!empty($message_password)) { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong><?php echo $message_password ?></strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					<?php } ?>
					<!-- END -->

					<h3 class="text-center">ログイン</h3>
					<div class="form-group">

						<label for="exampleInputEmail">メールアドレス</label>
						<input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="email@google.com">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword">パスワード</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password">
					</div>
					<button type="submit" name="submit" class="btn btn-info mt-2">ログイン</button>
				</form>
			</div>
		</div>
	</div>






	<?php include("includes/footer.php") ?>