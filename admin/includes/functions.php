<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 06-01-2019
 * Time: 18:16
 */

include_once ("admin_connection.php");
function getAllCategories($condition = 1)
{
    global $connection;
    $query = "SELECT * FROM categories WHERE $condition";
//    die($query);
    $prepared_statement = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($prepared_statement);
    $result_set = mysqli_stmt_get_result($prepared_statement);
    if(mysqli_errno($connection))
    {
        return 0;
    }
    else
    {
        return $result_set;
    }
}

function get_all_menu_items($condition = 1)
{
    global $connection;
    $query = "SELECT * FROM menu WHERE $condition";
    $prepared_statement = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($prepared_statement);
    $result_set = mysqli_stmt_get_result($prepared_statement);
    if(mysqli_errno($connection))
    {
        die(mysqli_error($connection));
    }
    else
    {
        return $result_set;
    }
}

function add_menu_item($item_name, $item_category_id, $item_price)
{
    global $connection;
    $query = "INSERT INTO menu (item_name, item_category_id, item_price) VALUES (?, ?, ?)";
    $prepared_statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($prepared_statement, "sdd", $item_name, $item_category_id, $item_price);
    mysqli_stmt_execute($prepared_statement);
    if(mysqli_errno($connection))
    {
        die(mysqli_error($connection));
    }
    else
    {
        return 1;
    }
}

function get_all_orders($condition = 1)
{

}