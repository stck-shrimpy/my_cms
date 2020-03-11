<div class="col-md-10 mx-auto post-form">
	<h1 class="text-center mb-4">ユーザ一覧</h1>
	<hr class="solid mb-5">

	<table class="table user-list table-hover table-stripped rounded-lg">
		<thead class="thead table-borderless">
			<tr>
				<th scope="col">#</th>
				<th scope="col">ユーザ名</th>

				<th scope="col">姓</th>
				<th scope="col">名</th>

				<th scope="col">メールアドレス</th>
				<th scope="col">ユーザ権限</th>
				<th scope="col">加入日</th>
				<th scope="col">修正</th>
				<th scope="col">削除</th>


			</tr>
		</thead>
		<tbody>

			<!-- Select All Users FROM DB -->
			<?php

			$query = "SELECT * FROM users";
			$view_all_users = mysqli_query($connection, $query);
			if (!$view_all_users) {
				die("Connection Failed " . mysqli_error($connection));
			}


			while ($row = mysqli_fetch_assoc($view_all_users)) {
				$user_id = $row['user_id'];
				$user_name = $row['user_name'];
				$user_lastname = $row['user_lastname'];
				$user_firstname = $row['user_firstname'];
				$user_email = $row['user_email'];
				$user_role = $row['user_role'];
				$user_date = $row['user_date'];



				echo "<tr>";
				echo "<th>$user_id</th>";

				echo "<td>$user_name</td>";
				echo "<td>$user_lastname</td>";
				echo "<td>$user_firstname</td>";
				echo "<td>$user_email</td>";
				echo "<td>$user_role</td>";
				echo "<td>$user_date</td>";

				echo "<td><a role='button' class='btn btn-outline-primary' href='users.php?source=edit_user&u_id={$user_id}'>修正</a></td>";
				echo "<td><a role='button' class='btn btn-outline-danger' href='users.php?source=delete_user&u_id={$user_id}'>削除</a></td>";

				echo "</tr>";
			}
			?>

		</tbody>
	</table>

</div>