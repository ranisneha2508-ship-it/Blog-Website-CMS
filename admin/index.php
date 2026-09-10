<?php

include "../connection.php";


$totalQuery = "SELECT COUNT(*) AS total FROM blogs";
$totalResult = mysqli_query($conn, $totalQuery);
$totalData = mysqli_fetch_assoc($totalResult);

$totalBlogs = $totalData['total'];




$successMessage = "";

if (isset($_GET['success'])) {
    $successMessage = "Blog published successfully";
}

if (isset($_GET['updated'])) {
    $successMessage = "Blog updated successfully";
}
if (isset($_GET['deleted'])) {
    $successMessage = "Blog deleted successfully";
}
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    $uploadPath = __DIR__ . "/uploads/" . $image;

    if (move_uploaded_file($temp, $uploadPath)) {

        $sql = "INSERT INTO blogs
                (title, image, category, author, description, content)
                VALUES
                ('$title', '$image', '$category', '$author', '$description', '$content')";

        $insertResult = mysqli_query($conn, $sql);

        if ($insertResult) {
            echo "<script>
                window.location.href = 'index.php?success=1#allBlogsSection';
            </script>";
            exit;
        } else {
            echo "Blog publish failed";
        }
    } else {
        echo "Image upload failed";
    }
}

$recentQuery = "SELECT * FROM blogs ORDER BY id DESC LIMIT 4";
$recentResult = mysqli_query($conn, $recentQuery);

$allBlogsQuery = "SELECT * FROM blogs ORDER BY id DESC";
$allBlogsResult = mysqli_query($conn, $allBlogsQuery);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Blog CMS</title>

    <link rel="stylesheet" href="admin.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<?php include "master/header.php"; ?>
        <section class="dashboard " id="dashboardSection">
            <div class="page-header">
                <div>
                    <p class="breadcrumb">
                        Admin / Dashboard
                    </p>
                    <h1>Dashboard</h1>
                    <p class="welcome-text">
                        Welcome back, Admin. Here's what's happening with your blog.
                    </p>
                </div>

                <a href="#" class="add-blog-btn open-add-blog">
                    <i class="bi bi-plus-lg"></i>
                    Add New Blog
                </a>
            </div>

            <div class="stats-grid">

                <div class="stat-card">

                    <div class="stat-content">
                        <span>Total Blogs</span>
                        <h2><?php echo $totalBlogs; ?></h2>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>

                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <span>Published</span>
                        <h2><?php echo $totalBlogs; ?></h2>
                    </div>
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <span>Drafts</span>
                        <h2>0</h2>
                    </div>
                    <div class="stat-icon">
                        <i class="bi bi-file-earmark"></i>
                    </div>

                </div>


            </div>
