<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>


<!-- Processing Registration Form-->
<?php
if (isset($_POST['submit'])) {
	$user_name  = string_escape($_POST['user_name']);
	$last_name  = string_escape($_POST['last_name']);
	$first_name = string_escape($_POST['first_name']);
	$password   = string_escape($_POST['password']);
	$email      = string_escape($_POST['email']);

	$hashed_password = password_encrypt($password);

	if (empty($user_name) || empty($last_name) || empty($first_name) || empty($password) || empty($email)) {
		$message = "全て記入してください！";
		$status = "danger";
	} else {
		$query  = "INSERT INTO users (user_name, user_lastname, user_firstname, user_password, user_email, user_date) ";
		$query .= "VALUES ('$user_name', '$last_name', '$first_name', '$hashed_password', '$email', now())";

		$create_user = mysqli_query($connection, $query);

		if (!$create_user) {
			die("Registration Failed: " . mysqli_error($connection));
		}

		$message = "ようこそ！　会員登録が完了しました。";
		$status = "success";
	}
}

?>

<body style="background-color: #eeeeee">

	<div class="container registration">
		<div class="row justify-content-md-center">
			<div class="col-md-6 mt-5">
				<form class="form registration text-white" action="registration.php" method="post">

					<!-- Warning & Success Message -->
					<?php if (!empty($message)) { ?>
						<div class="alert alert-<?php echo "$status" ?> alert-dismissible fade show" role="alert">
							<strong><?php echo $message ?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					<?php } ?>


					<!-- END -->




					<h3 class="text-center">会員登録</h3>
					<div class="form-group">
						<label for="exampleInputUsername">ユーザー名</label>
						<input type="text" class="form-control" id="exampleInputUsername" name="user_name" placeholder="えびふらい">
					</div>
					<div class="form-group">
						<label for="exampleInputLastName">姓</label>
						<input type="text" class="form-control" id="exampleInputLastName" name="last_name" placeholder="田中">
					</div>
					<div class="form-group">
						<label for="exampleInputFirstName">名</label>
						<input type="text" class="form-control" id="exampleInputFirstName" name="first_name" placeholder="こんにゃく">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail">メールアドレス</label>
						<input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="email@google.com">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword">パスワード</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password">
					</div>
					<button type="submit" name="submit" class="btn btn-info mt-2">会員登録</button>
				</form>
			</div>
		</div>
	</div>

	<?php include("includes/footer.php") ?>