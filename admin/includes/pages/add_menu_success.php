<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 06-01-2019
 * Time: 21:20
 */
include_once("../functions.php");
if(isset($_POST["add_menu_item"]))
{
    $item_name = $_POST["item_name"];
    $item_category_id = $_POST["item_category_id"];
    $item_price = $_POST["item_price"];
    if(add_menu_item($item_name, $item_category_id, $item_price))
    {
        die("I am inside if");
        header("Location: ../../view_all_menu.php");
    }
    else
    {
        die("Some Issue");
    }
}