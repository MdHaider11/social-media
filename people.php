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
        <div>
            <form action="">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <input type="text" class="form-control" name="" placeholder="Search Your Friends" id="">
                    <button class="btn btn-info">Search</button>
                </div>
            </form>
        </div>
        <ul class="list-group">
            <?php
            $sql = "SELECT * FROM users WHERE status=1 and id <> '$user_id'";
            $query = $db->conn->query($sql);
            if (0 <  $query->num_rows) {
                while ($row = $query->fetch_assoc()) {
            ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="friend-list">
                            <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bWFufGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                            <span class="ms-1">
                                <a href="#"><?= $row['name']  ?></a>
                            </span>
                        </div>
                        <?php
                        $checking = "SELECT `id`, `follower_id`, `following_id`, `created_at` FROM `friends` WHERE follower_id='$user_id' AND following_id='{$row['id']}'";
                        $run = $db->conn->query($checking);
                        if (0 == $run->num_rows) {
                        ?>
                            <a href="inc/follow-inc.php?follower_id=<?= $user_id ?>&following_id=<?= $row['id'] ?>" class="btn btn-primary">Follow</a>
                        <?php

                        } else {
                        ?>
                            <a href="inc/unfollow-inc.php?follower_id=<?= $user_id ?>&following_id=<?= $row['id'] ?>" class="btn btn-danger">Unfollow</a>
                        <?php
                        }
                        ?>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
    <div class="timeline-right">

    </div>
</div>

<?php include('inc/footer.php'); ?>