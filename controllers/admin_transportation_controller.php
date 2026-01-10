<?php
require_once 'config/db.php';
require_once 'includes/functions.php';

// Check Admin Access
if (!isAdmin()) {
    redirect('index.php?page=login');
}

$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$error = '';
$success = '';

// --- HANDLE ACTIONS ---

if ($action == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM transportations WHERE id = ?");
    if ($stmt->execute([$id])) {
        redirect('index.php?page=admin_transportation&msg=deleted');
    } else {
        $error = "Gagal menghapus data.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $facilities = $_POST['facilities'];
    $capacity = $_POST['capacity'];
    $price_range = $_POST['price_range'];
    $contact_number = $_POST['contact_number'];
    
    // Image Upload
    $image = $_POST['old_image'] ?? '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "img/";
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_filename = "transport_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $new_filename;
        }
    }

    if ($action == 'create') {
        $stmt = $pdo->prepare("INSERT INTO transportations (name, type, description, facilities, capacity, price_range, contact_number, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $type, $description, $facilities, $capacity, $price_range, $contact_number, $image])) {
            redirect('index.php?page=admin_transportation&msg=created');
        } else {
            $error = "Gagal menyimpan data.";
        }
    } elseif ($action == 'edit' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("UPDATE transportations SET name=?, type=?, description=?, facilities=?, capacity=?, price_range=?, contact_number=?, image=? WHERE id=?");
        if ($stmt->execute([$name, $type, $description, $facilities, $capacity, $price_range, $contact_number, $image, $id])) {
            redirect('index.php?page=admin_transportation&msg=updated');
        } else {
            $error = "Gagal mengupdate data.";
        }
    }
}

// --- PREPARE DATA FOR VIEWS ---

if ($action == 'list') {
    $stmt = $pdo->query("SELECT * FROM transportations ORDER BY created_at DESC");
    $transportations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    require 'views/admin/transportation_list.php';

} elseif ($action == 'create') {
    require 'views/admin/transportation_form.php';

} elseif ($action == 'edit') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM transportations WHERE id = ?");
        $stmt->execute([$id]);
        $transportation = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$transportation) {
            redirect('index.php?page=admin_transportation');
        }
        require 'views/admin/transportation_form.php';
    } else {
        redirect('index.php?page=admin_transportation');
    }
}
