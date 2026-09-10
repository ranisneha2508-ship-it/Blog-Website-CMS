<?php

include("../connection.php");

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $upload_path = "../assets/uploads/" . $image_name;

    move_uploaded_file($image_tmp, $upload_path);

    $sql = "INSERT INTO blogs (title, image, category, author, description, content)
            VALUES
            ('$title', '$image_name', '$category', '$author', '$description', '$content')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
                alert('Blog Added Successfully!');
                window.location.href='index.php';
              </script>"
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog | Blog CMS</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <h1>Add New Blog</h1>
    <form method="POST"
          enctype="multipart/form-data">
        <label>Blog Title</label>
        <input type="text" name="title" required>

        <label>Blog Image</label>
        <input type="file"
               name="image"
               accept="image/*"
               required>

        <label>Category</label>
        <input type="text"
               name="category"
               required>

        <label>Author</label>
        <input type="text"
               name="author"
               required>


        <label>Description</label>
        <textarea name="description"
                  required></textarea>


        <label>Blog Content</label>
        <textarea name="content"
                  rows="10"
                  required></textarea>


        <button type="submit"
                name="submit">

            Publish Blog

        </button>

    </form>

</body>

</html>