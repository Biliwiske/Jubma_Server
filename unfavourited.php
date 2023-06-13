<?php
$name = $_POST['name'];
$user_id = $_POST['user_id'];
$con = mysqli_connect('localhost', 'root', '', 'jumba');
if ($con) {
    $sql = "DELETE FROM favourited WHERE name = '$name' AND user_id = '$user_id'";
    if (mysqli_query($con, $sql)) {
        echo "Success";
    } else {
        echo "Failed to unfavourite";
    }
} else {
    echo "Failed to connect";
}
?>
