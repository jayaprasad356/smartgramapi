<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include '../includes/crud.php';
require_once '../includes/functions.php';
include_once('../includes/custom-functions.php');
$fn = new custom_functions;
include_once('../includes/variables.php');
$db = new Database();
$db->connect();

$sql = "SELECT * FROM users";
$db->sql($sql);
$res = $db->getResult();

foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['name'] = $row['name'];
    $temp['gender'] = $row['gender'];
    $rows[] = $temp;
}
$response['success'] = true;
$response['message'] = "Users listed Successfully";
$response['data'] = $rows;
print_r(json_encode($response));