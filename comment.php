<?php
include 'database.php';
if (session_status() == PHP_SESSION_ACTIVE) {
}

$Comment_Number = 0;
$articleID = $_SESSION['articleID'];



?>
<div class="bg-light">
    <div class="container p-4">
        <div class="container">
            <!-- COMMENT BOX -->

            <?php


            $stmt = $conn->prepare(
                "SELECT comments.id,comments.comment, users.first_name,users.last_name,comments.article_id 
                FROM comments,users 
                WHERE comments.article_id = $articleID  and comments.user_id = users.id"
            );
            $stmt->execute();
            $count = $stmt->rowCount();

            echo "<h2>COMMENTS <small>($count)</small></h2>";
            foreach ($stmt as $row) {
                echo "<div class='container border border-secondary'>";
                echo "<h6 class='text-dark'>$row[first_name] $row[last_name] </h6>";
                echo "<p class='text-dark commentLength' >$row[comment]</p>
";
                echo "</div><br>";
            }
            ?>
        </div>
        <br>
        <!-- COMMENT FORM -->
        <form class="container p-2" action="" method="post">
            <h2>Join the discussion</h2>
            <textarea rows="8" cols=100% class="bg-light border border-secondary w-100" placeholder="   Your Comment" name="CommentText"></textarea>
            <div class="alert alert-danger" role="alert" id="noti" style="display: none">
                Please fill the field ..!
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn-success mt-5 p-1 pr-4 pl-4" type="submit" name="submit">ADD Comment</button>
            </div>
        </form>

    </div>

</div>
<?php
if (isset($_POST['submit'])) {
    try {
        if (($_POST['CommentText'] !== '')) {

            $commentText = $_POST['CommentText'];
            $userID = $_SESSION["user_id"];


            $query = "INSERT INTO comments( comment, user_id, article_id) VALUES (:CommentText,:user_id,:articleID)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':CommentText', $commentText);
            $stmt->bindParam(':user_id', $userID);
            $stmt->bindParam(':articleID', $articleID);

            if ($stmt->execute()) {
                echo "<script>
            alert('comment added successfully ')</script>";
            } else {
                echo "<script>
            alert('Please insert a comment  ')</script>";
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<script>
    var length = 255;
    if ($.trim('#commentBody').val() > 255) {
        document.getElementById("readMore").style.display = "block";
    }
</script>