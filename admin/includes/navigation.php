<!-- Navbar  Top-->
<nav class="navbar navbar-expand-md navbar-dark">
	<a class="navbar-brand" href="index.php"><i class="fas fa-bus mr-2"></i>旅ログ</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">

		<ul class="navbar-nav ml-auto">
			<li class="nav-item side">
				<a class="nav-link text-white" href="../index.php">

					ホーム画面
				</a>
			</li>
			<!-- <li class="nav-item side">
				<a class="nav-link text-white" href="../index.php">

					会員情報
				</a>
			</li> -->
			<li class="nav-item side">
				<a class="nav-link text-white" href="../logout.php">

					ログアウト
				</a>
			</li>
			

			<div class="nav-control d-md-none d-lg-none d-xl-none">
			<li class="nav-item side">
				<a class="nav-link text-white" href="index.php">

					ダッシュボード
				</a>
			</li>
			<li class="nav-item side dropdown">
				<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

					投稿
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="posts.php?source=add_post">作成</a>
					<a class="dropdown-item" href="posts.php?source=view_all_posts">投稿一覧</a>
				</div>
			</li>
			<li class="nav-item side dropdown">
				<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

					ユーザ
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="users.php?source=add_user">ユーザ登録</a>
					<a class="dropdown-item" href="users.php?source=view_all_users">ユーザ一覧</a>
				</div>
			</li>

			<li class="nav-item side">
				<a class="nav-link text-white" href="comments.php?source=view_all_comments">

					コメント一覧
				</a>
			</li>
			</div>

		</ul>

	</div>

</nav>
<!-- END -->