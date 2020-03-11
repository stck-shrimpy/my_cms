<?php

// Select Post By Post ID
$query = "SELECT * FROM users WHERE user_id = {$user_id}";
$seletected_user = mysqli_query($connection, $query);
if (!$seletected_user) {
    die("Connection Failed " . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($seletected_user)) {
    $db_user_id = $row['user_id'];
    $db_user_name = $row['user_name'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_email = $row['user_email'];
    $db_user_password = $row['user_password'];

    $db_user_role = $row['user_role'];
    $db_user_date = $row['user_date'];
}

if (isset($_POST['edit_user'])) {
    $user_name  = string_escape($_POST['user_name']);
    $last_name  = string_escape($_POST['last_name']);
    $first_name = string_escape($_POST['first_name']);
    $password   = string_escape($_POST['password']);
    $email      = string_escape($_POST['email']);
    $user_role  = string_escape($_POST['user_role']);



    $hashed_password = password_encrypt($password);


    if (empty($user_name) || empty($last_name) || empty($first_name) || empty($password) || empty($email)) {
        $message = "全て記入してください！";
        $status = "danger";
    } else {
        $query  = "UPDATE users SET user_name = '{$user_name}', user_lastname = '{$last_name}', user_firstname = '{$first_name}', user_password = '{$hashed_password}', ";
        $query .= "user_email = '{$email}', user_role = '{$user_role}', user_date = '{$db_user_date}' WHERE user_id = $user_id";
        $create_user = mysqli_query($connection, $query);

        if (!$create_user) {
            die("Registration Failed: " . mysqli_error($connection));
        }

        $message = "編集が完了しました。";
        $status = "success";
    }
}


?>


<div class="col-md-6 mx-auto post-form">

    <form action="" method="post" enctype="multipart/form-data">

        <!-- Warning & Success Message -->
        <?php if (!empty($message)) { ?>
            <div class="alert alert-<?php echo "$status" ?> alert-dismissible fade show" role="alert">
                <strong><?php echo $message ?><a href="users.php?source=view_all_users">一覧に戻る</a></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php } ?>
        <!-- END -->

        <h1 class="text-center mb-5">ユーザを編集</h3>
            <div class="form-group">
                <label for="user_name">
                    <h6>ユーザ名</h3>
                </label>
                <input name="user_name" type="text" class="form-control" value="<?php echo $db_user_name ?>">
            </div>
            <div class="form-group">
                <label for="last_name">
                    <h6>姓</h3>
                </label>
                <input name="last_name" type="text" class="form-control" value="<?php echo $db_user_lastname ?>">
            </div>

            <div class="form-group">
                <label for="first_name">
                    <h6>名</h3>
                </label>
                <input name="first_name" type="text" class="form-control" value="<?php echo $db_user_firstname ?>">
            </div>


            <div class="form-group">
                <label for="user_role">ユーザ権限</label>
                <select name="user_role" class="form-control" id="exampleFormControlSelect1">
                    <option value="管理者">管理者</option>
                    <option value="一般会員">一般会員</option>

                </select>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input name="email" type="email" class="form-control" value="<?php echo $db_user_email ?>">
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input name="password" type="password" class="form-control">
            </div>

            <button name="edit_user" type="submit" class="btn btn-primary">会員登録</button>
    </form>

</div>