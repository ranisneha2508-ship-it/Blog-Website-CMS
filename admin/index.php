<?php

include "../connection.php";

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

        mysqli_query($conn, $sql);

        echo "Blog published successfully";

    } else {

        echo "Image upload failed";

    }
}

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

<div class="admin-layout">

    <div class="sidebar">

        <div class="logo">
            <div>
                <h2>Blog<span>CMS</span></h2>
                <small>Admin Panel</small>
            </div>
        </div>

        <nav class="sidebar-nav">


         <a href="#" class="nav-link active" id="dashboardBtn">
    <i class="bi bi-grid-1x2-fill"></i>
    <span>Dashboard</span>
</a>

           <button class="nav-link dropdown-toggle" type="button">
    <i class="bi bi-file-earmark-text"></i>
    <span>Blogs</span>
    <i class="bi bi-chevron-down arrow"></i>
</button>

            <div class="submenu">
                <a href="#">
                    All Blogs
                </a>

               <a href="#" id="addBlogBtn">Add Blog</a>

                <a href="#">
                    Drafts
                </a>
            </div>

            <a href="#" class="nav-link">
                <i class="bi bi-folder"></i>
                <span>Categories</span>
            </a>

            <a href="#" class="nav-link">
                <i class="bi bi-tags"></i>
                <span>Tags</span>
            </a>

            <p class="nav-title settings-title">SYSTEM</p>

            <a href="#" class="nav-link">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>

            <a href="#" class="nav-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <div class="admin-mini">
                <div class="avatar">SR</div>

                <div>
                    <strong>Admin</strong>
                    <small>Administrator</small>
                </div>

                <i class="bi bi-three-dots"></i>
            </div>

        </div>

    </div>

    <main class="main-content">
        <header class="topbar">

            <div class="mobile-logo">
                <strong>Blog<span>CMS</span></strong>
            </div>

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search blogs...">
            </div>

            <div class="topbar-right">

                <button class="icon-btn">
                    <i class="bi bi-bell"></i>
                    <span class="notification"></span>
                </button>

               <div class="admin-profile">

    <button class="top-admin" id="profileToggle">

        <div class="avatar">SR</div>

        <div class="admin-info">
            <strong>Admin</strong>
            <small>Administrator</small>
        </div>

        <i class="bi bi-chevron-down profile-arrow"></i>

    </button>


    <div class="profile-dropdown" id="profileDropdown">

        <div class="profile-dropdown-header">
            <div class="avatar">SR</div>

            <div>
                <strong>Admin</strong>
                <small>Administrator</small>
            </div>
        </div>

        <div class="profile-divider"></div>

        <a href="#">
            <i class="bi bi-person"></i>
            My Profile
        </a>

        <a href="#">
            <i class="bi bi-gear"></i>
            Settings
        </a>

        <div class="profile-divider"></div>

        <a href="#" class="logout-link">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </a>

    </div>

