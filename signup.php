<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users", $_POST['username'], $_POST['email'], $_POST['password'], $_POST['address'])) {
            echo "Registration Successful";
        } else echo "Регистрация не завершена";
    } else echo "Error: Database connection";
} else echo "Не все поля заполненны";
?>
