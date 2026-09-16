<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
require __DIR__.'/../config/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo json_encode(['success' => false, 'message' => 'Method not allowed']);
	exit;
}

check_csrf($_POST['csrf'] ?? '');
$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$interest = (string)($_POST['interest'] ?? '');
$consent = isset($_POST['consent']) ? 1 : 0;

if ($name === '' || mb_strlen($name) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 160 || !preg_match('/^[0-9+\-\s().]{6,30}$/', $phone) || !in_array($interest, ['Yes', 'No'], true) || !$consent) {
	http_response_code(422);
	echo json_encode(['success' => false, 'message' => 'Please complete all fields and consent.']);
	exit;
}

$pdo->prepare('INSERT INTO leads(name,email,phone,renovation_interest,consent,ip_address,user_agent) VALUES(?,?,?,?,?,?,?)')->execute([
	$name, $email, $phone, $interest, $consent,
	$_SERVER['REMOTE_ADDR'] ?? '',
	substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500),
]);

$s = settings($pdo);
$to = $s['notification_email'] ?? '';
if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
	$host = preg_replace('/[^a-z0-9.-]/i', '', $_SERVER['HTTP_HOST'] ?? 'localhost');
	@mail($to, 'New renovation enquiry', "Name: $name\nEmail: $email\nPhone: $phone\nRenovation interest: $interest\nTime: ".date('c'), "From: no-reply@$host\r\nReply-To: $email");
}

echo json_encode(['success' => true]);
