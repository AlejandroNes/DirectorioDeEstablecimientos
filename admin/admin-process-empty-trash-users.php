<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/_admin_inc.php'); // verifica la sesión y la identificación del usuario; morir () si no es administrador

// csrf check
require_once(__DIR__ . '/_admin_inc_request_with_ajax.php');

// quick check
$from = (!empty($_POST['from_check'])) ? $_POST['from_check'] : '';

if($from == 'admin-users-trash') {
	$query = "DELETE FROM users WHERE status = 'trashed'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
}