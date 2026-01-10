<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?? 'id' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Hollynice Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .sidebar-active { background-color: rgba(13, 148, 136, 0.1); color: #0d9488; border-right: 3px solid #0d9488; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col z-10">
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <img src="img/logo.jpg" alt="Logo" class="h-8 w-auto mr-3 rounded">
            <span class="font-bold text-lg text-gray-800">Admin Panel</span>
        </div>
        
        <div class="flex-1 overflow-y-auto py-4">
            <nav class="space-y-1 px-3">
                <a href="index.php?page=admin" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600 <?= $page === 'admin' ? 'sidebar-active' : 'text-gray-700' ?>">
                    <i class="fas fa-home w-6 mr-2 text-center"></i>
                    Dashboard
                </a>
                <a href="index.php?page=admin_products" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600 <?= $page === 'admin_products' ? 'sidebar-active' : 'text-gray-700' ?>">
                    <i class="fas fa-ticket-alt w-6 mr-2 text-center"></i>
                    Manajemen Produk
                </a>
                <a href="index.php?page=admin_accommodation" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600 <?= $page === 'admin_accommodation' ? 'sidebar-active' : 'text-gray-700' ?>">
                    <i class="fas fa-bed w-6 mr-2 text-center"></i>
                    Manajemen Penginapan
                </a>
                <a href="index.php?page=admin_culinary" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600 <?= $page === 'admin_culinary' ? 'sidebar-active' : 'text-gray-700' ?>">
                    <i class="fas fa-utensils w-6 mr-2 text-center"></i>
                    Manajemen Kuliner
                </a>
                <a href="index.php?page=admin_souvenir" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600 <?= $page === 'admin_souvenir' ? 'sidebar-active' : 'text-gray-700' ?>">
                    <i class="fas fa-gift w-6 mr-2 text-center"></i>
                    Manajemen Souvenir
                </a>
                <a href="index.php?page=admin_transportation" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600 <?= $page === 'admin_transportation' ? 'sidebar-active' : 'text-gray-700' ?>">
                    <i class="fas fa-bus w-6 mr-2 text-center"></i>
                    Manajemen Transportasi
                </a>
                <a href="index.php?page=operator" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600">
                    <i class="fas fa-qrcode w-6 mr-2 text-center"></i>
                    POS Scanner
                </a>
                 <a href="index.php?page=home" class="flex items-center px-3 py-2 text-sm font-medium rounded-md group hover:bg-gray-50 hover:text-teal-600">
                    <i class="fas fa-globe w-6 mr-2 text-center"></i>
                    Lihat Website
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-200">
            <a href="index.php?page=logout" class="flex items-center px-3 py-2 text-sm font-medium text-red-600 rounded-md hover:bg-red-50">
                <i class="fas fa-sign-out-alt w-6 mr-2 text-center"></i>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Topbar -->
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 lg:px-8">
            <button class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
            
            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-500">
                    <?= date('l, d F Y') ?>
                </div>
                <div class="h-8 w-8 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-bold">
                    A
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
            <?php if(isset($content)) include $content; ?>
        </main>
    </div>
</div>

</body>
</html>
