<?php

include "../connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($conn, $sql);

$blog = mysqli_fetch_assoc($result);


if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $content = $_POST['content'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];


    if ($image != "") {

        $uploadPath = __DIR__ . "/uploads/" . $image;

        move_uploaded_file($temp, $uploadPath);

    } else {

        $image = $blog['image'];

    }


    $updateSql = "UPDATE blogs SET
                  title = '$title',
                  image = '$image',
                  category = '$category',
                  author = '$author',
                  description = '$description',
                  content = '$content'
                  WHERE id = $id";

    $updateResult = mysqli_query($conn, $updateSql);


if ($updateResult) {
    echo "<script>
        window.location.href = 'index.php?updated=1#allBlogsSection';
    </script>";
    exit;
}
 else {

        echo "Blog update failed";

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Blog | Blog CMS</title>

    <link rel="stylesheet" href="admin.css">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

</head>

<body>
<?php include "master/header.php"; ?>
            <section class="add-blog-section edit-blog-section"  id="editBlogSection">

                <div class="edit-blog-header">

                    <div class="edit-blog-heading">

                        <h1 class="edit-blog-title">
                            Edit Blog
                        </h1>
                  <a href="index.php" class="back-btn" > 
                     <i class="bi bi-arrow-left"></i> Back </a> 
                     
                    </div>
                </div>




                <form
                    method="POST"
                    enctype="multipart/form-data"
                    class="edit-blog-form"
                >

                    <div class="form-group">

                        <label class="form-label">
                            Blog Title
                        </label>

                        <input
                            class="form-control"
                            type="text"
                            name="title"
                            value="<?php echo htmlspecialchars($blog['title']); ?>"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Current Image
                        </label>


                        <div class="current-image">

                            <img
                                class="current-blog-image"
                                src="uploads/<?php echo htmlspecialchars($blog['image']); ?>"
                                alt="<?php echo htmlspecialchars($blog['title']); ?>"
                            >

                        </div>

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Change Image
                        </label>

                        <input
                            class="form-control"
                            type="file"
                            name="image"
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Category
                        </label>

                        <input
                            class="form-control"
                            type="text"
                            name="category"
                            value="<?php echo htmlspecialchars($blog['category']); ?>"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Author
                        </label>

                        <input
                            class="form-control"
                            type="text"
                            name="author"
                            value="<?php echo htmlspecialchars($blog['author']); ?>"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea
                            class="form-control"
                            name="description"
                            required
                        ><?php echo htmlspecialchars($blog['description']); ?></textarea>

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Blog Content
                        </label>

                        <textarea
                            class="form-control"
                            name="content"
                            rows="10"
                            required
                        ><?php echo htmlspecialchars($blog['content']); ?></textarea>

                    </div>


                    <button
                        class="update-blog-btn"
                        type="submit"
                        name="update"
                    >

                        <i class="bi bi-check-lg"></i>

                        Update Blog

                    </button>

                </form>

            </section>




    <script src="admin.js"></script>

</body>

</html>