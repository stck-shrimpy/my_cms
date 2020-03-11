<?php include("includes/header.php") ?>
<?php include("includes/navigation.php") ?>

<!-- Count Rows DB -->
<?php
$query = "SELECT * FROM posts";
$all_posts = mysqli_query($connection, $query);
$posts_count = mysqli_num_rows($all_posts);

$query = "SELECT * FROM users";
$all_users = mysqli_query($connection, $query);
$users_count = mysqli_num_rows($all_users);

$query = "SELECT * FROM users WHERE user_role = '一般会員'";
$subscribers = mysqli_query($connection, $query);
$subscribers_count = mysqli_num_rows($subscribers);

$query = "SELECT * FROM comments";
$all_comments = mysqli_query($connection, $query);
$comments_count = mysqli_num_rows($all_comments);

?>


<div class="container-fluid bg-white">
	<div class="row">

		<?php include("includes/side_nav.php") ?>

		<div class="col-md-10">

			<div class="row mt-4 ml-4">
				<div class="col-md-6">
					<div class="jumbotron bg-white">
						<h1 class="display-4" id="welcome-title">旅ログにようこそ！</h1>
						<p class="lead pt-5" id="welcome-content">このページでは投稿とユーザに関する情報が確認できます</p>
					</div>
				</div>
				<div class="col-md-6 pt-5" id="weather-widget">
					<div class="card bg-light float-right">
						<a class="weatherwidget-io  rounded" href="https://forecast7.com/ja/35d71139d73/tokyo/" style="width: 28rem" data-label_1="TOKYO" data-label_2="WEATHER" data-font="ヒラギノ角ゴ Pro W3" data-days="3" data-theme="weather_one">東京の天気</a>
					</div>
				</div>
			</div>

			<div class="row ml-4">

				<div class="col-md-3">
					<div class="card text-white" style="background-color: #2c786c" id="card-box">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<i class="far fa-clipboard fa-3x"></i>
								</div>
								<div class="col-md-6 text-right">
									<h3><?php echo $posts_count ?></h3>
									<h6>投稿</h6>

								</div>
							</div>
						</div>
						<a href="posts.php?source=view_all_posts" class="stretched-link"></a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card text-white" style="background-color: #f07b3f" id="card-box">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<i class="far fa-user fa-3x"></i>
								</div>
								<div class="col-md-6 text-right">
									<h3><?php echo $users_count ?></h3>
									<h6>ユーザ</h6>

								</div>
							</div>
						</div>
						<a href="users.php?source=view_all_users" class="stretched-link"></a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card text-white" style="background-color: #FFCE56" id="card-box">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<i class="far fa-smile fa-3x"></i>
								</div>
								<div class="col-md-6 text-right">
									<h3><?php echo $subscribers_count ?></h3>
									<h6>一般会員</h6>

								</div>
							</div>
						</div>
						<a href="users.php?source=view_all_users" class="stretched-link"></a>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card text-white" style="background-color: #2d4059" id="card-box">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<i class="far fa-comments fa-3x"></i>
								</div>
								<div class="col-md-6 text-right">
									<h3><?php echo $comments_count ?></h3>
									<h6>コメント</h6>
								</div>
							</div>
						</div>
					</div>
					<a href="comments.php?source=view_all_comments" class="stretched-link"></a>
				</div>

			</div>

			<div class="row mt-5 ml-4">
				<div class="col-md-12 pb-5">
					<canvas id="myChart" height="100"></canvas>
				</div>
			</div>

		</div>

	</div>
</div>

<script>
	var ctx = document.getElementById('myChart');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['投稿', 'ユーザ', '一般会員', 'コメント'],
			datasets: [{
				label: '',
				data: [<?php echo $posts_count ?>, <?php echo $users_count ?>, <?php echo $subscribers_count ?>, <?php echo $comments_count ?>],
				backgroundColor: [
					'#2c786c',
					'#f07b3f',
					'#FFCE56',
					'#2d4059',

				],


			}]
		},
		options: {
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						min: 0,
						stepSize: 5,
					}


				}],
				xAxes: [{
					gridLines: {
						display: false
					},
					maxBarThickness: 100,
				}],
			}
		}
	});
</script>


<?php include("includes/footer.php") ?>