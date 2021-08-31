<?php include('inc/header.php');

$session->login_another($session->get('login')); ?>

<section class="">
    <div class="container">
        <?php
        if ($session->get('exist_email')) {
        ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?= $session->get('exist_email'); ?>
            </div>
        <?php
            $session->unseting('exist_email');
        }
        ?>
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-lg-6">
                <div class="form-left">
                    <h2>Welcome to photo contest, <br> Sign Up Please</h1>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, quas quibusdam deserunt accusantium
                            itaque eaque nostrum ipsa explicabo dicta consectetur porro atque pariatur! Praesentium itaque
                            minima amet dolorem minus earum!</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-box bg-light p-4 rounded">
                    <form action="inc/signup-inc.php" method="post">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="full_name">
                                <?php
                                if ($session->get('full_name_empty')) {
                                ?>
                                    <span style="color:red"><?= $session->get('full_name_empty'); ?></span>
                                <?php
                                    $session->unseting('full_name_empty');
                                }
                                ?>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="user_name">

                                <?php
                                if ($session->get('name_empty')) {
                                ?>
                                    <span style="color:red"><?= $session->get('name_empty'); ?></span>
                                <?php
                                    $session->unseting('name_empty');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="user_email" id="exampleInputEmail1" aria-describedby="emailHelp">

                            <?php
                            if ($session->get('email_empty')) {
                            ?>
                                <span style="color:red"><?= $session->get('email_empty'); ?></span>
                            <?php
                                $session->unseting('email_empty');
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_pass" id="exampleInputPassword1">
                            <?php
                            if ($session->get('pass_empty')) {
                            ?>
                                <span style="color:red"><?= $session->get('pass_empty'); ?></span>
                            <?php
                                $session->unseting('pass_empty');
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('inc/footer.php'); ?>