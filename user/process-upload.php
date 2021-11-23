<?php
require_once(__DIR__ . '/../inc/config.php');
require_once(__DIR__ . '/../inc/smart_resize_image.php');
require_once(__DIR__ . '/user_area_inc.php');

$submit_token = $_SESSION['submit_token'];

if(empty($submit_token)) {
	echo "Submit token empty";
	die();
}


if($_FILES['userfile']['error'] != 0 || !exif_imagetype($_FILES['userfile']['tmp_name'])) {
	//echo "Error durante la carga del archivo. Asegúrese de que el archivo seleccionado sea una imagen y sea más pequeño que", ini_get ('upload_max_filesize');
	echo $_FILES['userfile']['error']; // puede ser de 1 a 8, consulte: http://php.net/manual/en/features.file-upload.errors.php
}
else {
	// actualizar imagen
	$uploaded_img = basename($_FILES['userfile']['name']);

	//obtener la extensión del archivo
	$ext = pathinfo($uploaded_img, PATHINFO_EXTENSION);
	$ext = mb_strtolower($ext);

	// generar nombre de archivo
	$filename = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $ext;

	// paths
	$place_pic_tmp = $pic_basepath . '/' . $place_tmp_folder . '/' . $filename;

	// cuenta cuántas fotos ya ha subido este usuario
	$query = "SELECT COUNT(*) AS num_pics FROM tmp_photos WHERE submit_token = :submit_token";
	$stmt = $conn->prepare($query);
	$stmt->bindValue(':submit_token', $submit_token);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$num_pics = $row['num_pics'];

	if($num_pics < $max_pics + 50) {
		if(@move_uploaded_file($_FILES['userfile']['tmp_name'], $place_pic_tmp)) {
			if(!isset($global_pic_width)) {
				$global_pic_width = 948;
			}
			if(!isset($global_pic_height)) {
				$global_pic_height = 632;
			}
			smart_resize_image($place_pic_tmp, null, $global_pic_width, $global_pic_height, false, $place_pic_tmp, false, false, 85);

			// insertar en tmp_photos
			$query = "INSERT INTO tmp_photos(submit_token, filename) VALUES(:submit_token, :filename)";
			$stmt = $conn->prepare($query);
			$stmt->bindValue(':submit_token', $submit_token);
			$stmt->bindValue(':filename', $filename);
			$stmt->execute();

			echo $filename;
		}
		else {
			echo "10"; // error
		}
	}
	else {
		echo "12"; // configurar error
	}
}