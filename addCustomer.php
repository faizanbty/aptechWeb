<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "db_conn.inc";

if (isset($_GET['emp'])) {

    $dat = json_decode($_GET['emp']);

    $name = trim($dat->name);
    $email = trim($dat->email);
    $pwd = trim($dat->pwd)

    $query = "INSERT INTO `customers` (`customerNumber`, `customerName`, `contactLastName`, `contactFirstName`, `phone`, `addressLine1`, `addressLine2`, `city`, `state`, `postalCode`, `country`, `salesRepEmployeeNumber`, `creditLimit`, `email`, `pwd`, `file`, `type`) VALUES (NULL, '$name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$email', '', NULL, 'M')";

    $cmd = mysqli_query($conn, $query);

    $json = array();

    while ($row = mysqli_fetch_assoc($cmd)) {
        $json[] = $row;
    }

    echo json_encode($json);
} else {
    echo json_encode(["success" => 0, "msg" => "Please fill all the required fields!"]);
}
