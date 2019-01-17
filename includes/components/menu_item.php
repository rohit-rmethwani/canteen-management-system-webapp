<div class="menu-item-container container">
    <div class="menu-header">
        <form action="" method="post">
            <span class="h2">MENU</span>
            <a href="" class="btn btn-success float-right" role="button">Add</a>
        </form>
    </div>
    <?php
    $cat_id = 1;
    if(isset($_GET["cat_id"]))
    {
        $cat_id = $_GET["cat_id"];
        $result = get_all_menu_items("item_category_id = $cat_id");
    }
    else{
        $result = get_all_menu_items();
    }
    while($row = mysqli_fetch_assoc($result))
    {
        $resultset = getAllCategories("category_id = {$row["item_category_id"]}");
        $cat_name = mysqli_fetch_assoc($resultset);
        $class = "card-header-primary";
        if($cat_name["category_name"] == "Fast Food")
        {
            $class = "card-header-warning";
        }
        elseif($cat_name["category_name"] == "Desert")
        {
            $class = "card-header-rose";
        }
        elseif ($cat_name["category_name"] == "Main Course")
        {
            $class = "card-header-info";
        }
        elseif($cat_name["category_name"] == "Beverages")
        {
            $class = "card-header-primary";
        }
        echo <<< ITEM
            <div class="card">
            <div class="card-header card-header-text $class">
            <div class="card-text">
              <h4 class="h5">{$cat_name["category_name"]}</h4>
            </div>
            </div>
                <div class="card-body">
                    <span class="h5">{$row["item_name"]}</span>
                    <br>
                    <span class="h5">Price: ₹{$row["item_price"]}</span>
                    <input type="number" class="form-control" placeholder="Enter quantity">
                </div>
            </div>
ITEM;

    }
    ?>
</div>