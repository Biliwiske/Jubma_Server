<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['cost']) && isset($_POST['user_id'])) {
    if ($db->dbConnect()) {
        if ($db->AddFav("favourited", $_POST['name'], $_POST['description'], $_POST['cost'], $_POST['user_id'])) {
            echo "Add Successful";
        } else echo "Ошибка в добавлении";
    } else echo "Error: Database connection";
} else echo "Не все поля заполненны";
?>
