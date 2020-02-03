<?php
// include 'userFunction.php';
$getTags = new Tags();
$Tags = $getTags->get_Tags($conn);
function number($conn, $id)
{
    $stmt = $conn->prepare('SELECT COUNT(tags_id)FROM articles WHERE tags_id= ' . $id);
    $stmt->execute();
    $num_rows = $stmt->fetchColumn();
    return $num_rows;
}
?>
<div class="col-4">
    <div class="bg-light" style="width: 18rem;">
        <div class="card-body">
            <h4 class="card-title font-weight-bold">Sections</h4>
            <?php
            $views = 0;

            foreach ($Tags as $tag) {

                echo " <a href='tagsPage.php?section=$tag[id]' class='card-link'>$tag[label] <small>(" . number($conn, $tag['id']) . ")</small></a>";
            }


            ?>
        </div>
    </div>
    <br>
    <!--  -->
    <div class="bg-light" style="width: 18rem;">
        <div class="card-body">
            <h4 class="card-title font-weight-bold">Popular Articles</h4>
            <?php
            $query = $conn->prepare('SELECT  articles.id,articles.title, articles.description,
            articles.image,articles.visitors_count 
            FROM articles  ORDER BY articles.visitors_count DESC LIMIT 3');
            $query->execute();

            if ($query->rowCount() > 0) {
                while ($rows = $query->fetch()) {

                    echo "
                    <div>
                        <a href='readMore.php?read=$rows[id]' target='_blank'><img src='upload/$rows[image]' class='img-fluid' alt='Responsive image'></a>
                        <a href='readMore.php?read=$rows[id]' target='_blank'><h5 class='text-dark font-weight-bold'>$rows[title]</h5></a>
                        <small>$rows[visitors_count] Views</small>
                    </div>";
                }
            }


            ?>
            
        </div>
    </div>
</div>