<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->logIn("users", $_POST['email'], $_POST['password'])) {
            echo "Login Successful";
        } else echo "Wrong password or login";
    } else echo "Error: Database connection";
} else echo "Не все поля заполненны";
?>
