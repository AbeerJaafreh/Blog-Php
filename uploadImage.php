<?php
session_start();
include 'database.php';

$errors = [];
$fileExtensions = ['jpeg', 'jpg', 'png'];


if (isset($_POST['publish'])) {
    if (isset($_POST['Tag'])) {
        $tag = $_POST['Tag'];
    }
    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = rand() . '.' . $ext;

    $userID = $_SESSION["user_id"];

    try {
        move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $rename);

        $query = "INSERT INTO articles(title,description,image,tags_id,user_id)VALUES(:title,:description,:image,:Tag,:user_id)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $rename);
        $stmt->bindParam(':Tag', $tag);
        $stmt->bindParam(':user_id', $userID);


        if ($title == "") {
            echo "<script>
            alert('Insert Title  ')
            window.location.href='addPost.php'</script>";
        } elseif (strlen($title) > 255) {
            echo "<script>
            alert('Length Should be less than 255')
            window.location.href='addPost.php'</script>";
        } else {
            $stmt->execute();
            echo "<script>
            alert('Successfully Added post ')
            window.location.href='main.php'</script>";
        }
    } catch (PDOException $e) {
        $e->getMessage();
        die();
    }
}

