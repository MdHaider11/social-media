<?php include('inc/header.php'); ?>
<?php
$session->login_index($session->get('login'));
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
            <div class="col-lg-12">
                <div class="all-posts mt-5">
                    <div class="card">
                        <div class="card-header d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1601572420755-16a9f0677102?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8ZG93bmxvYWR8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                            <div>
                                <h4>Posted by <b>Haider</b></h4>
                                <span>2 days ago</span>
                            </div>
                        </div>
                        <div class="card-body d-flex">
                            <p class="card-text w-50 align-self-start pe-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                                ratione reiciendis dolore maiores, aut fuga ipsam doloribus, labore illum nam deserunt
                                nobis sunt! Temporibus dolorem sit aspernatur similique voluptatum autem.</p>
                            <img class="rounded" src="https://images.unsplash.com/photo-1546109113-a07e6a96ef76?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZG93bmxvYWR8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
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
        </div>
    </div>
    <div class="timeline-right">

    </div>
</div>

<?php include('inc/footer.php'); ?>