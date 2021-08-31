<?php include('inc/header.php'); ?>
<?php include('inc/nav.php'); ?>

<div class="main-timeline d-flex">
    <div class="timeline-left">
        <?php include('inc/sidebar.php') ?>
    </div>
    <div class="timeline-middle w-100">
        <div class="photo-upload m-auto rounded d-flex bg-light">
            <div class="photo-upload-content w-50">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Your Photo</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Type Capton</label>
                    <textarea class="form-control" name="" id="" rows="4"></textarea>
                </div>
                <button class="btn btn-primary">Post Contest</button>
            </div>
            <div class="uploaded-photo w-50">
                <img class="rounded" src="https://images.unsplash.com/photo-1505866535066-ccebd6b2b98a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjF8fG1hbnxlbnwwfDJ8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
            </div>
        </div>
    </div>
    <div class="timeline-right">
        sdf
    </div>
</div>

<?php include('inc/footer.php'); ?>