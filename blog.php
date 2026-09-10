<?php

include "connection.php";

$sql = "SELECT * FROM blogs ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

<?php include 'masters/links.php'; ?>

</head>
<body>
    
<?php include 'masters/header.php'; ?>

<section class="blog-banner">
    <div class="blog-banner-slider">

        <div class="slide">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6">
                        <div class="blog-banner-content">
                            <p class="blog-tag">Featured Post</p>
                            <h1>Step-by-step guide to choosing great font pairs</h1>
                            <p class="blog-meta">
                                By <span>John Doe</span> | May 23, 2022
                            </p>
                            <p class="blog-desc">
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                            <a href="#" class="btn-primary">Read More ></a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="blog-banner-image">
                            <img src="assets/images/blog-banner.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="blog-banner-content">
                            <p class="blog-tag">Technology</p>
                            <h1>How to build rapport with your web design clients</h1>
                            <p class="blog-meta">
                                By <span>Sarah Lee</span> | July 10, 2022
                            </p>
                            <p class="blog-desc">
                                Learn how AI is transforming frontend and backend development across industries.
                            </p>
                            <a href="#" class="btn-primary">Read More ></a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="blog-banner-image">
                            <img src="assets/images/blog-banner2.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>

 <div class="slide">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="blog-banner-content">
                            <p class="blog-tag">Technology</p>
                            <h1>The future of AI in modern web development</h1>
                            <p class="blog-meta">
                                By <span>Sarah Lee</span> | July 10, 2022
                            </p>
                            <p class="blog-desc">
                                Learn how AI is transforming frontend and backend development across industries.
                            </p>
                            <a href="#" class="btn-primary">Read More ></a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="blog-banner-image">
                            <img src="assets/images/blog-banner3.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>
<section class="all-posts-section">
    <div class="container">

        <div class="section-title">
            <h2>All Posts</h2>
        </div>

   <?php while ($blog = mysqli_fetch_assoc($result)) { ?>

<div class="blog-card">

    <div class="blog-image">

       <img src="admin/uploads/<?php echo $blog['image']; ?>" alt="">

    </div>

    <div class="blog-content">

        <span class="category">
            <?php echo $blog['category']; ?>
        </span>

        <h3>
            <?php echo $blog['title']; ?>
        </h3>

        <p>
            <?php echo $blog['description']; ?>
        </p>

     <a href="blog-details.php?id=<?php echo $blog['id']; ?>">
    Read More
</a>

    </div>

</div>

<?php } ?>


    </div>
</section>



<section class="category">
    <div class="container">
        <div class="section-title text-center">
            <h2>Choose A Category</h2>
        </div>
        <div class="row g-4">

            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="icon">
                        <img src="assets/images/business.png" alt="">
                    </div>

                    <h3>Business</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="icon">
                        <img src="assets/images/startup.png" alt="">
                    </div>

                    <h3>Startup</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="icon">
                        <img src="assets/images/economy.png" alt="">
                    </div>

                    <h3>Economy</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="category-card">
                    <div class="icon">
                        <img src="assets/images/technology.png" alt="">
                    </div>

                    <h3>Technology</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

        </div>

    </div>
</section>


<section class="join">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5 text-center">

                <h2>Join our team to be a part of our story</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                </p>

                <a href="#" class="btn-primary">Join Now</a>

            </div>

        </div>

    </div>
</section>

<?php include 'masters/footer.php'; ?>

</body>
</html>