<nav class="navbar navbar-expand-lg fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CANTEEN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="user_menu.php" class="nav-link">All</a>
                </li>
                <?php
                $result = getAllCategories();
                while($row = mysqli_fetch_assoc($result))
                {
                    echo <<< LINK

                <li class="nav-item">
                    <a class="nav-link" href="user_menu.php?cat_id={$row["category_id"]}">{$row["category_name"]}</a>
                </li>
LINK;
                }
                ?>
            </ul>
        </div>
    </div>
</nav>