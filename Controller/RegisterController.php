<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 10/23/15
 * Time: 4:48 PM
 */

include('../Model/AbstractModel.php');
include '../Model/User.php';
include '../Model/Role.php';

$user = new User();

// We check if all the fields are filled
if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['emailConfirm']) && !empty($_POST['password'])
    && !empty($_POST['passwordconf']) && !empty($_POST['antispam'])
) {
    // We interogate the database with the inserted values
    $userCheck = $user->checkUserWhenRegister($_POST['username'], $_POST['email']);

    // we check if the username already exists in DB
    if ($userCheck->num_rows) {
        echo '<script>alert("Username or Email already exists!");</script>';
    } else {
        //we check if the email, password and spam match and we will insert data in DB
        if ($_POST['email'] == $_POST['emailConfirm'] && $_POST['password'] == $_POST['passwordconf'] && $_POST['antispam'] == 6) {
            $user->registerUser($_POST['username'], $_POST['password'], $_POST['email'], Role::USER);
            header("Location: login.php");
        } else {
            echo '<script>alert("The inserted data do not match");</script>';
        }
    }
} else {
    echo '<script>alert("Please fill in all the fields ");</script>';
}
