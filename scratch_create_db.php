<?php
$hosts = ['127.0.0.1', 'localhost'];
$ports = [3306, 3307, 3308];

$success = false;
foreach ($hosts as $host) {
    foreach ($ports as $port) {
        try {
            $pdo = new PDO("mysql:host={$host};port={$port}", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec('CREATE DATABASE IF NOT EXISTS `vizziocraft2`');
            echo "SUCCESS: Connected to MySQL at {$host}:{$port} and created database `vizziocraft2`!\n";
            file_put_contents('scratch_db_info.txt', "HOST={$host}\nPORT={$port}\n");
            $success = true;
            break 2;
        } catch (Exception $e) {
            echo "Failed {$host}:{$port} -> " . $e->getMessage() . "\n";
        }
    }
}

if (!$success) {
    echo "NO_MYSQL_LISTENING\n";
}
