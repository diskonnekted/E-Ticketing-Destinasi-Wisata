<?php
require_once 'config/db.php';

// Fetch souvenirs from database
$stmt = $pdo->query("SELECT * FROM souvenirs ORDER BY created_at DESC");
$souvenirs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Render View
// Since the original design used mobile view for both, we keep it consistent or verify if desktop view is needed.
// The index.php used views/mobile/souvenir.php.
require 'views/mobile/souvenir.php';
