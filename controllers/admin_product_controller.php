<?php
if (!isAdmin()) {
    redirect('index.php?page=login');
}

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

// Handle Image Upload
function uploadImage($file) {
    $targetDir = "img/";
    $fileName = basename($file["name"]);
    // Simple rename to avoid conflicts (timestamp)
    $newFileName = time() . '_' . $fileName;
    $targetFilePath = $targetDir . $newFileName;
    
    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $newFileName;
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'store') {
        $name_en = $_POST['name_en'];
        $name_id = $_POST['name_id'];
        $desc_en = $_POST['description_en'];
        $desc_id = $_POST['description_id'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $duration = $_POST['duration'] ?? '';
        $itinerary_en = $_POST['itinerary_en'] ?? '';
        $itinerary_id = $_POST['itinerary_id'] ?? '';
        $facilities_en = $_POST['facilities_en'] ?? '';
        $facilities_id = $_POST['facilities_id'] ?? '';
        $policy_en = $_POST['policy_en'] ?? '';
        $policy_id = $_POST['policy_id'] ?? '';
        $latitude = !empty($_POST['latitude']) ? $_POST['latitude'] : null;
        $longitude = !empty($_POST['longitude']) ? $_POST['longitude'] : null;
        
        $image = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = uploadImage($_FILES['image']);
        }
        
        $stmt = $pdo->prepare("INSERT INTO products (name_en, name_id, description_en, description_id, price, type, image, duration, itinerary_en, itinerary_id, facilities_en, facilities_id, policy_en, policy_id, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name_en, $name_id, $desc_en, $desc_id, $price, $type, $image, $duration, $itinerary_en, $itinerary_id, $facilities_en, $facilities_id, $policy_en, $policy_id, $latitude, $longitude]);
        
        $productId = $pdo->lastInsertId();

        // Handle Gallery
        if (isset($_FILES['gallery'])) {
            $count = count($_FILES['gallery']['name']);
            for ($i = 0; $i < $count; $i++) {
                if ($_FILES['gallery']['error'][$i] == 0) {
                    $file = [
                        'name' => $_FILES['gallery']['name'][$i],
                        'tmp_name' => $_FILES['gallery']['tmp_name'][$i]
                    ];
                    $imgPath = uploadImage($file);
                    if ($imgPath) {
                        $stmtImg = $pdo->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
                        $stmtImg->execute([$productId, $imgPath]);
                    }
                }
            }
        }
        
        redirect('index.php?page=admin_products');
    } 
    elseif ($action === 'update') {
        $name_en = $_POST['name_en'];
        $name_id = $_POST['name_id'];
        $desc_en = $_POST['description_en'];
        $desc_id = $_POST['description_id'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $duration = $_POST['duration'] ?? '';
        $itinerary_en = $_POST['itinerary_en'] ?? '';
        $itinerary_id = $_POST['itinerary_id'] ?? '';
        $facilities_en = $_POST['facilities_en'] ?? '';
        $facilities_id = $_POST['facilities_id'] ?? '';
        $policy_en = $_POST['policy_en'] ?? '';
        $policy_id = $_POST['policy_id'] ?? '';
        $latitude = !empty($_POST['latitude']) ? $_POST['latitude'] : null;
        $longitude = !empty($_POST['longitude']) ? $_POST['longitude'] : null;
        
        // Check if new image uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = uploadImage($_FILES['image']);
            $stmt = $pdo->prepare("UPDATE products SET name_en=?, name_id=?, description_en=?, description_id=?, price=?, type=?, image=?, duration=?, itinerary_en=?, itinerary_id=?, facilities_en=?, facilities_id=?, policy_en=?, policy_id=?, latitude=?, longitude=? WHERE id=?");
            $stmt->execute([$name_en, $name_id, $desc_en, $desc_id, $price, $type, $image, $duration, $itinerary_en, $itinerary_id, $facilities_en, $facilities_id, $policy_en, $policy_id, $latitude, $longitude, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE products SET name_en=?, name_id=?, description_en=?, description_id=?, price=?, type=?, duration=?, itinerary_en=?, itinerary_id=?, facilities_en=?, facilities_id=?, policy_en=?, policy_id=?, latitude=?, longitude=? WHERE id=?");
            $stmt->execute([$name_en, $name_id, $desc_en, $desc_id, $price, $type, $duration, $itinerary_en, $itinerary_id, $facilities_en, $facilities_id, $policy_en, $policy_id, $latitude, $longitude, $id]);
        }
        
        // Handle Gallery (Append)
        if (isset($_FILES['gallery'])) {
            $count = count($_FILES['gallery']['name']);
            for ($i = 0; $i < $count; $i++) {
                if ($_FILES['gallery']['error'][$i] == 0) {
                    $file = [
                        'name' => $_FILES['gallery']['name'][$i],
                        'tmp_name' => $_FILES['gallery']['tmp_name'][$i]
                    ];
                    $imgPath = uploadImage($file);
                    if ($imgPath) {
                        $stmtImg = $pdo->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
                        $stmtImg->execute([$id, $imgPath]);
                    }
                }
            }
        }
        
        redirect('index.php?page=admin_products');
    }
}

if ($action === 'delete') {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
    redirect('index.php?page=admin_products');
}

// Fetch data for views
if ($action === 'edit') {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();
    
    // Fetch gallery
    $stmtImg = $pdo->prepare("SELECT * FROM product_images WHERE product_id = ?");
    $stmtImg->execute([$id]);
    $gallery = $stmtImg->fetchAll();
    
    require 'views/admin/product_form.php';
} elseif ($action === 'create') {
    require 'views/admin/product_form.php';
} else {
    // List
    $products = $pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
    require 'views/admin/product_list.php';
}
