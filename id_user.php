<?php
header('Content-Type: application/json');
$data = array();
$con = mysqli_connect('localhost', 'root','','jumba');
if ($con) {
    $sql = "select * from users";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) != 0){
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)){
            $data[$i] = $row;
            $i++;
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}