<?php

require_once '../../config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$username = 'admin';
$password = 'P@ssword1';


$sql = "INSERT INTO admin (username, password) VALUES (?,?)";
$stmt = $dbh->prepare($sql);

// hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt->execute([$username, $hashedPassword]);

$error = ['success' => 'success'];
echo json_encode($error);
exit();