</div>

            </div>

        </header>


        <!-- CONTENT -->

        <section class="dashboard " id="dashboardSection">

            <!-- PAGE HEADER -->

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

                <a href="#" class="add-blog-btn">
                    <i class="bi bi-plus-lg"></i>
                    Add New Blog
                </a>

            </div>


            <!-- STAT CARDS -->

            <div class="stats-grid">

                <div class="stat-card">

                    <div class="stat-content">
                        <span>Total Blogs</span>
                        <h2>24</h2>

                        <p class="growth positive">
                            <i class="bi bi-arrow-up"></i>
                            12% <span>from last month</span>
                        </p>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-content">
                        <span>Published</span>
                        <h2>19</h2>

                        <p class="growth positive">
                            <i class="bi bi-arrow-up"></i>
                            8% <span>from last month</span>
                        </p>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-content">
                        <span>Drafts</span>
                        <h2>05</h2>

                        <p class="growth neutral">
                            <i class="bi bi-dash"></i>
                            2% <span>from last month</span>
                        </p>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-file-earmark"></i>
                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-content">
                        <span>Total Views</span>
                        <h2>12.5K</h2>

                        <p class="growth positive">
                            <i class="bi bi-arrow-up"></i>
                            18% <span>from last month</span>
                        </p>
                    </div>

                    <div class="stat-icon">
                        <i class="bi bi-bar-chart"></i>
                    </div>

                </div>

            </div>


            <!-- LOWER GRID -->

            <div class="dashboard-grid">


                <!-- RECENT BLOGS -->

                <div class="panel recent-blogs">

                    <div class="panel-header">

                        <div>
                            <h3>Recent Blogs</h3>
                            <p>Latest posts from your website</p>
                        </div>

                        <a href="#" class="view-all">
                            View All
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>


                    <div class="table-wrapper">

                        <table>

                            <thead>
                                <tr>
                                    <th>Blog</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>

                                    <td>
                                        <div class="blog-cell">

                                            <div class="blog-image image-one">
                                                <i class="bi bi-image"></i>
                                            </div>

                                            <div>
                                                <strong>
                                                    The Future of Web Design
                                                </strong>

                                                <small>
                                                    By Sneha Rani
                                                </small>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        <span class="category">
                                            Design
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status published">
                                            Published
                                        </span>
                                    </td>

                                    <td>Aug 08, 2026</td>

                                    <td>
                                        <button class="more-btn">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        <div class="blog-cell">

                                            <div class="blog-image image-two">
                                                <i class="bi bi-image"></i>
                                            </div>

                                            <div>
                                                <strong>
                                                    Getting Started With PHP
                                                </strong>

                                                <small>
                                                    By Sneha Rani
                                                </small>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        <span class="category">
                                            Development
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status published">
                                            Published
                                        </span>
                                    </td>

                                    <td>Aug 06, 2026</td>

                                    <td>
                                        <button class="more-btn">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        <div class="blog-cell">

                                            <div class="blog-image image-three">
                                                <i class="bi bi-image"></i>
                                            </div>

                                            <div>
                                                <strong>
                                                    UI/UX Trends 2026
                                                </strong>

                                                <small>
                                                    By Sneha Rani
                                                </small>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        <span class="category">
                                            UI/UX
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status draft">
                                            Draft
                                        </span>
                                    </td>

                                    <td>Aug 04, 2026</td>

                                    <td>
                                        <button class="more-btn">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                    </td>

                                </tr>


                                <tr>

                                    <td>
                                        <div class="blog-cell">

                                            <div class="blog-image image-four">
                                                <i class="bi bi-image"></i>
                                            </div>

                                            <div>
                                                <strong>
                                                    Why JavaScript Matters
                                                </strong>

                                                <small>
                                                    By Sneha Rani
                                                </small>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        <span class="category">
                                            JavaScript
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status published">
                                            Published
                                        </span>
                                    </td>

                                    <td>Aug 02, 2026</td>

                                    <td>
                                        <button class="more-btn">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- QUICK ACTIONS -->

                <div class="panel quick-panel">

                    <div class="panel-header">

                        <div>
                            <h3>Quick Actions</h3>
                            <p>Manage your content</p>
                        </div>

                    </div>


                    <div class="quick-actions">

                        <a href="#" class="quick-action">

                            <div class="quick-icon">
                                <i class="bi bi-plus-lg"></i>
                            </div>

                            <div>
                                <strong>Add New Blog</strong>
                                <small>Create a new blog post</small>
                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>


                        <a href="#" class="quick-action">

                            <div class="quick-icon">
                                <i class="bi bi-folder-plus"></i>
                            </div>

                            <div>
                                <strong>Add Category</strong>
                                <small>Create a blog category</small>
                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>


                        <a href="#" class="quick-action">

                            <div class="quick-icon">
                                <i class="bi bi-tags"></i>
                            </div>

                            <div>
                                <strong>Manage Tags</strong>
                                <small>Organize your blog tags</small>
                            </div>

                            <i class="bi bi-chevron-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </section>

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






<section class="all-blogs-section" id="allBlogsSection">

    <div class="all-blogs-header">
        <div>
            <h2>All Blogs</h2>
            <p>Manage all your published blog posts</p>
        </div>

        <button class="add-blog-btn" id="addBlogFromAllBlogs">
            + Add New Blog
        </button>
    </div>

    <div class="blogs-table-wrapper">

        <table class="blogs-table">

            <thead>
                <tr>
                    <th>Blog</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>
                        <div class="blog-info">
                            <img src="assets/images/blog1.jpg" alt="">
                            <div>
                                <h4>The Future of Web Design</h4>
                                <p>Latest trends in modern web design</p>
                            </div>
                        </div>
                    </td>

                    <td>Design</td>

                    <td>Sneha Rani</td>

                    <td>
                        <span class="status published">
                            Published
                        </span>
                    </td>

                    <td>Aug 08, 2026</td>

                    <td>
                        <div class="blog-actions">
                            <button class="edit-btn">
                                Edit
                            </button>

                            <button class="delete-btn">
                                Delete
                            </button>
                        </div>
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</section>
    </main>

</div>
<script src="admin.js"></script>
</body>
</html>