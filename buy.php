<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['date']) && isset($_POST['product']) && isset($_POST['status']) && isset($_POST['user_id'])) {
    if ($db->dbConnect()) {
        if ($db->buyIn("orders", $_POST['date'], $_POST['product'], $_POST['status'], $_POST['user_id'])) {
            echo "Buy Successful";
        } else echo "Ошибка в покупке";
    } else echo "Error: Database connection";
} else echo "Не все поля заполненны";
?>
