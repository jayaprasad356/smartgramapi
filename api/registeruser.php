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


if (empty($_POST['name'])) {
    $response['success'] = false;
    $response['message'] = "Name is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['mobile'])) {
    $response['success'] = false;
    $response['message'] = "Mobile is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password is Empty";
    print_r(json_encode($response));
    return false;
}


if (empty($_POST['occupation'])) {
    $response['success'] = false;
    $response['message'] = "Occupation is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['gender'])) {
    $response['success'] = false;
    $response['message'] = "Gender is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['email_id'])) {
    $response['success'] = false;
    $response['message'] = "Email is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['address'])) {
    $response['success'] = false;
    $response['message'] = "Address is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['village_name'])) {
    $response['success'] = false;
    $response['message'] = "Village name is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['pincode'])) {
    $response['success'] = false;
    $response['message'] = "Pincode is Empty";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['district'])) {
    $response['success'] = false;
    $response['message'] = "District is Empty";
    print_r(json_encode($response));
    return false;
}

$name = $db->escapeString($fn->xss_clean($_POST['name']));
$mobile = $db->escapeString($fn->xss_clean($_POST['mobile']));
$password = $db->escapeString($fn->xss_clean($_POST['password']));
$occupation = $db->escapeString($fn->xss_clean($_POST['occupation']));
$gender = $db->escapeString($fn->xss_clean($_POST['gender']));
$email_id = $db->escapeString($fn->xss_clean($_POST['email_id']));
$address = $db->escapeString($fn->xss_clean($_POST['address']));
$village_name = $db->escapeString($fn->xss_clean($_POST['village_name']));
$pincode = $db->escapeString($fn->xss_clean($_POST['pincode']));
$district = $db->escapeString($fn->xss_clean($_POST['district']));

$sql = "insert into users (`name`,`mobile`,`password`,`occupation`,`gender`,`email_id`,`address`,`village_name`,`pincode`,`district`) values('$name','$mobile','$password','$occupation','$gender','$email_id','$address','$village_name','$pincode','$district')";
$db->sql($sql);
$response['success'] = true;
$response['message'] = "users regitered Successfully";
print_r(json_encode($response));