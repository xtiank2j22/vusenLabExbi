<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>form</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <?php include_once 'includes/links.php' ?>
</head>

<!-- Display Alert Message -->

<form action="#" method="post" data-aos="fade" data-aos-delay="100">
    <div class="row gy-4">
        <div class="col-6">
            <input type="text" name="title" class="form-control" placeholder="enter the title of the post" required>
        </div>
        <div class="mb-3 col-6">
            <label for="presntation" class="form-label">Upload your Blog images</label>
            <input type="file" name="blog_image" accept="image/*" class="form-control">
        </div>
        <div class="col-md-12">
            <textarea name="blog_message" class="form-control" rows="8" placeholder="enter the information message" required></textarea>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-dark btn-lg rounded-pill">Send Message</button>
        </div>
    </div>
</form>

<?php include_once 'includes/footer.php' ?>
</body>

</html>