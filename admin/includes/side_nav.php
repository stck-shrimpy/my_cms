<nav class="col-md-2  d-none d-md-block d-lg-block d-xl-block sidebar" id="sidebar">
    <div class="sidebar-sticky">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav flex-column">
            <li class="nav-item side">
                <a class="nav-link text-white" href="index.php">
                    <i class="fas fa-clipboard"></i>
                    &nbsp;&nbsp;ダッシュボード
                </a>
            </li>
            <li class="nav-item side dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-book"></i>
                    &nbsp;&nbsp;投稿
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="posts.php?source=add_post">作成</a>
                    <a class="dropdown-item" href="posts.php?source=view_all_posts">投稿一覧</a>
                </div>
            </li>
            <li class="nav-item side dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-book"></i>
                    &nbsp;&nbsp;ユーザ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="users.php?source=add_user">ユーザ登録</a>
                    <a class="dropdown-item" href="users.php?source=view_all_users">ユーザ一覧</a>
                </div>
            </li>

            <li class="nav-item side">
                <a class="nav-link text-white" href="comments.php?source=view_all_comments">
                    <i class="far fa-comment-dots"></i>
                    &nbsp;&nbsp;コメント一覧
                </a>
            </li>



    </div>
</nav>