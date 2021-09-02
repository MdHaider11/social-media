<?php include('inc/header.php'); ?>
<?php
$session->login_index($session->get('login'));
$user_id = $session->get('user_id');
?>
<?php include('inc/nav.php'); ?>

<div class="main-timeline d-flex">
    <div class="timeline-left">
        <?php include('inc/sidebar.php') ?>
    </div>
    <div class="timeline-middle w-100">
        <?php
        if ($session->get('post_upload')) {
        ?>
            <div class="alert alert-success" role="alert">
                <?= $session->get('post_upload') ?>
            </div>
        <?php
            $session->unseting('post_upload');
        }
        ?>
        <?php
        if ($session->get('upload_empty')) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $session->get('upload_empty') ?>
            </div>
        <?php
            $session->unseting('upload_empty');
        }
        ?>
        <?php
        if ($session->get('img_big')) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $session->get('img_big') ?>
            </div>
        <?php
            $session->unseting('img_big');
        }
        ?>
        <div class="photo-upload m-auto rounded d-flex bg-light">

            <div class="photo-upload-content w-50">
                <form action="inc/post-inc.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Your Photo</label>
                        <input class="form-control" onchange="photoPreview()" id="photoPre" name="photo_img" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Type Capton</label>
                        <textarea class="form-control" name="caption" name="" id="" rows="4"></textarea>
                    </div>
                    <input type="hidden" name="user_uniqe_id" value="<?= $session->get('user_id'); ?>">
                    <button class="btn btn-primary" name="post_contest">Post Contest</button>
                </form>
            </div>
            <div class="uploaded-photo w-50">
                <img id="preImg" class="rounded border" src="">
            </div>
        </div>

        <div class="row">
            <?php
            $me_and_friend = "SELECT users.name, posts.user_img, posts.body, posts.created_at FROM posts, users WHERE (posts.user_id IN (SELECT friends.following_id FROM friends WHERE friends.follower_id = '$user_id') OR posts.user_id = '$user_id') AND posts.user_id = users.id";
            $query = $db->conn->query($me_and_friend);
            if (0 < $query->num_rows) {
                while ($row = $query->fetch_assoc()) {
            ?>
                    <div class="col-lg-12 mb-3">
                        <div class="all-posts mt-5 w-50">
                            <div class="card">
                                <div class="card-header d-flex align-items-center gap-3">
                                    <img src="https://images.unsplash.com/photo-1601572420755-16a9f0677102?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8ZG93bmxvYWR8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                                    <div>
                                        <h4>Posted by <?= $row['name'] ?><b></b></h4>
                                        <span><?= $row['created_at'] ?></span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text w-50 mb-3"><?= $row['body'] ?></p>
                                    <img class="rounded" src="media/<?= $row['user_img'] ?>" alt="">
                                </div>
                                <div class="card-footer text-muted">
                                    <ul class="d-flex align-items-center gap-3">
                                        <li><a href="javascript:void(0)">Like (0)</a></li>
                                        <li><a href="javascript:void(0)">Dislike (0)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php

                }
            }
            ?>
        </div>
    </div>
    <div class="timeline-right">

    </div>
</div>

<?php include('inc/footer.php'); ?>