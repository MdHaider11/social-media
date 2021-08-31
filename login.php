<?php include('inc/header.php'); ?>

<section class="">
    <div class="container">
        <?php
        if ($session->get('signup_created')) {
        ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= $session->get('signup_created'); ?>
            </div>
        <?php
            $session->unseting('signup_created');
        }
        ?>
        <?php
        if ($session->get('pass_not_matching')) {
        ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?= $session->get('pass_not_matching'); ?>
            </div>
        <?php
            $session->unseting('pass_not_matching');
        }
        ?>
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-lg-6">
                <div class="form-left">
                    <h2>Welcome to photo contest, <br> Login Please</h1>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, quas quibusdam deserunt accusantium
                            itaque eaque nostrum ipsa explicabo dicta consectetur porro atque pariatur! Praesentium itaque
                            minima amet dolorem minus earum!</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-box bg-light p-4 rounded">
                    <form action="inc/login-inc.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="login_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <?php
                            if ($session->get('login_email_empty')) {
                            ?>
                                <span style="color:red"><?= $session->get('login_email_empty'); ?></span>
                            <?php
                                $session->unseting('login_email_empty');
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="login_password" id="exampleInputPassword1">
                            <?php
                            if ($session->get('login_pass_empty')) {
                            ?>
                                <span style="color:red"><?= $session->get('login_pass_empty'); ?></span>
                            <?php
                                $session->unseting('login_pass_empty');
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('inc/footer.php'); ?>