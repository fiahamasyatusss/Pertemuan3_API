<?php
header('Access-Control-Allow-Origin: *');
$connection = new mysqli("localhost", "root", "", "latihan");
$data = mysqli_query($connection, "SELECT * FROM nm_produk");
$response = array();

if ($data) {
    while ($row = mysqli_fetch_assoc($data)) {
        $row['avatar'] = 'http://192.168.1.11/api/img/' . $row['avatar'];
        $response[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode(['data' => $response]);
