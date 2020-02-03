<?php

?>
<div class="bg-white">
    <div class="container bg-white">
        <nav class="navbar navbar-light">
            <div>
                <a href='main.php'><img src='image\sprintive-logo.png' class='img-fluid' alt='Responsive image' style="width: 15%"></a>
                <span style="font-weight: bolder;font-size: 1.5em;">sprintive</span>
                <?php
                if (session_status() == PHP_SESSION_ACTIVE) {
                    echo "<p><b>Welcome </b> ".$_SESSION['username'] ."</p>";

                }
                else{
                    echo"error";
                }
                ?>

            </div>
            <div class="d-flex flex-row bd-highlight">
                <i class="material-icons">search</i>
                <a type='submit' class='btn bg-transparent' href='logout.php' >Log out </a>
                
                
                <a type="button" class="btn btn-outline-success" href="addPost.php">Create Post </a>

            </div>

        </nav>
    </div>

    <hr>
    <div class="container " style="padding-bottom: 1rem;">
        <?php include_once 'database.php';
        include_once 'userFunction.php';

        $getTags = new Tags();
        $Tags = $getTags->get_Tags($conn);
        ?>


        <a class="menu" href="main.php">HOME</a>
        <?php
        foreach ($Tags as $tag) {
            echo " <a href='tagsPage.php?section=$tag[id]' class='menu'>$tag[label] </a>";
        }
        ?>


    </div>
</div>
<?php
?>