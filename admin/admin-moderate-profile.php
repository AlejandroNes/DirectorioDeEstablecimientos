<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/_admin_inc.php'); // verifica la sesión y la identificación del usuario; morir () si no es administrador

$operation = isset($_POST['operation']) ? $_POST['operation'] : '';
$user_id   = isset($_POST['user_id'])   ? $_POST['user_id']   : '';

if($operation == 'approve_user') {
	if(!empty($user_id)) {
		// update users table
		$query = "UPDATE users SET status = 'approved' WHERE id = :user_id";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':user_id', $user_id);
		$stmt->execute();
	}
}

if($operation == 'delete_user') {
	$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

	if(!empty($user_id)) {
		// update users table
		$query = "UPDATE users SET status = 'trashed' WHERE id = :user_id";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':user_id', $user_id);
		$stmt->execute();
	}
}