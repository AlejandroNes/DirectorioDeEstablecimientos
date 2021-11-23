<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/_admin_inc.php'); // verifica la sesión y la identificación del usuario; morir () si no es administrador

// csrf check
require_once(__DIR__ . '/_admin_inc_request_with_ajax.php');

$review_id = (!empty($_POST['review_id'])) ? $_POST['review_id'] : 0;

// delete place from db
if(!empty($review_id)) {
	$query = "UPDATE reviews SET status = 'pending' WHERE review_id = :review_id";
	$stmt = $conn->prepare($query);
	$stmt->bindValue(':review_id', $review_id);
	$stmt->execute();
}
