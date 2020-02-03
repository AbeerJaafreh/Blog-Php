<?php
include 'head.php';
include_once 'database.php';
session_start();

$tagID = $_GET['section'];
$stmt = $conn->prepare(
    "SELECT * FROM articles  
    WHERE tags_id = $tagID "
);
$stmt->execute();
?>
<div class="bg-white" style="padding-bottom: 100%;">
<?php include 'header.php';?>

    <div class="container">
        <?php
        $section = $conn->prepare(
            "SELECT * FROM tags  
        WHERE id = $tagID "
        );
        $section->execute();
        foreach ($section as $row) {
            echo "<h2>$row[label] </h2>";
        }
        ?>

        <div class="row">
            <div class="col-8">
                <div class="content">
                    <?php
                    foreach ($stmt as $row) {
                        echo "
                    <div>
                    <a href='readMore.php?read=$row[id]' target='_blank'><img src='upload/$row[image]' class='img-fluid' alt='Responsive image'></a>
                    <a href='readMore.php?read=$row[id]' target='_blank'><h3>$row[title]</h3></a>
                    </div>
                    ";
                    }


                    ?>


                </div>

            </div>
            <?php
            include_once 'sidebar.php';
            ?>
        </div>
    </div>
</div>