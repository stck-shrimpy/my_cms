<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #004445">
	<a class="navbar-brand" href="index.php"><i class="fas fa-bus mr-2"></i>

		旅ログ</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">

		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<?php if ($_SESSION['user_role'] === "管理者") {
					echo "<a class='nav-link' href='admin'>管理者ページ</a>";
				} else {
					echo "<a class='nav-link disabled' href='admin' role='button' aria-disabled='true'>管理者ページ</a>";
				}
				?>
			</li>
			<?php if (!$_SESSION['user_status'] == "login") { ?>
				<li class='nav-item'>
					<a class='nav-link active' href='registration.php'>会員登録</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link active' href='login.php'>ログイン</a>
				</li>

			<?php } else { ?>
				<li class="nav-item active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						メニュー
					</a>
					<div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">

						<a class="dropdown-item" href="admin/users.php?source=edit_user&u_id=<?php echo $_SESSION['user_id'] ?>">会員情報</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="includes/logout.php">ログアウト</a>
					</div>
				</li>

			<?php } ?>

		</ul>

	</div>
</nav>