<div class="col-md-10 mx-auto post-form">
	<h1 class="text-center mb-4">投稿一覧</h1>
	<hr class="solid mb-5">

	<table class="table user-list table-hover table-dark rounded-lg">
		<thead class="thead table-borderless">
			<tr>
				<th scope="col">#</th>
				<th scope="col">ユーザ名</th>

				<th scope="col">タイトル</th>
				<th scope="col">タグ</th>

				<th scope="col">イメージ</th>
				<th scope="col">公開状況</th>
				<th scope="col">投稿日時</th>

				<th scope="col">内容</th>
				<th scope="col">詳細</th>

				<th scope="col">修正</th>
				<th scope="col">削除</th>


			</tr>
		</thead>
		<tbody>

			<!-- Select All Posts FROM DB -->
			<?php

			$query = "SELECT * FROM posts";
			$view_all_posts = mysqli_query($connection, $query);
			if (!$view_all_posts) {
				die("Connection Failed " . mysqli_error($connection));
			}
			$post_rows = 1;

			while ($row = mysqli_fetch_assoc($view_all_posts)) {
				$post_id = $row['post_id'];
				$post_user = $row['post_user'];
				$post_title = $row['post_title'];
				$post_tags = $row['post_tags'];
				$post_image = $row['post_image'];
				$post_status = $row['post_status'];
				$post_date = $row['post_date'];
				$post_content = $row['post_content'];



				echo "<tr>";
				echo "<th scope='row'>$post_rows</th>";

				echo "<td>$post_user</td>";
				echo "<td>$post_title</td>";
				echo "<td>$post_tags</td>";
				echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
				echo "<td>$post_status</td>";

				echo "<td>$post_date</td>";
				echo "<td style='max-width: 10rem'>$post_content</td>";
				echo "<td><a role='button' class='btn btn-outline-info' href='posts.php?source=view_post&p_id={$post_id}'>詳細</a></td>";

				echo "<td><a role='button' class='btn btn-outline-primary' href='posts.php?source=edit_post&p_id={$post_id}'>修正</a></td>";

				echo "<td><a role='button' class='btn btn-outline-danger' href='posts.php?source=delete_post&p_id={$post_id}'>削除</a></td>";

				echo "</tr>";

				$post_rows++;
			}
			?>

		</tbody>
	</table>

</div>