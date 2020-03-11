<?php

if (isset($_POST['create_user'])) {
    $user_name  = string_escape($_POST['user_name']);
    $last_name  = string_escape($_POST['last_name']);
    $first_name = string_escape($_POST['first_name']);
    $password   = string_escape($_POST['password']);
    $email      = string_escape($_POST['email']);
    $user_role      = string_escape($_POST['user_role']);



    $hashed_password = password_encrypt($password);

    if (empty($user_name) || empty($last_name) || empty($first_name) || empty($password) || empty($email)) {
        $message = "全て記入してください！";
        $status = "danger";
    } else {
        $query  = "INSERT INTO users (user_name, user_lastname, user_firstname, user_password, user_email, user_role, user_date) ";
        $query .= "VALUES ('$user_name', '$last_name', '$first_name', '$hashed_password', '$email', '$user_role', now())";

        $create_user = mysqli_query($connection, $query);

        if (!$create_user) {
            die("Registration Failed: " . mysqli_error($connection));
        }

        $message = "会員登録が完了しました。";
        $status = "success";
    }
}


?>

<div class="col-md-6 mx-auto post-form">

    <form action="" method="post" enctype="multipart/form-data">

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

        <h1 class="text-center mb-5">ユーザを登録</h3>
            <div class="form-group">
                <label for="user_name">
                    <h6>ユーザ名</h3>
                </label>
                <input name="user_name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name">
                    <h6>姓</h3>
                </label>
                <input name="last_name" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="first_name">
                    <h6>名</h3>
                </label>
                <input name="first_name" type="text" class="form-control">
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
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input name="password" type="password" class="form-control">
            </div>

            <button name="create_user" type="submit" class="btn btn-primary">会員登録</button>
    </form>

</div>