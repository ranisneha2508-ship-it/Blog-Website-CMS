<?php

include "../connection.php";

$id = $_GET['id'];

$sql = "DELETE FROM blogs WHERE id = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>
        window.location.href = 'index.php?deleted=1#allBlogsSection';
    </script>";
    exit;
} else {
    echo "Blog delete failed";
}

?>