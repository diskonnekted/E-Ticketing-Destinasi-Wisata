<?php
session_start();

function trans($en, $id) {
    $lang = $_SESSION['lang'] ?? 'id'; // Default to Indonesian
    return $lang == 'en' ? $en : $id;
}

function formatRupiah($amount) {
    return "Rp " . number_format($amount, 0, ',', '.');
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
}

function isOperator() {
    return isset($_SESSION['role']) && ($_SESSION['role'] == 'operator' || $_SESSION['role'] == 'admin');
}

function isMonitor() {
    return isset($_SESSION['role']) && ($_SESSION['role'] == 'monitor' || $_SESSION['role'] == 'admin');
}

function redirect($path) {
    header("Location: $path");
    exit;
}

// Simple Asset helper
function asset($path) {
    return $path; // In root deployment, this is just the path
}
