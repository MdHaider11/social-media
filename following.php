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
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="friend-list">
                    <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bWFufGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                    <span class="ms-1">
                        <a href="#">Haider Hossain</a>
                    </span>
                </div>
                <a class="btn btn-primary">Follow</a>
            </li>
        </ul>
    </div>
    <div class="timeline-right">

    </div>
</div>

<?php include('inc/footer.php'); ?>