<?php
session_start();
include_once 'database.php';
include_once 'head.php';
include_once 'header.php';
$articleID = $_GET['read'];
$stmt = $conn->prepare(
    "SELECT articles.id,articles.title, articles.description,
articles.image,articles.date_added,articles.visitors_count, tags.label 
FROM articles,tags 
WHERE articles.id = $articleID and articles.tags_id = tags.id
LIMIT 1"
);
$stmt->execute();

?>
<div class="bg-white">
   <div class="container">
    <?php
    foreach ($stmt as $row) {
        $newCount=$row['visitors_count']+1;
        $sql = "UPDATE articles SET visitors_count=? WHERE id= $row[id]";
        $conn->prepare($sql)->execute([$newCount]);

        echo "<img src='upload/$row[image]' class='img-fluid' alt='Responsive image'>";
        echo "
        <div class='container' style='padding-left: 7rem;padding-right: 7rem;'>
        <article>
        <h5 class='text-primary font-weight-bold'>$row[label]</h5>
        <h2>$row[title]</h2>
        <small>$row[date_added]</small>
        <br><br>

        <article>$row[description]
        <br><br></article>
       </div>";
        $_SESSION['articleID'] = $row['id'];
    }

    include 'comment.php';
    ?>


</div> 
</div>
