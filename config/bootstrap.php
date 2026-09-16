<?php
declare(strict_types=1);
if (!headers_sent()) {
	header('X-Content-Type-Options: nosniff');
	header('X-Frame-Options: SAMEORIGIN');
	header('Referrer-Policy: strict-origin-when-cross-origin');
}
session_set_cookie_params([
	'httponly' => true,
	'samesite' => 'Lax',
	'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
]);
session_start();
require_once __DIR__.'/database.php';
function e($v):string{return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function csrf():string{if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function check_csrf($v):void{if(empty($_SESSION['csrf'])||!hash_equals($_SESSION['csrf'],$v)){http_response_code(403);exit('Invalid request.');}}
function admin_required():void{if(empty($_SESSION['admin_id'])){header('Location: login.php');exit;}}
function settings(PDO $pdo):array{$a=[];foreach($pdo->query("SELECT setting_key,setting_value FROM settings") as $r)$a[$r['setting_key']]=$r['setting_value'];return $a;}
function active_promo(PDO $pdo):?array{$r=$pdo->query("SELECT * FROM promotions WHERE is_active=1 ORDER BY id DESC LIMIT 1")->fetch();return $r?:null;}
