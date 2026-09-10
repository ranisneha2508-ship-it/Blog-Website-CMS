<?php

include "connection.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM blogs WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

$blog = mysqli_fetch_assoc($result);

if (!$blog) {
    die("Blog not found");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $blog['title']; ?>
    </title>

    <?php include 'masters/links.php'; ?>

</head>

<body>

<?php include 'masters/header.php'; ?>

<<<<<<< HEAD

<!-- BLOG DETAILS -->

<section class="single-blog-banner">

    <div class="container">

        <h1>
            <?php echo $blog['title']; ?>
        </h1>

        <p>
            By <?php echo $blog['author']; ?>
        </p>

        <span>
            <?php echo $blog['category']; ?>
        </span>

        <div class="single-blog-image">

           <img src="admin/uploads/<?php echo $blog['image']; ?>" alt="">   

        </div>

        <div class="blog-description">

            <p>
                <?php echo $blog['description']; ?>
            </p>

        </div>

        <div class="blog-full-content">

            <?php echo nl2br($blog['content']); ?>

        </div>

    </div>

</section>
=======
<section class="single-blog-banner">
    <div class = "container">

        <div class="single-blog-container">

        <div class="single-blog-image">
                <img src="admin/uploads/<?php echo $blog['image']; ?>" alt="">   
                <h1>
                    <?php echo $blog['title']; ?>
                </h1>
                <p>
                    By <?php echo $blog['author']; ?>
                </p>
        </div>
        <div class="single-blog-content">
                
                <h1>
                    <?php echo $blog['category']; ?>
                </h1>
                <div class="blog-description">
                    <p>
                        <?php echo $blog['description']; ?>
                    </p>
                </div>
                <div class="blog-full-content">
                    <?php echo nl2br($blog['content']); ?>
                </div>
        </div>
        </div>
        </div>
        </section>
>>>>>>> 372b0a4 (Update Blog CMS admin dashboard and blog management features)


<!-- JOIN SECTION -->

<section class="join">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5 text-center">

                <h2>
                    Join our team to be a part of our story
                </h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt.
                </p>

                <a href="#" class="btn-primary">
                    Join Now
                </a>

            </div>

        </div>

    </div>

</section>


<?php include 'masters/footer.php'; ?>

</body>

</html>