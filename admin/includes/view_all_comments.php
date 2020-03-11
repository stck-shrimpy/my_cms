<div class="col-md-10 mx-auto post-form">
	<h1 class="text-center mb-4">コメント</h1>
	<hr class="solid mb-5">

	<table class="table user-list table-hover table-stripped rounded-lg">
		<thead class="thead table-borderless">
			<tr>
				<th scope="col">コメントID</th>
				<th scope="col">投稿ID</th>

				<th scope="col">ユーザID</th>
				<th scope="col">ユーザ名</th>

				<th scope="col">コメント内容</th>

				<!-- <th scope="col">修正</th> -->
				<th scope="col">削除</th>


			</tr>
		</thead>
		<tbody>

			<!-- Select All Comments FROM DB -->
			<?php

			$query = "SELECT * FROM comments ORDER BY comment_id DESC";
			$select_comments = mysqli_query($connection, $query);
			if (!$select_comments) {
				die("Connection Failed " . mysqli_error($connection));
			}


			while ($row = mysqli_fetch_assoc($select_comments)) {
				$comment_id = $row['comment_id'];
				$post_id = $row['post_id'];
				$user_id = $row['user_id'];
				$user_name = $row['user_name'];
				$comment_content = $row['comment_content'];




				echo "<tr>";
				echo "<th>$comment_id</th>";

				echo "<td>$post_id</td>";
				echo "<td>$user_id</td>";
				echo "<td>$user_name</td>";
				echo "<td>$comment_content</td>";


				// echo "<td><a role='button' class='btn btn-outline-primary' href='comments.php?source=edit_user&u_id={$comment_id}'>修正</a></td>";
				echo "<td><a role='button' class='btn btn-outline-danger' href='comments.php?source=delete_comment&c_id={$comment_id}'>削除</a></td>";

				echo "</tr>";
			}
			?>

		</tbody>
	</table>

</div>