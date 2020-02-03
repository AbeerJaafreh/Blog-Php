<?php
session_start();
include 'head.php';
include 'database.php';
include 'userFunction.php';
include_once 'header.php';
$getTags = new Tags();
$Tags = $getTags->get_Tags($conn)
?>
<div class="bg-white" style="padding-bottom: 100%;">
    <div class="container">
        <form class=" mx-auto p-5 " method="post" action="" enctype="multipart/form-data">
            <h2>ADD POST </h2>
            <BR>
            <label for="title"> Title : <input type="text" style="padding: 5%;" class="form-control" id="title" name="title" placeholder="your title  ..."></label>
            <textarea class="form-control" id="description" placeholder="Describe yourself here..." name="description" rows="3"> </textarea>
            <div class="row">
                <div class="form-group">
                    <label for="tags" style="padding: 5%;">Select Tags
                        <select class="form-control" id="tags" name="Tag">
                            <?php
                            foreach ($Tags as $tag) {
                                echo "<option value=$tag[id]>$tag[label]</option>";
                            }
                            ?>
                        </select>
                    </label>
                    <input style="margin-left: 5%;"type="file" name="image" id="image" class="form-control">

                </div>
            </div>

            <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])) { ?>
                <div class="error_message" style="margin-bottom: 20px;font-size: 20px;color: red;"><?php echo $_SESSION['error_message']; ?></div>
            <?php
                unset($_SESSION['error_message']);
            }
            ?>
            <button type="submit"   class="btn button btn-outline-success float-right mt-3" name="publish" id="publishPost">Publish Post </button>
        </form>
    </div>

</div>

<?php
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
            $_SESSION['error_message'] = "please fill the fields !! ";
            echo "<script>
            window.location.href='addPost.php'</script>";
        } elseif (strlen($title) > 255) {
            $_SESSION['error_message'] = "the title must be less than 255 characters ";
            echo "<script>
            window.location.href='addPost.php'</script>";
        } else {
            $stmt->execute();
            $_SESSION['success_message'] = "Post Added Successfully ";

            echo "<script>
            window.location.href='main.php'</script>";
        }
    } catch (PDOException $e) {
        $e->getMessage();
        die();
    }
}


?>