<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/_admin_inc.php'); // verifica la sesión y la identificación del usuario; morir () si no es administrador

// csrf check
require_once(__DIR__ . '/_admin_inc_request_with_ajax.php');

$place_id = $_POST['place_id'];
$paid = $_POST['paid'];

if($paid == 'paid'){
	$query = "UPDATE places SET paid = 0 WHERE place_id= :place_id";
	$paid = 'unpaid';
}
else {
	$query = "UPDATE places SET paid = 1 WHERE place_id= :place_id";
	$paid = 'paid';
}

$stmt = $conn->prepare($query);
$stmt->bindValue(':place_id', $place_id);
$stmt->execute();

echo $paid;