<div class="dashboard-grid">

    <div class="panel recent-blogs">

        <div class="panel-header">

            <div class="panel-heading">
                <h3 class="panel-title">Recent Blogs</h3>
                <p class="panel-subtitle">Latest posts from your website</p>
            </div>

            <a href="#" class="view-all" id="viewAllBlogs">
                View All
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

        <div class="table-wrapper">

    <table class="blogs-table">

        <thead class="blogs-table-head">

            <tr class="blogs-table-row">
                <th class="blogs-table-heading">Blog</th>
                <th class="blogs-table-heading">Blog Title</th>
                <th class="blogs-table-heading">Category</th>
                <th class="blogs-table-heading">Status</th>
                <th class="blogs-table-heading">Action</th>
            </tr>

        </thead>

        <tbody class="blogs-table-body">

            <?php while ($blog = mysqli_fetch_assoc($recentResult)) { ?>

                <tr class="blogs-table-row">

                    <td class="blogs-table-data">

                        <div class="blog-cell">

                            <div class="blog-image">

                                <img
                                    class="blog-thumbnail"
                                    src="uploads/<?php echo htmlspecialchars($blog['image']); ?>"
                                    alt="<?php echo htmlspecialchars($blog['title']); ?>"
                                >

                            </div>

                        </div>

                    </td>

                    <td class="blogs-table-data">

                        <div class="blog-details">

                            <strong class="blog-title">
                                <?php echo htmlspecialchars($blog['title']); ?>
                            </strong>

                            <small class="blog-author">
                                By <?php echo htmlspecialchars($blog['author']); ?>
                            </small>

                        </div>

                    </td>

                    <td class="blogs-table-data">

                        <span class="category">
                            <?php echo htmlspecialchars($blog['category']); ?>
                        </span>

                    </td>

                    <td class="blogs-table-data">

                        <span class="status published">
                            Published
                        </span>

                    </td>

                    <td class="blogs-table-data">

                        <button class="more-btn" type="button">
                            <i class="bi bi-three-dots"></i>
                        </button>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

    </div>


    <div class="panel quick-panel">

        <div class="panel-header">

            <div class="panel-heading">
                <h3 class="panel-title">Quick Actions</h3>
                <p class="panel-subtitle">Manage your content</p>
            </div>

        </div>

        <div class="quick-actions">

            <a href="#" class="quick-action quick-add-blog open-add-blog" id="quickAddBlog">

                <div class="quick-icon">
                    <i class="bi bi-plus-lg"></i>
                </div>

                <div class="quick-content">

                    <strong class="quick-title">
                        Add New Blog
                    </strong>

                    <small class="quick-subtitle">
                        Create a new blog post
                    </small>

                </div>

                <i class="bi bi-chevron-right quick-arrow"></i>

            </a>


            <a href="#" class="quick-action quick-add-category" id="quickAddCategory">

                <div class="quick-icon">
                    <i class="bi bi-folder-plus"></i>
                </div>

                <div class="quick-content">

                    <strong class="quick-title">
                        Add Category
                    </strong>

                    <small class="quick-subtitle">
                        Create a blog category
                    </small>

                </div>

                <i class="bi bi-chevron-right quick-arrow"></i>

            </a>


            <a href="#" class="quick-action quick-manage-tags" id="quickManageTags">

                <div class="quick-icon">
                    <i class="bi bi-tags"></i>
                </div>

                <div class="quick-content">

                    <strong class="quick-title">
                        Manage Tags
                    </strong>

                    <small class="quick-subtitle">
                        Organize your blog tags
                    </small>

                </div>

                <i class="bi bi-chevron-right quick-arrow"></i>

            </a>

        </div>

    </div>

</div>

</section>
<!-- ADD BLOG SECTION -->

<section class="add-blog-section" id="addBlogSection">

    <h1>Add New Blog</h1>

   <form method="POST" enctype="multipart/form-data">

    <label>Blog Title</label>
    <input type="text" name="title" required>

    <label>Blog Image</label>
    <input type="file" name="image" required>

    <label>Category</label>
    <input type="text" name="category" required>

    <label>Author</label>
    <input type="text" name="author" required>

    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Blog Content</label>
    <textarea name="content" rows="10" required></textarea>

    <button type="submit" name="submit">
        Publish Blog
    </button>

</form>

</section>


<section id="allBlogsSection">

    <div class="panel recent-blogs">

        <div class="panel-header">

            <div class="panel-heading">
                <h3 class="panel-title">All Blogs</h3>
                <p class="panel-subtitle">Manage all posts from your website</p>
            </div>

            <a href="#" class="view-all add-blog-btn open-add-blog">
                Add New Blog
                <i class="bi bi-plus-lg"></i>
            </a>

        </div>


        <div class="table-wrapper">

            <table class="blogs-table">

                <thead class="blogs-table-head">
<tr class="blogs-table-row">
                        <th class="blogs-table-heading">Blog</th>
                        <th class="blogs-table-heading">Blog Title</th>
                        <th class="blogs-table-heading">Category</th>
                        <th class="blogs-table-heading">Status</th>
                        <th class="blogs-table-heading">Actions</th>
                    </tr>

                </thead>


                <tbody class="blogs-table-body">

                    <?php while ($blog = mysqli_fetch_assoc($allBlogsResult)) { ?>

                        <tr class="blogs-table-row all-blog-row">

                            <td class="blogs-table-data">

                                <div class="blog-cell">

                                    <div class="blog-image">

                                        <img
                                            class="blog-thumbnail"
                                            src="uploads/<?php echo htmlspecialchars($blog['image']); ?>"
                                            alt="<?php echo htmlspecialchars($blog['title']); ?>"
                                        >

                                    </div>

                                </div>

                            </td>


                            <td class="blogs-table-data">

                                <div class="blog-details">

                                    <strong class="blog-title">
                                        <?php echo htmlspecialchars($blog['title']); ?>
                                    </strong>

                                    <small class="blog-author">
                                        By <?php echo htmlspecialchars($blog['author']); ?>
                                    </small>

                                </div>

                            </td>


                            <td class="blogs-table-data">

                                <span class="category">
                                    <?php echo htmlspecialchars($blog['category']); ?>
                                </span>

                            </td>


                            <td class="blogs-table-data">

                                <span class="status published">
                                    Published
                                </span>

                            </td>


                            <td class="blogs-table-data">

                                <div class="blog-actions">
                    <a href="edit-blog.php?id=<?php echo $blog['id']; ?>"
                        class="action-btn edit-btn">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </a>

            <a href="delete-blog.php?id=<?php echo $blog['id']; ?>"
             class="action-btn delete-btn deleteBlogBtn">
                <i class="bi bi-trash3"></i>
                Delete
            </a>

                                </div>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</section>


    </main>

</div>


<?php if (!empty($successMessage)) { ?>

    <div class="success-modal" id="successModal">

        <div class="success-modal-box">

            <div class="success-modal-icon">
                <i class="bi bi-check-lg"></i>
            </div>
<h2 class="success-modal-title">
    <?php
    if (isset($_GET['updated'])) {
        echo "Blog Updated";
    } elseif (isset($_GET['deleted'])) {
        echo "Blog Deleted";
    } else {
        echo "Blog Published";
    }
    ?>
</h2>
            <p class="success-modal-text">
                <?php echo $successMessage; ?>
            </p>

            <button class="success-modal-btn" id="successModalBtn" type="button">
                Done
            </button>

        </div>

    </div>

<?php } ?>
<div class="delete-modal" id="deleteModal">

    <div class="delete-modal-box">

        <div class="delete-modal-icon">
            <i class="bi bi-trash3"></i>
        </div>

        <h2>Delete Blog?</h2>

        <p>
            Are you sure you want to delete this blog?
            This action cannot be undone.
        </p>

        <div class="delete-modal-actions">

            <button type="button" class="cancel-delete-btn" id="cancelDeleteBtn">
                Cancel
            </button>

            <button type="button" class="confirm-delete-btn" id="confirmDeleteBtn">
                <i class="bi bi-trash3"></i>
                Delete
            </button>

        </div>

    </div>

</div>

<script src="admin.js"></script>
</body>
</html>
