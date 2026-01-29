<?php
// Fix path definitions
define('BASE_PATH', __DIR__);

// Load config
$config = require_once 'config/database.php';

// Tests
$results = [];

// 1. Session Test
session_start();
$_SESSION['test'] = 'active';
$results['session'] = (isset($_SESSION['test']) && $_SESSION['test'] === 'active');

// 2. Database Connection Test
try {
    $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
    $pdo = new PDO($dsn, $config['username'], $config['password'], $config['options']);
    $results['db_connect'] = true;
    
    // 3. User Data Test
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $count = $stmt->fetchColumn();
    $results['db_users'] = $count;
    
} catch (Exception $e) {
    $results['db_connect'] = false;
    $results['db_error'] = $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>System Diagnosis</title>
    <style>body{font-family:sans-serif;padding:20px;line-height:1.6} .ok{color:green} .fail{color:red}</style>
</head>
<body>
    <h1>System Diagnosis</h1>
    
    <h3>1. Session</h3>
    <p>Status: <?= $results['session'] ? '<b class="ok">BERHASIL (OK)</b>' : '<b class="fail">GAGAL (FAILED)</b>' ?></p>
    
    <h3>2. Database</h3>
    <p>Connection: <?= $results['db_connect'] ? '<b class="ok">BERHASIL (OK)</b> - DB: '.$config['database'] : '<b class="fail">GAGAL (FAILED)</b>' ?></p>
    <?php if(!$results['db_connect']): ?>
        <p>Error: <?= $results['db_error'] ?></p>
    <?php endif; ?>
    
    <?php if(isset($results['db_users'])): ?>
    <p>Users Found: <b><?= $results['db_users'] ?></b></p>
    <?php endif; ?>
    
    <hr>
    <p><a href="index.php?url=auth/login">Kembali ke Login</a></p>
</body>
</html>
