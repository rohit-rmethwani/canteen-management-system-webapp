<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 04-01-2019
 * Time: 21:53
 */

    include_once ("connection.php");

    function create_new_user($user_email, $password, $role)
    {
        global $connection;
        if(check_existing_user($user_email) == 1)
        {
            die("User already exists");
        }
        else
        {
            $hashed_password = password_hash($password, 1);
            $query = "INSERT INTO users (user_email, user_password, user_role) VALUES (?, ?, ?)";
            $prepared_statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($prepared_statement, "sss", $user_email, $hashed_password, $role);
            mysqli_stmt_execute($prepared_statement);
            if(mysqli_errno($connection))
            {
                die(mysqli_error($connection));
            }
            else
            {
                echo "Successful";
            }
        }
    }

    function update_user_email($new_email, $old_email)
    {
        global $connection;
        $result = get_all_users();
        $query = "UPDATE users SET user_email = '$new_email' WHERE user_email = '$old_email'";
        $prepared_statement = mysqli_prepare($connection, $query);
        if($result)
        {
            if($old_email == $result["user_email"] )
            {
                mysqli_stmt_execute($prepared_statement);
                if(mysqli_errno($connection))
                {
                    die(mysqli_error($connection));
                }
                else
                {
                    echo "updated!";
                }
            }
        }
    }

    function get_all_users( $condition = 1 )
    {
        global $connection;
        $query = "SELECT * FROM users WHERE $condition";
//        die($query);
        $prepared_statement = mysqli_prepare($connection, $query);
        mysqli_stmt_execute($prepared_statement);
        $result_set = mysqli_stmt_get_result($prepared_statement);
        if($result_set)
        {
            $assoc_array = mysqli_fetch_assoc($result_set);
            return $assoc_array;
        }
        else
        {
            return 0;
        }
    }

    function check_password($password, $confirm_password)
    {
        if($confirm_password == $password)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function check_existing_user($user_email)
    {
        $result = get_all_users("user_email = '$user_email'");
        if($result == 0)
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }

?>