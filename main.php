<?php
session_start();
include 'database.php';
if (session_status() == PHP_SESSION_ACTIVE) {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
        header('Location: index.php');
        exit;
    }
}
include 'head.php';
include_once 'userFunction.php';

$getTags = new Tags();
$Tags = $getTags->get_Tags($conn);
$userID = $_SESSION["user_id"];

?>

<body>
    <?php
    include 'header.php';
    //update status 
    $sql = "SELECT MAX(visitors_count)  FROM articles";
    $statement = $conn->prepare($sql);
    $statement->execute(); // no need to add `$sql` here, you can take that out
    $item_id = $statement->fetchColumn();

    //is active  
    $sql = "UPDATE articles SET isActive='active' WHERE visitors_count=$item_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    //not active
    $sql = "UPDATE articles SET isActive='' WHERE visitors_count!=$item_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    ?>
    <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
        <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
    <?php
        unset($_SESSION['success_message']);
    }
    ?>
    <div class="bg-white">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                <li data-target="#carouselExampleControls" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <?php

                $query = $conn->prepare('SELECT * FROM articles  ORDER BY articles.visitors_count DESC LIMIT 3');
                $query->execute();

                if ($query->rowCount() > 0) {
                    while ($rows = $query->fetch()) {
                        echo "
                        <div class='carousel-item $rows[isActive]'>
                            <a href='readMore.php?read=$rows[id]' target='_blank'><img class='d-block w-100' src='upload/$rows[image]' alt='First slide'> </a>
                                <div class='carousel-caption d-none d-md-block'>
                                    <a href='readMore.php?read=$rows[id]' target='_blank'><h4>$rows[title]</h4></a>
                                </div>
                        </div>";
                    }
                }
                ?>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br>
</body>




<!-- Body  -->
<div class="mainContent bg-white">

    <div class="container subContent">
        <div class="row">
            <div class="col-8 ">
                <?php
                $stmt = $conn->prepare("SELECT articles.id,articles.title, articles.description,articles.image, tags.label  
                FROM articles LEFT JOIN tags ON articles.tags_id = tags.id order by date_added desc LIMIT  3");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<a href='readMore.php?read=$row[id]' target='_blank'><img src='upload/$row[image]' class='img-fluid' alt='Responsive image'></a>";
                    echo "<h6 class='text-primary font-weight-bold'>$row[label]</h6>";
                    echo "<a href='readMore.php?read=$row[id]' target='_blank'><h3>$row[title]</h3></a>";
                    echo "<p class='length'>$row[description]</p>";
                    echo "<a class='float-right text-success' href='readMore.php?read=$row[id]' target='_blank' style='text-decoration: none' data-transition='slide'>
                        READ MORE <span class='fa fa-angle-right carot'></span></a>";
                    echo "<br><br>";
                }



                ?>
            </div>

            <?php
            include 'sidebar.php';
            ?>
        </div>
    </div>



    <form class="text-success d-flex justify-content-center align-items-center flex-column pt-5">
        <a href="">
            <h5 id="load">LOAD MORE</h5>

        </a><i class="material-icons arrow">double_arrow</i>
    </form>
    <br>
</div>






<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 3000
        })
    });
</script>
</body>

</html>