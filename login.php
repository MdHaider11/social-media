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
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('inc/footer.php'); ?>