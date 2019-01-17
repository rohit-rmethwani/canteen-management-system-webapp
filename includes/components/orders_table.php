<?php
    include_once ("includes/functions.php");
?>
<div class="row">
    <div class="col-md-12 mb-3">
        <a href="add_menu_item.php" class="btn btn-info">Add Item</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Item Category</th>
                    <th>Item Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = get_all_menu_items();
                while($row = mysqli_fetch_assoc($result))
                {
                    $cat_name = mysqli_fetch_assoc(getAllCategories("category_id = {$row["item_category_id"]}"));
//                                    die($cat_name[0]["category_name"]);
                    echo "<tr>";
                    echo "<td>{$row["item_name"]}</td>";
                    echo "<td>{$cat_name["category_name"]}</td>";
                    echo "<td>{$row["item_price"]}</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>